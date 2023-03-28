<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClinicRequest;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicsController extends Controller
{
    public function index(){
        return view('admin.clinics.index' , [
            'clinics' => Clinic::with('doctor')->paginate(25)
        ]);
    }

    public function create($id){
        return view('admin.clinics.create' , [
            'doctor_id' => $id
        ]);
    }

    public function store($doctor_id , ClinicRequest $request){
        try {
            Clinic::create([
                'location' => $request['location'],
                'from_hour' => $request['from_hour'],
                'to_hour' => $request['to_hour'],
                'price' => $request['price'],
                'doctor_id' => $doctor_id,
                'workdays' => $request['workdays']
            ]);
            return to_route('admins.index')->with('message' , "Admin Added !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong !");
        }
    }

    public function edit($id){
        $clinic = Clinic::findOrFail($id);
        return view('admin.clinics.edit' , [
            'clinic' => $clinic,
        ]);
    }

    public function update(ClinicRequest $request , $id){
        try {
            Clinic::findOrFail($id)->update([
                'location' => $request['location'],
                'from_hour' => $request['from_hour'],
                'to_hour' => $request['to_hour'],
                'price' => $request['price'],
                'workdays' => $request['workdays']
            ]);
            return to_route('clinics.index')->with('message' , "Clinic Updated !");
        }catch (\Exception $e){
            return back()->with('error' , $e->getMessage());
        }
    }

    public function delete($id){
        try {
            Clinic::find($id)->delete();
            return to_route('clinics.index')->with('message' , "Clinic Deleted !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong !");

        }
    }
}
