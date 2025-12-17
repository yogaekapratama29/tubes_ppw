<?php

namespace App\Http\Controllers;

use App\Models\VillageFund;
use Illuminate\Http\Request;

class VillageFundController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/village-fund",
    *     tags={"Village Fund"},
    *     summary="List village fund transactions",
    *     description="Get all village fund transactions (non-draft in JSON) and total balance",
    *     security={{"bearerAuth":{}}},
    *     @OA\Response(
    *         response=200,
    *         description="List retrieved",
    *         @OA\JsonContent(
    *             @OA\Property(property="village_funds", type="array", @OA\Items(ref="#/components/schemas/VillageFund")),
    *             @OA\Property(property="total_dana", type="number", format="double", example=72857002)
    *         )
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Unauthenticated",
    *         @OA\JsonContent(@OA\Property(property="message", type="string", example="Unauthenticated."))
    *     )
    * )
     */
    public function index(Request $request)
    {
        $villageFunds = VillageFund::latest()->get();
        $total_dana = $villageFunds->where('transaction_type', 'in')->sum('amount') - $villageFunds->where('transaction_type', 'out')->sum('amount');

        if ($request->wantsJson()) {
            return response()->json([
                'village_funds' => VillageFund::where('is_draft', 0)->latest()->get(),
                'total_dana' => $total_dana
            ]);
        }

        return view('admin.village-fund.index', compact('villageFunds', 'total_dana'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.village-fund.form');
    }

    /**
        * @OA\Post(
        *     path="/api/village-fund",
        *     tags={"Village Fund"},
        *     summary="Create village fund transaction",
        *     security={{"bearerAuth":{}}},
        *     @OA\RequestBody(
        *         required=true,
        *         @OA\JsonContent(
        *             required={"title", "transaction_type", "amount", "description", "admin_id"},
        *             @OA\Property(property="title", type="string", example="Pembangunan Jalan Desa"),
        *             @OA\Property(property="transaction_type", type="string", enum={"in", "out"}, example="out"),
        *             @OA\Property(property="amount", type="number", format="double", example=15000000),
        *             @OA\Property(property="description", type="string", example="Pengaspalan jalan utama RT 01/02"),
        *             @OA\Property(property="is_draft", type="boolean", example=true),
        *             @OA\Property(property="admin_id", type="integer", example=2)
        *         )
        *     ),
        *     @OA\Response(
        *         response=201,
        *         description="Created",
        *         @OA\JsonContent(
        *             @OA\Property(property="message", type="string", example="Dana desa berhasil ditambahkan!"),
        *             @OA\Property(property="village_fund", ref="#/components/schemas/VillageFund")
        *         )
        *     ),
        *     @OA\Response(
        *         response=422,
        *         description="Validation error",
        *         @OA\JsonContent(
        *             @OA\Property(property="message", type="string", example="The given data was invalid."),
        *             @OA\Property(property="errors", type="object")
        *         )
        *     ),
        *     @OA\Response(
        *         response=401,
        *         description="Unauthenticated",
        *         @OA\JsonContent(@OA\Property(property="message", type="string", example="Unauthenticated."))
        *     )
        * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'transaction_type' => 'required|in:in,out',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string',
            'is_draft' => 'nullable|boolean',
            'admin_id' => 'required|exists:users,id',
        ]);

        $validated['is_draft'] = $request->has('is_draft') ? true : false;

        $villageFund = VillageFund::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Dana desa berhasil ditambahkan!',
                'village_fund' => $villageFund
            ], 201);
        }

        return redirect()->route('village-fund.index')
            ->with('success', 'Dana desa berhasil ditambahkan!');
    }

    /**
        * @OA\Get(
        *     path="/api/village-fund/{id}",
        *     tags={"Village Fund"},
        *     summary="Get village fund by ID",
        *     security={{"bearerAuth":{}}},
        *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer", example=1)),
        *     @OA\Response(
        *         response=200,
        *         description="Data retrieved",
        *         @OA\JsonContent(
        *             @OA\Property(property="village_fund", ref="#/components/schemas/VillageFund")
        *         )
        *     ),
        *     @OA\Response(
        *         response=404,
        *         description="Not found",
        *         @OA\JsonContent(@OA\Property(property="message", type="string", example="Not Found"))
        *     ),
        *     @OA\Response(
        *         response=401,
        *         description="Unauthenticated",
        *         @OA\JsonContent(@OA\Property(property="message", type="string", example="Unauthenticated."))
        *     )
        * )
     */
    public function show(Request $request, string $id)
    {
        $villageFund = VillageFund::with('admin')->findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json([
                'village_fund' => $villageFund
            ]);
        }

        return view('admin.village-fund.show', compact('villageFund'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $villageFund = VillageFund::findOrFail($id);
        
        return view('admin.village-fund.form', compact('villageFund'));
    }

    /**
        * @OA\Put(
        *     path="/api/village-fund/{id}",
        *     tags={"Village Fund"},
        *     summary="Update village fund",
        *     security={{"bearerAuth":{}}},
        *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer", example=1)),
        *     @OA\RequestBody(
        *         required=true,
        *         @OA\JsonContent(
        *             required={"title", "transaction_type", "amount", "description", "admin_id"},
        *             @OA\Property(property="title", type="string", example="Pemeliharaan Irigasi"),
        *             @OA\Property(property="transaction_type", type="string", enum={"in", "out"}, example="out"),
        *             @OA\Property(property="amount", type="number", format="double", example=7500000),
        *             @OA\Property(property="description", type="string", example="Perbaikan saluran irigasi RT 05"),
        *             @OA\Property(property="is_draft", type="boolean", example=false),
        *             @OA\Property(property="admin_id", type="integer", example=2)
        *         )
        *     ),
        *     @OA\Response(
        *         response=200,
        *         description="Updated",
        *         @OA\JsonContent(
        *             @OA\Property(property="message", type="string", example="Dana desa berhasil diperbarui!"),
        *             @OA\Property(property="village_fund", ref="#/components/schemas/VillageFund")
        *         )
        *     ),
        *     @OA\Response(
        *         response=422,
        *         description="Validation error",
        *         @OA\JsonContent(
        *             @OA\Property(property="message", type="string", example="The given data was invalid."),
        *             @OA\Property(property="errors", type="object")
        *         )
        *     ),
        *     @OA\Response(
        *         response=404,
        *         description="Not found",
        *         @OA\JsonContent(@OA\Property(property="message", type="string", example="Not Found"))
        *     ),
        *     @OA\Response(
        *         response=401,
        *         description="Unauthenticated",
        *         @OA\JsonContent(@OA\Property(property="message", type="string", example="Unauthenticated."))
        *     )
        * )
     */
    public function update(Request $request, string $id)
    {
        $villageFund = VillageFund::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'transaction_type' => 'required|in:in,out',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string',
            'is_draft' => 'nullable|boolean',
            'admin_id' => 'required|exists:users,id',
        ]);

        $validated['is_draft'] = $request->has('is_draft') ? true : false;

        $villageFund->update($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Dana desa berhasil diperbarui!',
                'village_fund' => $villageFund
            ]);
        }

        return redirect()->route('village-fund.index')
            ->with('success', 'Dana desa berhasil diperbarui!');
    }

    /**
        * @OA\Delete(
        *     path="/api/village-fund/{id}",
        *     tags={"Village Fund"},
        *     summary="Delete village fund",
        *     security={{"bearerAuth":{}}},
        *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer", example=1)),
        *     @OA\Response(
        *         response=200,
        *         description="Deleted",
        *         @OA\JsonContent(@OA\Property(property="message", type="string", example="Dana desa berhasil dihapus!"))
        *     ),
        *     @OA\Response(
        *         response=404,
        *         description="Not found",
        *         @OA\JsonContent(@OA\Property(property="message", type="string", example="Not Found"))
        *     ),
        *     @OA\Response(
        *         response=401,
        *         description="Unauthenticated",
        *         @OA\JsonContent(@OA\Property(property="message", type="string", example="Unauthenticated."))
        *     )
        * )
     */
    public function destroy(Request $request, string $id)
    {
        $villageFund = VillageFund::findOrFail($id);
        $villageFund->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Dana desa berhasil dihapus!'
            ]);
        }

        return redirect()->route('village-fund.index')
            ->with('success', 'Dana desa berhasil dihapus!');
    }
}
