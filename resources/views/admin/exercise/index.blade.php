@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exercises</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Exercises</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('exercise.create') }}"><button class="btn btn-dark">Add Exercise <i
                                            class=" ml-1 fa fa-plus"></i></button></a>
                                <div class="card-tools">
                                    <div class="input-group input-group-md" style="width: 100%;">
                                        {{--                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}

                                        {{--                                        <div class="input-group-append"> --}}
                                        {{--                                            <button type="submit" class="btn btn-default"> --}}
                                        {{--                                                <i class="fas fa-search"></i> --}}
                                        {{--                                            </button> --}}
                                        {{--                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0 mb-5">
                                <table class="table table-bordered mb-3 table-hover">
                                    <thead class="bg-gradient-gray-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Exercise</th>
                                            <th>Video Link</th>
                                            <th>Description</th>
                                            <th>Icon</th>
                                            <th >Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($exercises as $key => $exercise)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $exercise->name }}</td>
                                                <td>{{ $exercise->video_link }}</td>
                                                <td>{{ $exercise->description }}</td>

                                                <td class="text-center"><img width="40px" height="50px"
                                                        src="{{ $exercise->icon }}"></td>
                                                <td>

                                                    <a href="{{ route('exercise.edit', $exercise['id']) }}">
                                                        <button class="btn btn-dark">Edit <i
                                                                class="fa fa-pen ml-1"></i></button>
                                                    </a>
                                                    <button class="btn btn-danger waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target="#delete-modal{{ $key }}">Delete <i
                                                            class="fa fa-trash"></i></button>
                                                    <div id="delete-modal{{ $key }}" class="modal fade modal2 "
                                                        tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                        aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content float-left">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Sure To Delete</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Sure To Delete</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal"
                                                                        class="btn btn-info waves-effect waves-light m-l-5">
                                                                        Close
                                                                    </button>
                                                                    <form
                                                                        action="{{ route('exercise.delete', $exercise['id']) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        {{ method_field('DELETE') }}
                                                                        <button type="submit"
                                                                            class="btn btn-danger waves-effect waves-light m-1">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex mt-3">
                                    {!! $exercises->links() !!}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
