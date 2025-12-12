<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
