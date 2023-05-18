<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorsResource;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Traits\ApiTrait;

class DoctorsController extends Controller
{
    use ApiTrait;
    public function index()
    {
        $doctors = Doctor::all();
        return $this->responseSuccess(200 , 'Doctor Added Successfully!'  ,
        DoctorsResource::collection($doctors));
     }
}
