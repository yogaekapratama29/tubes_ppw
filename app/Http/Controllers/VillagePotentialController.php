<?php

namespace App\Http\Controllers;

use App\Models\VillagePotential;
use Illuminate\Http\Request;

class VillagePotentialController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/village-potentials",
     *     tags={"Village Potential"},
     *     summary="Get all village potentials",
     *     description="Retrieve a list of all village potentials",
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
        $village_potentials = VillagePotential::get();

        if ($request->wantsJson()) {
            return response()->json(compact('village_potentials'));
        }

        return view('admin.potensi-desa', compact('village_potentials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/api/village-potentials/{id}",
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
        $village_potentials = VillagePotential::find($id);

        if ($request->wantsJson()) {
            return response()->json(compact('village_potentials'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
