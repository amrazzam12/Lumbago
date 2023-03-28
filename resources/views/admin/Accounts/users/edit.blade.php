@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Update User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('users.update' , $user['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter User's Name" value="{{$user['name']}}">
                            </div>

                            <div class="form-group col-6">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter User's Email" {{$user['email']}}>
                            </div>

                            <div class="form-group col-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Empty For Old Password">
                            </div>

                            <div class="form-group col-6">
                                <label for="age">Age</label>
                                <input type="number" name="age" class="form-control" id="age" placeholder="Enter User's Age" value="{{$user['age']}}">
                            </div>

                            <div class="form-group col-6">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Enter Phone Number" {{$user['phone_number']}}>
                            </div>

                            <div class="form-group col-6">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option @selected($user->gender == "MALE") value="MALE">Male</option>
                                    <option @selected($user->gender == "FEMALE") value="FEMALE">Female</option>
                                </select>
                            </div>


                            <div class="form-group col-8">
                                <label for="image">Avatar</label>
                                <div class="mb-2">
                                    <img width="100px" height="100px" src="{{$user->avatar}}">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>
                            </div>
                        </div>




                    </div>







                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
