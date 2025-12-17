<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @OA\Schema(
 *     schema="HealthInformation",
 *     type="object",
 *     title="Health Information",
 *     description="Health Information model",
 *     required={"id", "title", "description"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Posyandu Balita"),
 *     @OA\Property(property="description", type="string", example="Kegiatan posyandu untuk balita"),
 *     @OA\Property(property="event_date", type="string", format="date", nullable=true, example="2025-12-20"),
 *     @OA\Property(property="location", type="string", nullable=true, example="Balai Desa"),
 *     @OA\Property(property="is_draft", type="boolean", example=false),
 *     @OA\Property(property="author_id", type="integer", nullable=true, example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-12-16T10:00:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-12-16T10:00:00.000000Z")
 * )
 */
class HealthInformation extends Model
{
    /** @use HasFactory<\Database\Factories\HealthInformationFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'location',
        'is_draft',
        'author_id',
    ];

    /**
     * Get the author of the health information.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
