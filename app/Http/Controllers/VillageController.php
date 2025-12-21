<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    /**
     * @OA\Get(
     *     path="/api/village/user",
     *     operationId="getVillageUser",
     *     tags={"Village"},
     *     summary="Get village information for authenticated user",
     *     description="Retrieve village information associated with the authenticated user",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Village information retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="village", type="object",
     *                 @OA\Property(property="name", type="string", example="Kembaran Wetan"),
     *                 @OA\Property(property="address", type="string", example="Kaligondang, Purbalingga, Jawa Tengah"),
     *                 @OA\Property(property="email", type="string", nullable=true),
     *                 @OA\Property(property="phone", type="string", nullable=true),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="image_path", type="string", format="url"),
     *                 @OA\Property(property="banner_path", type="string", format="url")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function getUserVillage()
    {
        $village = [
            'name' => 'Kembaran Wetan',
            'address' => 'Kaligondang, Purbalingga, Jawa Tengah',
            'email' => null,
            'phone' => null,
            'description' => 'Desa Kembaran Wetan merupakan salah satu desa yang berada di Kecamatan Kaligondang, Kabupaten Purbalingga, Jawa Tengah. Desa ini dikenal sebagai wilayah pedesaan yang masih kental dengan nilai-nilai kebersamaan dan gotong royong masyarakatnya. Mayoritas penduduk bermata pencaharian di sektor pertanian dan usaha kecil, dengan lingkungan alam yang relatif asri dan tenang. Kehidupan sosial masyarakat Desa Kembaran Wetan berjalan harmonis, menjunjung tinggi tradisi lokal serta semangat kekeluargaan sebagai fondasi dalam pembangunan desa.',
            'image_path' => 'https://instagram.fjog3-1.fna.fbcdn.net/v/t51.2885-19/178427577_126352486190979_4111876147104459257_n.jpg?efg=eyJ2ZW5jb2RlX3RhZyI6InByb2ZpbGVfcGljLmRqYW5nby4xMDgwLmMyIn0&_nc_ht=instagram.fjog3-1.fna.fbcdn.net&_nc_cat=103&_nc_oc=Q6cZ2QE1uDNn-jwH6iyg9-Xw3LiQ5nGUkS5d2tcknslzVtGiqcJt8whdRvZmez1i7pnhQxU&_nc_ohc=qQyUtR_wn6EQ7kNvwGjan9z&_nc_gid=c94FiR3E8kR4sEBLWkXq4Q&edm=APoiHPcBAAAA&ccb=7-5&oh=00_Afm5HzH-CCE7D9gXTnGn4qQzD1FIAhhezOohdzq4Lm2qjQ&oe=694E112D&_nc_sid=22de04',
            'banner_path' => 'https://instagram.fjog3-1.fna.fbcdn.net/v/t51.2885-19/178427577_126352486190979_4111876147104459257_n.jpg?efg=eyJ2ZW5jb2RlX3RhZyI6InByb2ZpbGVfcGljLmRqYW5nby4xMDgwLmMyIn0&_nc_ht=instagram.fjog3-1.fna.fbcdn.net&_nc_cat=103&_nc_oc=Q6cZ2QE1uDNn-jwH6iyg9-Xw3LiQ5nGUkS5d2tcknslzVtGiqcJt8whdRvZmez1i7pnhQxU&_nc_ohc=qQyUtR_wn6EQ7kNvwGjan9z&_nc_gid=c94FiR3E8kR4sEBLWkXq4Q&edm=APoiHPcBAAAA&ccb=7-5&oh=00_Afm5HzH-CCE7D9gXTnGn4qQzD1FIAhhezOohdzq4Lm2qjQ&oe=694E112D&_nc_sid=22de04',
        ];

        return response()->json(compact('village'));
    }
}
