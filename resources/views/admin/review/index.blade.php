@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Reviews</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Reviews</li>
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
                                <a href="{{route('review.create')}}"><button class="btn btn-dark">Add Review<i class=" ml-1 fa fa-plus"></i></button></a>


                                <div class="card-tools">
                                    <div class="input-group input-group-md" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0 mb-5">
                                <table class="table table-bordered mb-3 table-hover">
                                    <thead class="bg-gradient-gray-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Clinic</th>
                                            <th>Rate</th>
                                            <th>Review</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $key => $review)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $review->user->name }}</td>
                                                {{-- <td style="min-width: 150px;max-width: 250px" > --}}
                                                <td>  {{ $review->clinic->id }}</td>
                                                <td>{{ $review->rate }}</td>
                                                <td style="min-width: 150px">{{ $review->review }}</td>
                                                <td>
                                                    <a href="{{ route('review.edit', $review['id']) }}">
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
                                                                        action="{{ route('review.delete', $review['id']) }}"
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
