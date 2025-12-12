<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
