@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Update Clinic</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('clinics.update' , $clinic['id'])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" id="location" placeholder="Enter Location" value="{{$clinic['location']}}">
                            </div>

                            <div class="form-group col-4">
                                <label for="from">From</label>
                                <input type="time" name="from_hour" class="form-control" id="from" value="{{$clinic['from_hour']}}">
                            </div>

                            <div class="form-group col-4">
                                <label for="to">To</label>
                                <input type="time" name="to_hour" class="form-control" id="to" value={{$clinic['to_hour']}}>
                            </div>

                            <div class="form-group col-4">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" id="price" placeholder="Appointment Price" value="{{$clinic['price']}}">
                            </div>

                            <div class="form-group col-12">
                                <label>Work Days</label>
                                <div class="row justify-content-between ml-1">

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input @checked(in_array("Saturday" , $clinic->workdays)) name="workdays[]" value="Saturday" type="checkbox" class="custom-control-input" id="check1">
                                        <label class="custom-control-label" for="check1">Saturday</label>
                                    </div>

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input @checked(in_array("Sunday" , $clinic->workdays)) name="workdays[]" value="Sunday" type="checkbox" class="custom-control-input" id="check2">
                                        <label class="custom-control-label" for="check2">Sunday</label>
                                    </div>

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input @checked(in_array("Monday" , $clinic->workdays)) name="workdays[]" value="Monday" type="checkbox" class="custom-control-input" id="check3">
                                        <label class="custom-control-label" for="check3">Monday</label>
                                    </div>

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input @checked(in_array("Tuesday" , $clinic->workdays)) name="workdays[]" value="Tuesday" type="checkbox" class="custom-control-input" id="check4" >
                                        <label class="custom-control-label" for="check4">Tuesday</label>
                                    </div>


                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input @checked(in_array("Wednesday" , $clinic->workdays)) name="workdays[]" value="Wednesday" type="checkbox" class="custom-control-input" id="check5" >
                                        <label class="custom-control-label" for="check5">Wednesday</label>
                                    </div>

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input @checked(in_array("Thursday" , $clinic->workdays)) name="workdays[]" value="Thursday" type="checkbox" class="custom-control-input" id="check6">
                                        <label class="custom-control-label" for="check6">Thursday</label>
                                    </div>

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-1">
                                        <input @checked(in_array("Friday" , $clinic->workdays)) name="workdays[]" value="Friday" type="checkbox" class="custom-control-input" id="check7">
                                        <label class="custom-control-label" for="check7">Friday</label>
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

