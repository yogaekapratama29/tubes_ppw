<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdministrationRequest extends Model
{
    /** @use HasFactory<\Database\Factories\AdministrationRequestFactory> */
    use HasFactory;

    protected $fillable = [
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
