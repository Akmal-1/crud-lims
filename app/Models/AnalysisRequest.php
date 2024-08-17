<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysisRequest extends Model
{
    use HasFactory;

    // Kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'date',
        'type_sample',
        'batch_lot',
        'description',
        'name',
    ];
}
