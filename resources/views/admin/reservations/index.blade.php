@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Reservations</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Reservations</li>
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
                                        <th>Clinic</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Patient</th>
                                        <th>Status</th>
                                        <th>Operations</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reservations as $key => $res)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td><a href="{{route('clinics.edit' , $res->clinic->id)}}">
                                                        <button class="btn btn-success">Show Clinic <i class="fa-solid fa-house-chimney-medical"></i></button>
                                                    </a></td>
                                                <td>{{$res->date}}</td>
                                                <td>{{$res->time}}</td>
                                                <td><a href="{{route('users.edit' , $res->user->id)}}">
                                                        <button class="btn btn-primary">{{$res->user->name}} <i class="fa-solid fa-user"></i></button>
                                                    </a></td>
                                                <td>
                                                    <div class="form-group">
                                                        <select id="status" class="custom-select form-control-border border-width-2">
                                                            <option @selected($res->status == "RESERVED")>Reserved</option>
                                                            <option @selected($res->status == "COMPLETED")>Completed</option>
                                                            <option @selected($res->status == "CANCELED")>Canceled</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
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
                                                                        <form action="{{route('reservations.delete' , $res['id'])}}" method="post">
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
                                <div class="d-flex mt-3">
                                    {!! $reservations->links() !!}
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

@section('script')
    <script>
        $('#status').on('change' , function (){
            var status = $('#status').find(":selected").val();
            $.ajax({
                url: "{{route('reservations.changeStatus' , $res->id)}}",
                type: "post",
                data: {
                    status : status,
                    _token: '{!! csrf_token() !!}',
                },
                success: function(data) {
                    console.log("CHANGED")
                } ,
                error : function (d){
                    console.log(d);
                }
            });

        })
    </script>
@endsection
