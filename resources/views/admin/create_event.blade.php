@extends('layouts.master')

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
              <li class="breadcrumb-item active">Create Event</li>
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
                    <h3 class="card-title">ADD EVENT</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="/events">
                    {{ csrf_field() }}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" class="form-control">
                          @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                        
                                      
                      </div>
                      <div class="form-group">
                        <label for="event_name">Event Name</label>
                        <input type="text" name="name" class="form-control" id="event_name" autocomplete="off" required>
                                      
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control" id="date" autocomplete="off" required>
                                          
                          </div>                          
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" name="time" class="form-control" id="time" autocomplete="off" required>                                          
                          </div>
                        </div>
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