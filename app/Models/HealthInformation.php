<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
