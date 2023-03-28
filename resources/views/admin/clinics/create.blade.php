@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Add New Clinic</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('clinics.store' , $doctor_id)}}" method="post" id="form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" id="location" placeholder="Enter Location" value="{{old('location')}}">
                            </div>

                            <div class="form-group col-4">
                                <label for="from">From</label>
                                <input type="time" name="from_hour" class="form-control" id="from" value="{{old('from_hour') ?? "09:00"}}">
                            </div>

                            <div class="form-group col-4">
                                <label for="to">To</label>
                                <input type="time" name="to_hour" class="form-control" id="to" value={{old('to_hour' ?? "18:00")}}>
                            </div>

                            <div class="form-group col-4">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" id="price" placeholder="Appointment Price" value="{{old('price')}}">
                            </div>

                            <div class="form-group col-12">
                                <label>Work Days</label>
                                <div class="row justify-content-between ml-1">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input name="workdays[]" value="Saturday" type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                        <label class="custom-control-label" for="customSwitch3">Saturday</label>
                                    </div>

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input name="workdays[]" value="Sunday" type="checkbox" class="custom-control-input" id="customSwitch2" checked>
                                        <label class="custom-control-label" for="customSwitch3">Sunday</label>
                                    </div>

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input name="workdays[]" value="Monday" type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                                        <label class="custom-control-label" for="customSwitch3">Monday</label>
                                    </div>

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input name="workdays[]" value="Tuesday" type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                                        <label class="custom-control-label" for="customSwitch3">Tuesday</label>
                                    </div>


                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input name="workdays[]" value="Wednesday" type="checkbox" class="custom-control-input" id="customSwitch5" checked>
                                        <label class="custom-control-label" for="customSwitch3">Wednesday</label>
                                    </div>

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input name="workdays[]" value="Thursday" type="checkbox" class="custom-control-input" id="customSwitch6">
                                        <label class="custom-control-label" for="customSwitch3">Thursday</label>
                                    </div>

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input name="workdays[]" value="Friday" type="checkbox" class="custom-control-input" id="customSwitch7">
                                        <label class="custom-control-label" for="customSwitch3">Friday</label>
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

