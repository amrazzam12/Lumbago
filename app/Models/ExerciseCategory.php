<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseCategory extends Model
{
    use HasFactory;
    protected $table="exercises_categories";
    protected $fillable = ['name','description'];

    public function exercises(){
        return $this->hasMany(Exercise::class , 'category_id');
    }
}


