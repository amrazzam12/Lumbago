<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'holidays' => 'array'
    ];

    protected function workdays(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    // Relations

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function reservations(){
        return $this->hasMany(ClinicReservation::class);
    }
//me
    public function review()
    {
        return $this->hasMany(Review::class,'clinic_id','id');
    }
}
