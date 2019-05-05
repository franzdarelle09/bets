@extends('layouts.master')

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
              <li class="breadcrumb-item active">Create Team</li>
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
            <div class="col-md-6 offset-md-3">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">ADD TEAM</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" enctype="multipart/form-data" method="post" action="/teams">
                    {{ csrf_field() }}
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label for="team_name">Team Name</label>
                        <input type="text" name="name" class="form-control" id="team_name" autocomplete="off" required>
                                      
                      </div>

                      <div class="form-group">
                        <label for="descriptive_name">Descriptive Name</label>
                        <input type="text" name="descriptive_name" class="form-control" id="descriptive_name" autocomplete="off" required>
                                      
                      </div>
                      <div class="form-group">
                        <label for="image">Photo</label><br>
                        <input type="file" name="image" id="image" autocomplete="off" accept="image/*" required>
                                      
                      </div>
                      
                      
                      
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>

            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection