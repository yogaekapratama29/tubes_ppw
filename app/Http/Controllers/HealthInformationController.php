<?php

namespace App\Http\Controllers;

use App\Models\HealthInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HealthInformationController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/health-information",
     *     tags={"Health Information"},
     *     summary="Get all health information",
     *     description="Retrieve a list of all health information",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Health information list retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="health_information",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/HealthInformation")
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
        $health_information = HealthInformation::with('author')->latest()->get();

        if ($request->wantsJson()) {
            return response()->json([
                'health_information' => HealthInformation::where('is_draft', 0)->with('author')->latest()->get()
            ]);
        }

        return view('admin.health-information.index', compact('health_information'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.health-information.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'event_date' => ['required', 'date'],
            'location' => ['required', 'string'],
        ]);

        $validated['author_id'] = Auth::id();
        $validated['is_draft'] = $request->is_draft ? true : false;

        HealthInformation::create($validated);

        return redirect()->route('health-information.index')->with('success', 'Informasi kesehatan berhasil dibuat.');
    }

    /**
     * @OA\Get(
     *     path="/api/health-information/{id}",
     *     tags={"Health Information"},
     *     summary="Get health information by ID",
     *     description="Retrieve a specific health information by ID",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Health information ID",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Health information retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="health_information",
     *                 ref="#/components/schemas/HealthInformation"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Health information not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Health information not found")
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
        $health_information = HealthInformation::find($id);

        if ($request->wantsJson()) {
            return response()->json(compact('health_information'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $health_information = HealthInformation::find($id);

        return view('admin.health-information.form', compact('health_information'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthInformation $health_information)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'event_date' => ['required', 'date'],
            'location' => ['required', 'string'],
        ]);

        $validated['is_draft'] = $request->is_draft ? true : false;
        $validated['author_id'] = Auth::id();

        $health_information->update($validated);

        return redirect()->route('health-information.index')->with('success', 'Informasi kesehatan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthInformation $health_information)
    {
        $health_information->delete();

        return redirect()->route('health-information.index')->with('success', 'Informasi kesehatan berhasil dihapus.');
    }
}
