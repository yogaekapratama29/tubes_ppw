<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @OA\Schema(
 *     schema="AdministrationRequest",
 *     type="object",
 *     title="Administration Request",
 *     description="Administration Request model",
 *     required={"id", "letter_type", "message", "status", "user_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="letter_type", type="string", enum={"ktp", "kk", "sk"}, example="ktp"),
 *     @OA\Property(property="message", type="string", example="Permohonan pembuatan KTP baru."),
 *     @OA\Property(property="response", type="string", nullable=true, example="Dokumen sedang diproses."),
 *     @OA\Property(property="status", type="string", enum={"pending", "approved", "rejected"}, example="pending"),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="admin_id", type="integer", nullable=true, example=2),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-12-16T10:00:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-12-16T10:00:00.000000Z"),
 *     @OA\Property(property="user", type="object", ref="#/components/schemas/User"),
 *     @OA\Property(property="admin", type="object", ref="#/components/schemas/User")
 * )
 */
class AdministrationRequest extends Model
{
    /** @use HasFactory<\Database\Factories\AdministrationRequestFactory> */
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'no_hp',
        'letter_type',
        'message',
        'response',
        'status',
        'user_id',
        'admin_id',
    ];

    /**
     * Get the user that owns the administration request.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the admin that handles the administration request.
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
