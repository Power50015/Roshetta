<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'doctor',
        'clinc',
        'schedules',
        'states'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor');
    }
    public function clinc()
    {
        return $this->belongsTo(Clinc::class, 'clinc');
    }
    public function schedules()
    {
        return $this->belongsTo(Schedule::class, 'schedules');
    }
}
