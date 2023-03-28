@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Clinics</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Clinics</li>
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
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0 mb-5">
                                <table class="table table-bordered mb-3 table-hover">
                                    <thead class="bg-gradient-gray-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Doctor</th>
                                        <th style="min-width: 150px">Location</th>
                                        <th>Available Times</th>
                                        <th>Workdays</th>
                                        <th>Price </th>
                                        <th>Operations</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clinics as $key => $clinic)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td><a href="{{route('doctors.edit' , $clinic->doctor->id)}}">{{$clinic->doctor->name}}</a></td>
                                                <td style="min-width: 150px;max-width: 250px" >{{$clinic->location}}</td>
                                                <td>{{$clinic->from_hour}} - {{$clinic->to_hour}}</td>
                                                <td>
                                                    @foreach($clinic->workdays as $day)
                                                        <button class="btn btn-success">{{$day}}</button>
                                                    @endforeach
                                                </td>
                                                <td>{{$clinic->price}} EG</td>
                                                <td>
                                                        <a href="{{route('clinics.edit' , $clinic['id']) }}">
                                                            <button class="btn btn-dark">Edit <i class="fa fa-pen ml-1"></i></button>
                                                        </a>
                                                        <button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#delete-modal{{$key}}">Delete <i class="fa fa-trash"></i></button>
                                                        <div id="delete-modal{{$key}}" class="modal fade modal2 " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">                                                    <div class="modal-dialog">
                                                                <div class="modal-content float-left">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Sure To Delete</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Sure To Delete</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" data-dismiss="modal" class="btn btn-info waves-effect waves-light m-l-5">
                                                                            Close
                                                                        </button>
                                                                        <form action="{{route('clinics.delete' , $clinic['id'])}}" method="post">
                                                                            @csrf
                                                                            {{method_field('DELETE')}}
                                                                            <button type="submit" class="btn btn-danger waves-effect waves-light m-1">Delete</button>
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
