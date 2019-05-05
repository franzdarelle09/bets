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
            <h1 class="m-0 text-dark">Teams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Teams</li>
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
              <h3 class="card-title">List Of Active Teams</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Photo</th>
                  <th>Team Name</th>
                  <th>Descriptive Name</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                <tr id="row{{$team->id}}">
                  <td class="text-center"><img src="/storage/images/teams/{{$team->photo}}" style="height: 64px;" /></td>
                  <td>{{$team->name}}</td>
                  <td>{{$team->descriptive_name}}</td>
                  <td class="text-center">
                    <button class="btn btn-primary edit" event-id='{{$team->id}}'><i class="fas fa-pencil-alt"></i> Edit</button>
                    <button class="btn btn-danger delete" event-id='{{$team->id}}'><i class="fas fa-trash"></i> Delete</button>
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
        var teamId = $(this).attr('team-id');
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type:'DELETE',
          url:'/teams/'+teamId,
          success: function(res){
            console.log(res.id);
            alert('team deleted');
            $('#row'+res.id).remove();
          }          
        });
      });
    });
  </script>
@endsection