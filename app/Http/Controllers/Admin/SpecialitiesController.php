<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialityRequest;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialitiesController extends Controller
{
    public function index(){
        return view('admin.specialities.index' , [
            'specialities' => Speciality::all()
        ]);
    }

    public function create(){
        return view('admin.specialities.create');
    }

    public function store(SpecialityRequest $request){
        try {
            Speciality::create([
                'name' => $request['name'],
                'description' => $request['description']
            ]);
            return to_route('specialities.index')->with('message' , "Speciality Added !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");
        }
    }

    public function edit($id){
        return view('admin.specialities.edit' , [
            'spec' => Speciality::find($id)
        ]);
    }

    public function update(SpecialityRequest $request , $id){
        try {
            $spec = Speciality::find($id);
            $spec->update([
               'name' => $request['name'],
               'description' => $request['description']
            ]);
            return to_route('specialities.index')->with('message' , "Speciality Updated !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");
        }
    }

    public function delete($id){
        try {
            Speciality::find($id)->delete();
            return to_route('specialities.index')->with('message' , "Speciality Deleted !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");

        }
    }
}
