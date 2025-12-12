<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
