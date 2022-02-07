<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinc extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor',
        'address',
        'area'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor');
    }
}
