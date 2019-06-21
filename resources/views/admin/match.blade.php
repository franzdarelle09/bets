@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$match->teama->name}} vs {{$match->teamb->name}} - {{strtoupper($match->category->name)}}</h1>
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
            <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Match Details</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" enctype="multipart/form-data" method="post" action="/teams">
                    {{ csrf_field() }}
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label>Time Settings</label>
                        <div>
                          <button class="btn btn-primary" match-id="{{$match->id}}" action="add_to_current" time="5" type="button" style="width: 200px;" id="add_five_to_current">Add 5 minutes to current</button>
                          <button class="btn btn-primary" style="width: 200px;">Add 5 minutes</button>
                          
                        </div>
                                      
                      </div>

                      
                      
                      
                      
                      
                    </div>
                    <!-- /.card-body -->
                    
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" style="visibility: hidden;">Submit</button>
                    </div>
                   
                  </form>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Schedule</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" enctype="multipart/form-data" method="post" action="/teams">
                    {{ csrf_field() }}
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label>Set Time Manually</label>
                        <div class="row mx-0">
                          <div class="col-md-6 mx-0 px-0">
                            <input type="date" class="form-control" name="manual_date">
                          </div>
                          <div class="col-md-6">
                            <input type="time" class="form-control" name="manual_time">
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
@section('additional_scripts')
<script type="text/javascript">
  $("#add_five_to_current").on("click",function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    match_id = $(this).attr('match-id');
    action = $(this).attr('action');
    time = $(this).attr('time');
    $.ajax({
      type:'POST',
      url:'/add-time/',
      data:{match_id:match_id,action:action,time:time},
      success: function(res){
        console.log(res.id);
        alert('time added');
        
      }          
    });
  });
</script>
@endsection