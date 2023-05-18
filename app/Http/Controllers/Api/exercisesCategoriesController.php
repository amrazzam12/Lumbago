<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExercisesCategoriesResource;
use App\Models\ExerciseCategory;
use Illuminate\Http\Request;
use App\Traits\ApiTrait;

class  exercisesCategoriesController extends Controller
{
    use ApiTrait;
    public function index()
    {
        $exercises = ExerciseCategory::all();
        return $this->responseSuccess(
            200,
            'Category Added Successfully!',
            ExercisesCategoriesResource::collection($exercises)
        );
    }
}
