<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    /** @use HasFactory<\Database\Factories\VillageFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'description',
        'image_path',
        'banner_path',
    ];
}
