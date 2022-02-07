<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor',
        'clinc',
        'day',
        'from',
        'to'
    ];

    public function clinc()
    {
        return $this->belongsTo(Clinc::class, 'clinc');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor');
    }
}
