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

        VillageFund::create($validated);

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

        return redirect()->route('village-fund.index')
            ->with('success', 'Dana desa berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $villageFund = VillageFund::findOrFail($id);
        $villageFund->delete();

        return redirect()->route('village-fund.index')
            ->with('success', 'Dana desa berhasil dihapus!');
    }
}
