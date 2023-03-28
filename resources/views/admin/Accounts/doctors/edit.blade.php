@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Edit Doctor</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('doctors.update' , $doctor['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$doctor['name']}}" class="form-control" id="name" placeholder="Enter Doctor's Name">
                            </div>

                            <div class="form-group col-6">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" value="{{$doctor['email']}}" class="form-control" id="email" placeholder="Enter Doctor's Email">
                            </div>

                            <div class="form-group col-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Empty For Old Password">
                            </div>

                            <div class="form-group col-6">
                                <label for="age">Age</label>
                                <input type="number" name="age" value="{{$doctor['age']}}" class="form-control" id="age" placeholder="Enter Doctor's Age">
                            </div>

                            <div class="form-group col-6">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" value="{{$doctor['phone_number']}}" class="form-control" id="phone_number" placeholder="Enter Phone Number">
                            </div>

                            <div class="form-group col-6">
                                <label for="years_of_experience">Years Of Experience</label>
                                <input type="number" name="years_of_experience" value="{{$doctor['years_of_experience']}}" class="form-control" id="years_of_experience" placeholder="Enter Doctor's Years Of Experience">
                            </div>

                            <div class="form-group col-6">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option @selected($doctor->gender == 'MALE') value="MALE">Male</option>
                                    <option @selected($doctor->gender == 'FEMALE') value="FEMALE">Female</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="speciality">Speciality</label>
                                <select id="speciality" name="speciality_id" class="form-control">
                                    @foreach($specialities as $spec)
                                        <option @selected($doctor->speciality_id == $spec['id'] ) value="{{$spec['id']}}">{{$spec['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="image">Avatar</label>

                                <div class="mb-2">
                                    <img width="100px" height="100px" src="{{$doctor->avatar}}">
                                </div>

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label for="certificate">Certificate</label>

                                <div class="mb-2">

                                    <img width="100px" height="100px" src="{{url('storage/' . $doctor->certificate )}}">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="certificate" class="custom-file-input" id="certificate">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-dark">Submit</button>





                    </div>







                    <!-- /.card-body -->

                    <div class="card-footer">
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
