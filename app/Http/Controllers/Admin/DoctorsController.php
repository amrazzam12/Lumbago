<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment\Doc;

class DoctorsController extends Controller
{
    use ImageUploader;
    public function index(){
        return view('admin.Accounts.doctors.index' , [
           'doctors' => Doctor::paginate(25)
        ]);
    }

    public function create(){
        return view('admin.Accounts.doctors.create' , [
            'specialities' => Speciality::select('id' , 'name')->get()
        ]);
    }

    public function store(AddDoctorRequest $request){
        try {
            $doctor = Doctor::create([
               'name' => $request['name'],
               'email' => $request['email'],
               'password' => Hash::make($request['password']),
               'age' => $request['age'],
               'phone_number' => $request['phone_number'],
               'years_of_experience' => $request['years_of_experience'],
               'gender' => $request['gender'],
               'speciality_id' => $request['speciality_id'],
            ]);
            if ($request->has('image'))
                $this->uploadImage($request , 'doctors/' , $doctor , 'image' , 'image');
            if ($request->has('certificate'))
                $this->uploadImage($request , 'doctors/' , $doctor , 'certificate' , 'certificate');
            return to_route('doctors.index')->with('message' , 'Doctor Added !');
        }catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }

    public function edit($id){
        return view('admin.Accounts.doctors.edit' , [
            'doctor' => Doctor::find($id),
            'specialities' => Speciality::select('id' , 'name')->get()
        ]);
    }

    public function update(UpdateDoctorRequest $request , $id){
        try {
            $doctor = Doctor::find($id);
            $password = $doctor['password'];
            if ($request->has('password'))
                $password = Hash::make($request['password']);
            $doctor->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $password,
                'age' => $request['age'],
                'phone_number' => $request['phone_number'],
                'years_of_experience' => $request['years_of_experience'],
                'gender' => $request['gender'],
                'speciality_id' => $request['speciality_id'],
            ]);
            if ($request->has('image'))
                $this->uploadImage($request , 'doctors/' , $doctor , 'image' , 'image');
            if ($request->has('certificate'))
                $this->uploadImage($request , 'doctors/' , $doctor , 'certificate' , 'certificate');
            return to_route('doctors.index')->with('message' , 'Doctor Updated');
        }catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }

    public function delete($id){
        try {
            Doctor::find($id)->delete();
            return to_route('doctors.index')->with('message' , "Doctor Deleted !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");

        }
    }
}
