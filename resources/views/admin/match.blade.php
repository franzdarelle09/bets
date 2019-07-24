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
        <div class="row" style="margin-bottom: 20px;">
          <div class="col-md-6">
            <select name="match_list" class="form-control match_list" id="match_list">
              @foreach($match_list as $ml)
                <option value="{{$ml->slug}}" @if($match->slug == $ml->slug) selected  @endif>{{$ml->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Match Details</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  
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
                            <input type="date" class="form-control" id="manual-date" name="manual_date" value="{{$date}}">
                          </div>
                          <div class="col-md-6">
                            <input type="time" class="form-control" id="manual-time" name="manual_time" value="{{$time}}">
                          </div>
                        </div>
                      </div>

                      
                      
                      
                      
                      
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="button" id="btn-manual" class="btn btn-primary" match-id="{{$match->id}}">Submit</button>
                    </div>
                  </form>
                </div>

            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Game Settings</h3>
                  </div>
                 
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label>Winner</label>
                        <div>
                          <button class="btn btn-primary winner" match-id="{{$match->id}}" team-id="{{$match->teama->id}}" type="button" style="width: 200px;">{{$match->teama->name}}</button>
                          <button class="btn btn-primary winner" match-id="{{$match->id}}" team-id="{{$match->teamb->id}}" style="width: 200px;">{{$match->teamb->name}}</button>
                          
                        </div>
                                      
                      </div>

                      
                      
                      
                      
                      
                    </div>
                    <!-- /.card-body -->
                    
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" style="visibility: hidden;">Submit</button>
                    </div>
                   
                  
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
  
 
    $("#add_five_to_current").on('click',function(){
        var matchId = $(this).attr('match-id');
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type:'POST',
          url:'/add-time',
          data:{match_id: matchId},
          success: function(res){
            // console.log(res.id);
            alert(res);
            
            // $('#row'+res.id).remove();
          }          
        });
    });

    $("#btn-manual").on("click",function(){
      var date = $("#manual-date").val();
      var time = $("#manual-time").val();
      var matchId = $(this).attr('match-id');

      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          type:'POST',
          url:'/manual-time',
          data:{match_id: matchId,date:date,time:time},
          success: function(res){
            // console.log(res.id);
            alert(res);
            
            // $('#row'+res.id).remove();
          }          
      });


    });

    $("#match_list").on("change",function(){
      slug = $(this).val();
      window.location="/admin/match/"+slug;
    });

    $(".winner").on("click",function(){
      match_id = $(this).attr('match-id');
      team_id = $(this).attr('team-id');

      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        type:'POST',
        url:'/api/declare-winner',
        data:{team_id:team_id,match_id:match_id},
        success: function(res){
          alert('winner declared');
        }
      });  
    });


</script>
@endsection