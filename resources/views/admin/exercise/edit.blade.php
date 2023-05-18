@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Update Exercise</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('exercise.update', $exercise['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Exercise Name" value="{{ $exercise['name'] }}">
                            </div>

                            <div class="form-group col-6">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" id="description"
                                    placeholder="Enter Exercise Description" value="{{ $exercise['description'] }}">
                            </div>

                            <div class="form-group col-6">
                                <label for="focus_areas">Focus Areas</label>
                                <input type="text" name="focus_areas" class="form-control" id="focus_areas"
                                    placeholder="focus areas" value="{{ $exercise['focus_areas'] }}">
                            </div>

                            <div class="form-group col-6">
                                <label for="duration_in_minutes">Duration</label>
                                <input type="number" name="duration_in_minutes" class="form-control"
                                    id="duration_in_minutes" placeholder="Enter Exercise Duration In Minutes"
                                    value="{{ $exercise['duration_in_minutes'] }}">
                            </div>

                            <div class="form-group col-6">
                                <label for="video_link">Video Link</label>
                                <input type="text" name="video_link" class="form-control" id="video_link"
                                    placeholder="Enter Video Link" value="{{ $exercise['video_link'] }}">
                            </div>


                            <div class="form-group col-6">
                                <label for="category">Category</label>
                                <select id="category" name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option @selected(old('category_id') == $category['id']) value="{{ $category['id'] }}">
                                            {{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-8">
                                <label for="certificate">Icon</label>

                                <div class="mb-2">

                                    <img width="100px" height="100px" src="{{ url('storage/' . $exercise->icon) }}">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="icon" class="custom-file-input" id="icon">
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
