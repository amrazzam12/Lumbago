@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Update Review</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('review.update', $review['id']) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="review">Review</label>
                            <input type="text" name="review" class="form-control" id="review"
                                placeholder="Enter review" value="{{ $review['review'] }}">
                        </div>

                        <div class="form-group">
                            <label for="rate">Rate</label>
                            <input type="number" name="rate" class="form-control" id="rate"
                                placeholder="Enter review" value="{{ $review['rate'] }}"min="0" max="10">
                        </div>

                        <div class="form-group">
                            <label for="user">User</label>
                            <select name="user_id" id="user" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $review->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="clinic">Clinic</label>
                            <select name="clinic_id" id="clinic" class="form-control">
                                @foreach ($clinics as $clinic)
                                    <option value="{{ $clinic->id }}"
                                        {{ $review->clinic_id == $clinic->id ? 'selected' : '' }}>
                                        {{ $clinic->id }}
                                    </option>
                                @endforeach
                            </select>
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
