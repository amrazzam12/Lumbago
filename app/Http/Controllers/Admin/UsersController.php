<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Speciality;
use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment\Doc;

class UsersController extends Controller
{
    use ImageUploader;
    public function index(){
        return view('admin.Accounts.users.index' , [
            'users' => User::paginate(25)
        ]);
    }

    public function create(){
        return view('admin.Accounts.users.create');
    }

    public function store(AddUserRequest $request){
        try {
            $user = User::create([
                'name' => $request['name'],
                "user_name" => $request['user_name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'age' => $request['age'],
                'phone_number' => $request['phone_number'],
                'gender' => $request['gender'],
            ]);
            if ($request->has('image'))
                $this->uploadImage($request , 'users/' , $user , 'image');
            return to_route('users.index')->with('message' , 'User Added !');
        }catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id){
        return view('admin.Accounts.users.edit' , [
            'user' => User::find($id),
        ]);
    }

    public function update(UpdateUserRequest $request , $id){
        try {
            $user = User::find($id);
            $password = $user['password'];
            if ($request->has('password'))
                $password = Hash::make($request['password']);
            $user->update([
                'name' => $request['name'],
                "user_name" => $request['user_name'],
                'email' => $request['email'],
                'password' => $password,
                'age' => $request['age'],
                'phone_number' => $request['phone_number'],
                'gender' => $request['gender'],
            ]);
            if ($request->has('image'))
                $this->uploadImage($request , 'users/' , $user , 'image');
            return to_route('users.index')->with('message' , 'User Updated');
        }catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }

    public function delete($id){
        try {
            User::find($id)->delete();
            return to_route('users.index')->with('message' , "User Deleted !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");

        }
    }
}
