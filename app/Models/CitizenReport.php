<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenReport extends Model
{
    /** @use HasFactory<\Database\Factories\CitizenReportFactory> */
    use HasFactory;

    protected $fillable = [
        'message',
        'attachment_paths',
        'response',
        'status',
        'user_id',
        'admin_id',
    ];
}
