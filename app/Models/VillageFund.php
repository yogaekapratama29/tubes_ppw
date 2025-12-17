<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @OA\Schema(
 *     schema="VillageFund",
 *     type="object",
 *     title="Village Fund",
 *     description="Village fund transaction model",
 *     required={"id", "title", "amount", "transaction_type", "admin_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Pembangunan Jalan Desa"),
 *     @OA\Property(property="description", type="string", example="Pengaspalan jalan utama RT 01/02"),
 *     @OA\Property(property="amount", type="number", format="double", example=15000000),
 *     @OA\Property(property="transaction_type", type="string", enum={"in", "out"}, example="out"),
 *     @OA\Property(property="is_draft", type="boolean", example=false),
 *     @OA\Property(property="admin_id", type="integer", example=2),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-12-17T10:00:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-12-17T10:00:00.000000Z")
 * )
 */
class VillageFund extends Model
{
    /** @use HasFactory<\Database\Factories\VillageFundFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'amount',
        'transaction_type',
        'is_draft',
        'admin_id',
    ];

    /**
     * Get the admin that handles the administration request.
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
