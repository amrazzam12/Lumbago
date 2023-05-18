<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [];


    // Attributes
    public function getAvatarAttribute(){
        if (!$this->image)
            return url('default.png');
        return url('storage/' . $this->image);
    }



    // Relations
    public function clinic(){
        return $this->hasOne(Clinic::class);
    }

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
}
