@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Add Your Review</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('review.store') }}" method="POST" id="form">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="review">Review</label>
                            <textarea cols="10" rows="5" type="text" name="review" class="form-control" id="review"
                                placeholder="Enter Your Review"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="rate">Rate</label>
                            <input type="number" name="rate" class="form-control" id="rate"
                                placeholder="Clinic Rate" min="0" max="10">
                        </div>

                        <div class="form-group">
                            <label for="user">User</label>
                            <select id="user" name="user_id" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="clinic">Clinic</label>
                            <select id="clinic" name="clinic_id" class="form-control">
                                @foreach ($clinics as $clinic)
                                    <option value="{{$clinic->id}}">{{$clinic->id}}</option>
                                @endforeach
                            </select>
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
