@extends('layouts.master')
@section('additional_styles')
  <link rel="stylesheet" href="/assets/plugins/datatables/dataTables.bootstrap4.css">
@endsection
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Events</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Events</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Of Active Events</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Event Name</th>
                  <th>Category</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($event as $e)
                <tr id="row{{$e->id}}">
                  <td>{{$e->name}}</td>
                  <td>{{$e->category->name}}</td>
                  <td>
                    <button class="btn btn-primary edit" event-id='{{$e->id}}'><i class="fas fa-pencil-alt"></i> Edit</button>
                    <button class="btn btn-danger delete" event-id='{{$e->id}}'><i class="fas fa-trash"></i> Delete</button>
                  </td>
                  
                </tr>
                @endforeach
                
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
@section('additional_scripts')
  <script src="/assets/plugins/datatables/jquery.dataTables.js"></script>
  <script src="/assets/plugins/datatables/dataTables.bootstrap4.js"></script>
  <script>
    $("#example1").DataTable();
    $(document).ready(function(){
      $(".delete").on('click',function(){
        var eventId = $(this).attr('event-id');
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type:'DELETE',
          url:'/events/'+eventId,
          success: function(res){
            console.log(res.id);
            alert('event deleted');
            $('#row'+res.id).remove();
          }          
        });
      });
    });
  </script>
@endsection