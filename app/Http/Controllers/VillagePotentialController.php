<?php

namespace App\Http\Controllers;

use App\Models\VillagePotential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VillagePotentialController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/village-potential",
     *     tags={"Village Potential"},
     *     summary="Get all published village potentials",
     *     description="Retrieve a list of non-draft village potentials with author relationship",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Village potentials list retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="village_potentials",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/VillagePotential")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated.")
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        $village_potentials = VillagePotential::with('author')->latest()->get();

        if ($request->wantsJson()) {
            return response()->json([
                'village_potentials' => VillagePotential::where('is_draft', 0)->with('author')->latest()->get()
            ]);
        }

        return view('admin.village-potential.index', compact('village_potentials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.village-potential.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $validated['author_id'] = Auth::id();

        VillagePotential::create($validated);

        return redirect()->route('village-potential.index')->with('success', 'Potensi desa berhasil dibuat.');
    }

    /**
     * @OA\Get(
     *     path="/api/village-potential/{id}",
     *     tags={"Village Potential"},
     *     summary="Get village potential by ID",
     *     description="Retrieve a specific village potential by ID",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Village potential ID",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Village potential retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="village_potentials",
     *                 ref="#/components/schemas/VillagePotential"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Village potential not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Village potential not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated.")
     *         )
     *     )
     * )
     */
    public function show(Request $request, string $id)
    {
        $village_potential = VillagePotential::find($id);

        if ($request->wantsJson()) {
            return response()->json(compact('village_potential'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $village_potential = VillagePotential::find($id);

        return view('admin.village-potential.form', compact('village_potential'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VillagePotential $village_potential)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $validated['is_draft'] = $request->is_draft ? true : false;
        $validated['author_id'] = Auth::id();

        $village_potential->update($validated);

        return redirect()->route('village-potential.index')->with('success', 'Potensi desa berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VillagePotential $village_potential)
    {
        $village_potential->delete();

        return redirect()->route('village-potential.index')->with('success', 'Potendi desa berhasil dihapus.');
    }
}
