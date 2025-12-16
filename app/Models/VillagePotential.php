<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="VillagePotential",
 *     type="object",
 *     title="Village Potential",
 *     description="Village Potential model",
 *     required={"id", "name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Gunung Abadi"),
 *     @OA\Property(property="address", type="string", nullable=true, example="Desa Pandawa"),
 *     @OA\Property(property="email", type="string", format="email", nullable=true, example="info@gunung-abadi.com"),
 *     @OA\Property(property="phone", type="string", nullable=true, example="081234567890"),
 *     @OA\Property(property="description", type="string", nullable=true, example="Destinasi wisata gunung yang indah"),
 *     @OA\Property(property="is_draft", type="boolean", example=false),
 *     @OA\Property(property="author_id", type="integer", nullable=true, example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-12-16T10:00:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-12-16T10:00:00.000000Z")
 * )
 */
class VillagePotential extends Model
{
    /** @use HasFactory<\Database\Factories\VillagePotentialFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'description',
        'is_draft',
        'author_id',
    ];
}
