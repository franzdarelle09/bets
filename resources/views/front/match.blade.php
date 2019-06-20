<!DOCTYPE html>
    
<html lang="en">
<head>
   <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('front.partials.head')
    <style type="text/css">
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
          -webkit-appearance: none; 
          margin: 0; 
        }
        .activea{
            border: 4px solid #3D79F1;
            font-weight: bold;
        }

        .activeb{
            border: 4px solid #F13D71;
            font-weight: bold;
        }
        .hide{
            display: none !important;
        }
    </style>
    
</head>



<body>
    
        


@include('front.partials.header')


@include('front.partials.mobile')

    

    <div class="nk-main">
        
            <!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">
        
        
        <li><a href="index.html">Home</a></li>
        
        
        <li><span class="fa fa-angle-right"></span></li>
        
        <li><span>Tournaments</span></li>
        
    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->

        

        
<div class="container">
  <div id="app">
    <div class="row vertical-gap">
        <div class="col-lg-8">

            <!-- START: Now Playing -->
            <div class="nk-match">
                <div class="nk-match-team-left">
                    <a href="#">
                        <span class="nk-match-team-logo">
                            <img src="/storage/images/teams/{{$match->teama->photo}}" alt="">
                        </span>
                        <span class="nk-match-team-name">
                            {{$match->teama->name}} <br> ({{$odds_a}})
                        </span>
                    </a>
                </div>
                <div class="nk-match-status">
                    <a href="#">
                        <span class="nk-match-status-vs">VS</span>
                        <span class="nk-match-score bg-dark-1">Now Playing</span>
                    </a>
                </div>
                <div class="nk-match-team-right">
                    <a href="#">
                        <span class="nk-match-team-name">
                             {{$match->teamb->name}} <br> ({{$odds_b}})
                        </span>
                        <span class="nk-match-team-logo">
                            <img src="/storage/images/teams/{{$match->teamb->photo}}" alt="">
                        </span>
                    </a>
                </div>
            </div>

            <!-- <div class="responsive-embed responsive-embed-16x9">
                <iframe src="{{$match->stream}}" frameborder="0" allowfullscreen="true" scrolling="no" height="378" width="620"></iframe>
            </div> -->
            <!-- END: Now Playing -->


            <!-- START: Share -->
            <div class="nk-gap"></div>
            <div class="nk-post-share">
                <span class="h5">Share Tournament:</span>

                <ul class="nk-social-links-2">
                    <li><span class="nk-social-facebook" title="Share page on Facebook" data-share="facebook"><span class="fab fa-facebook"></span></span></li>
                    <li><span class="nk-social-google-plus" title="Share page on Google+" data-share="google-plus"><span class="fab fa-google-plus"></span></span></li>
                    <li><span class="nk-social-twitter" title="Share page on Twitter" data-share="twitter"><span class="fab fa-twitter"></span></span></li>
                    <li><span class="nk-social-pinterest" title="Share page on Pinterest" data-share="pinterest"><span class="fab fa-pinterest-p"></span></span></li>

                    <!-- Additional Share Buttons
                        <li><span class="nk-social-linkedin" title="Share page on LinkedIn" data-share="linkedin"><span class="fab fa-linkedin"></span></span></li>
                        <li><span class="nk-social-vk" title="Share page on VK" data-share="vk"><span class="fab fa-vk"></span></span></li>
                    -->
                </ul>
            </div>
            <!-- END: Share -->
            <div class="nk-gap-2"></div>
            <!-- START: Links -->
            <div class="nk-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tabs-1-1" role="tab" data-toggle="tab">Match Winner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-1-2" role="tab" data-toggle="tab">Game 1 F10K</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-1-3" role="tab" data-toggle="tab">Game 2 F10K</a>
                    </li>
                </ul>
            </div>
            <!-- END: Links -->
            <!-- START: Latest Matches -->
            <div class="nk-gap-2"></div>
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> Matches</span></h3>
            <div class="nk-gap"></div>
            <div class="nk-match">
                <div class="nk-match-team-left">
                    <a href="#">
                        <span class="nk-match-team-logo">
                            <img src="/assets/images/team-1.jpg" alt="">
                        </span>
                        <span class="nk-match-team-name">
                            SK Telecom T1
                        </span>
                    </a>
                </div>
                <div class="nk-match-status">
                    <a href="#">
                        <span class="nk-match-status-vs">VS</span>
                        <span class="nk-match-status-date">Apr 28, 2018 8:00 pm</span>
                        <span class="nk-match-score bg-danger">2 : 17</span>
                    </a>
                </div>
                <div class="nk-match-team-right">
                    <a href="#">
                        <span class="nk-match-team-name">
                            Cloud 9
                        </span>
                        <span class="nk-match-team-logo">
                            <img src="/assets/images/team-2.jpg" alt="">
                        </span>
                    </a>
                </div>
            </div>

            <!-- END: Latest Matches -->

        </div>
        <div class="col-lg-4">
           
            <aside class="nk-sidebar nk-sidebar-right">
                
                
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">PLACE YOUR</span> PREDICTION</span></h4>
                    <div class="nk-widget-content" style="color: #fff;">
                        @if(Auth::check())
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-lg-12">
                                <span style="color: #fff;">Current Points: <span id="current_score">{{Auth::user()->points}}</span></span>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-lg-12">
                                <button class="btn btn-sm btn-primary" team-name="{{$match->teama->name}}" shark-tank="{{$match->teama->id}}" odds="{{$odds_a}}" id="teama" style="width:100px !important;">{{$match->teama->name}}</button>
                                <button class="btn btn-sm btn-danger" team-name="{{$match->teamb->name}}" shark-tank="{{$match->teamb->id}}" odds="{{$odds_b}}" id="teamb" style="width:100px !important;">{{$match->teamb->name}}</button>
                            </div>
                        </div>
                        <hr style="background-color: #dc3545">
                        <div id="item-placed" class="hide">
                            <div class="row">
                                <div class="col-lg-12" style="margin-right: 0px;">
                                    <input type="number" name="prediction_amount" id="prediction_amount" class="form-control prediction_amount">
                                    
                                </div>
                            </div>
                            <input type="hidden" name="odds_a" value="{{$odds_a}}">
                            <input type="hidden" name="odds_b" value="{{$odds_b}}">
                            <input type="hidden" id="current_odds" name="current_odds" value="0">
                            <input type="hidden" id="current_team" name="current_team" value="0">
                            <input type="hidden" id="slug" name="slug" value="{{$match->slug}}">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-lg-12">
                                    <button class="nk-btn nk-btn-outline nk-btn-color-success" id="predict">Predict</button>
                                </div>
                            </div>
                            <hr style="background-color: #dc3545">
                            <div class="row">
                                <div class="col-lg-12">
                                    Pick: <span id="pick"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    Potential Reward: <span id="potential_reward"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <p>Please <a href="#" data-toggle="modal" data-target="#modalLogin">Login</a></p>
                    @endif
                </div>
                
                <div class="nk-gap"></div>
                @if(!is_null($bet))
                  <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">PREDICTION</span> SLIP</span></h4>
                    <div class="nk-widget-content">
                        <table class="nk-table">
                            <tr>
                                <th>Team</th>
                                <th>Points</th>
                                <th>Reward</th>
                            </tr>
                            <tr>
                                <td>{{$bet->team->name}}</td>
                                <td>{{$bet->points}}</td>
                                <td>{{$rewards}}</td>
                            </tr>
                        </table>
                    </div>
                  </div>
                @endif
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">Next</span> Matches</span></h4>
                    <div class="nk-widget-content">
                        <div class="nk-widget-match">
                            <a href="#">
                                <span class="nk-widget-match-left">
                                    <span class="nk-widget-match-teams">
                                        <span class="nk-widget-match-team-logo">
                                            <img src="/assets/images/team-1.jpg" alt="">
                                        </span>
                                        <span class="nk-widget-match-vs">VS</span>
                                        <span class="nk-widget-match-team-logo">
                                            <img src="/assets/images/team-2.jpg" alt="">
                                        </span>
                                    </span>
                                    <span class="nk-widget-match-date">CS:GO - Apr 28, 2018 8:00 pm</span>
                                </span>
                                <span class="nk-widget-match-right">
                                    <span class="nk-match-score">
                                        Upcoming
                                    </span>
                                </span>
                            </a>
                        </div>

                        <div class="nk-widget-match">
                            <a href="#">
                                <span class="nk-widget-match-left">
                                    <span class="nk-widget-match-teams">
                                        <span class="nk-widget-match-team-logo">
                                            <img src="/assets/images/team-3.jpg" alt="">
                                        </span>
                                        <span class="nk-widget-match-vs">VS</span>
                                        <span class="nk-widget-match-team-logo">
                                            <img src="/assets/images/team-2.jpg" alt="">
                                        </span>
                                    </span>
                                    <span class="nk-widget-match-date">LoL - Apr 24, 2018 7:20 pm</span>
                                </span>
                                <span class="nk-widget-match-right">
                                    <span class="nk-match-score">
                                        Upcoming
                                    </span>
                                </span>
                            </a>
                        </div>

                        <div class="nk-widget-match">
                            <a href="#">
                                <span class="nk-widget-match-left">
                                    <span class="nk-widget-match-teams">
                                        <span class="nk-widget-match-team-logo">
                                            <img src="/assets/images/team-1.jpg" alt="">
                                        </span>
                                        <span class="nk-widget-match-vs">VS</span>
                                        <span class="nk-widget-match-team-logo">
                                            <img src="/assets/images/team-4.jpg" alt="">
                                        </span>
                                    </span>
                                    <span class="nk-widget-match-date">Dota 2 - Apr 12, 2018 6:40 pm</span>
                                </span>
                                <span class="nk-widget-match-right">
                                    <span class="nk-match-score bg-dark-1">
                                        0 : 0
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span>Facebook</span></h4>
                    <div class="nk-widget-content">
                        <div class="fb-page" data-href="https://www.facebook.com/mydota2communityPAGE/" data-width="700" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"></div>
                    </div>
                </div>

            </aside>
            <!-- END: Sidebar -->
        </div>
    </div>
  </div><!-- end app -->
</div>

<div class="nk-gap-2"></div>


        
@include('front.partials.footer')

        
</div>

    

    
        <!-- START: Page Background -->

    <img class="nk-page-background-top" src="/assets/images/bg-top-3.png" alt="">
    <img class="nk-page-background-bottom" src="/assets/images/bg-bottom.png" alt="">

<!-- END: Page Background -->



    

    

    
@include('front.partials.login')

    

    
@include('front.partials.scripts')
<script src="/js/app.js"></script>
<script type="text/javascript">
    document.querySelector(".prediction_amount").addEventListener("keypress", function (evt) {
        if (evt.which != 8 && evt.which != 190 && evt.which != 0 && evt.which < 48 || evt.which > 57)
        {
            evt.preventDefault();
        }
    });
    $(document).ready(function(){
        $("#teama").on('click',function(){
            $("#teamb").removeClass('activeb');
            $(this).addClass('activea');
            var team_name = $(this).attr('team-name');
            var odds = $(this).attr('odds');
            var shark_tank = $(this).attr('shark-tank');
            var current_team = $('#current_team').val(shark_tank);
            $("#current_odds").val(odds);
            $("#pick").html(team_name);
            $("#item-placed").removeClass('hide');

            compute();
        });

        $("#teamb").on('click',function(){
            $("#teama").removeClass('activea');
            $(this).addClass('activeb');
            var team_name = $(this).attr('team-name');
            var odds = $(this).attr('odds');
            var shark_tank = $(this).attr('shark-tank');
            var current_team = $('#current_team').val(shark_tank);
            $("#current_odds").val(odds);
            $("#pick").html(team_name);
            $("#item-placed").removeClass('hide');
            compute();
        });

        $("#prediction_amount").on("keyup",function(){
            compute();
        });

        function compute(){
            var prediction_amount = $("#prediction_amount").val();
            var current_odds = ($("#current_odds").val()*100);
            var potential_reward = (prediction_amount * current_odds) / 100;
            $("#potential_reward").html(potential_reward);
        }

        $("#predict").on('click',function(){
            var prediction_amount = $("#prediction_amount").val();
            var current_team = $("#current_team").val();
            var slug = $("#slug").val();

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
                type:'POST',
                url:'/predict',
                data:{prediction_amount:prediction_amount,current_team:current_team,slug:slug},
                success: function(res){
                    
                    if (res == 'success'){
                        toastr.success('Prediction placed');
                        window.location.reload();
                    }
                    else{
                        toastr.error(res);
                    }
                }
            });



        });
    });


    
</script>
</body>
</html>
