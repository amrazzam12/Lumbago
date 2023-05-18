<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $table = "exercises";
    //protected $guarded = [];


    protected $fillable = [
        'name',
        'description',
        'focus_areas',
        'duration_in_minutes',
        'video_link',
        'category_id',
        'icon'
    ];

    protected function focusAreas(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    // // Attributes
    public function getIconAttribute(){
        if (!$this->image)
            return url('icon.png');
        return url('storage/' . $this->image);
    }

    public function category()
    {
        return $this->belongsTo(ExerciseCategory::class , 'category_id');
    }

}
