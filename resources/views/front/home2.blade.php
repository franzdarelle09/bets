<!DOCTYPE html>

    
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('front.partials.head')
    
    
</head>


<!--
    Additional Classes:
        .nk-page-boxed
-->
<body>
    
        

@include('front.partials.header')


@include('front.partials.mobile')
    

    <div class="nk-main">
        
            <div class="nk-gap-2"></div>
        

        
<div class="container">
<div id="app">
    @include('front.partials.slider')

    <!-- START: Categories -->
    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="assets/images/icon-mouse.png" alt="">
                </div>
                <div class="nk-feature-cont">
                    <h3 class="nk-feature-title"><a href="#">PC</a></h3>
                    <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="assets/images/icon-gamepad.png" alt="">
                </div>
                <div class="nk-feature-cont">
                    <h3 class="nk-feature-title"><a href="#">PS4</a></h3>
                    <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="assets/images/icon-gamepad-2.png" alt="">
                </div>
                <div class="nk-feature-cont">
                    <h3 class="nk-feature-title"><a href="#">Xbox</a></h3>
                    <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Categories -->



   


    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-8">

            

            <!-- START: Tabbed News  -->
            <!-- <div class="nk-gap-3"></div> -->
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> Matches</span></h3>
            <div class="nk-gap"></div>
            <div class="nk-tabs">
                <!--
                    Additional Classes:
                        .nav-tabs-fill
                -->
                <ul class="nav nav-tabs nav-tabs-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tabs-1-1" role="tab" data-toggle="tab">ALL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-1-2" role="tab" data-toggle="tab">DOTA 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-1-3" role="tab" data-toggle="tab">CSGO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-1-4" role="tab" data-toggle="tab">LOL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-1-5" role="tab" data-toggle="tab">SPORTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-1-6" role="tab" data-toggle="tab">OTHERS</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="tabs-1-1">
                        <div class="nk-gap"></div>
                        <!-- START: Action Tab -->
                        <div class="nk-match">
                            <div class="nk-match-team-left">
                                <a href="#">
                                    <span class="nk-match-team-logo">
                                        <img src="assets/images/team-1.jpg" alt="">
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
                                    <span class="nk-match-score bg-danger">
                                        2 : 17
                                    </span>
                                </a>
                            </div>
                            <div class="nk-match-team-right">
                                <a href="#">
                                    <span class="nk-match-team-name">
                                        Cloud 9
                                    </span>
                                    <span class="nk-match-team-logo">
                                        <img src="assets/images/team-2.jpg" alt="">
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="nk-match">
                            <div class="nk-match-team-left">
                                <a href="#">
                                    <span class="nk-match-team-logo">
                                        <img src="assets/images/team-3.jpg" alt="">
                                    </span>
                                    <span class="nk-match-team-name">
                                        Counted logic gaming
                                    </span>
                                </a>
                            </div>
                            <div class="nk-match-status">
                                <a href="#">
                                    <span class="nk-match-status-vs">VS</span>
                                    <span class="nk-match-status-date">Apr 15, 2018 9:00 pm</span>
                                    <span class="nk-match-score bg-success">
                                        28 : 19
                                    </span>
                                </a>
                            </div>
                            <div class="nk-match-team-right">
                                <a href="#">
                                    <span class="nk-match-team-name">
                                        SK Telecom T1
                                    </span>
                                    <span class="nk-match-team-logo">
                                        <img src="assets/images/team-1.jpg" alt="">
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="nk-match">
                            <div class="nk-match-team-left">
                                <a href="#">
                                    <span class="nk-match-team-logo">
                                        <img src="assets/images/team-4.jpg" alt="">
                                    </span>
                                    <span class="nk-match-team-name">
                                        Team SoloMid
                                    </span>
                                </a>
                            </div>
                            <div class="nk-match-status">
                                <a href="#">
                                    <span class="nk-match-status-vs">VS</span>
                                    <span class="nk-match-status-date">Apr 28, 2018 8:00 pm</span>
                                    <span class="nk-match-score bg-dark-1">
                                        13 : 13
                                    </span>
                                </a>
                            </div>
                            <div class="nk-match-team-right">
                                <a href="#">
                                    <span class="nk-match-team-name">
                                        SK Telecom T1
                                    </span>
                                    <span class="nk-match-team-logo">
                                        <img src="assets/images/team-1.jpg" alt="">
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- END: Action Tab -->
                        <div class="nk-gap"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-1-2">
                        <div class="nk-gap"></div>
                        <!-- START: MMO Tab -->
                        mmo2
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-1-3">
                        <div class="nk-gap"></div>

                        <!-- END: Strategy Tab -->
                        <div class="nk-gap"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-1-4">
                        <div class="nk-gap"></div>
                        <!-- START: Adventure Tab -->
                        





                        <!-- END: Adventure Tab -->
                        <div class="nk-gap"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-1-5">
                        <div class="nk-gap"></div>
                        <!-- START: Racing Tab -->
                        




                        <!-- END: Racing Tab -->
                        <div class="nk-gap"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-1-6">
                        <div class="nk-gap"></div>
                        <!-- START: Indie Tab -->
                        

                        indie


                        <!-- END: Indie Tab -->
                        <div class="nk-gap"></div>
                    </div>
                </div>
            </div>
            <!-- END: Tabbed News -->


            
        </div>
        <div class="col-lg-4">
            
            <aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
            <div class="nk-gap"></div>   
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">We</span> Are Social</span></h4>
                    <div class="nk-widget-content">
                        
                        <ul class="nk-social-links-3 nk-social-links-cols-4">
                            <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a></li>
                            <li><a class="nk-social-instagram" href="#"><span class="fab fa-instagram"></span></a></li>
                            <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                            <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                            <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube"></span></a></li>
                            <li><a class="nk-social-twitter" href="https://twitter.com/nkdevv" target="_blank"><span class="fab fa-twitter"></span></a></li>
                            <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a></li>
                            <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>

                          
                        </ul>
                    </div>
                </div>
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">Next</span> Matches</span></h4>
                    <div class="nk-widget-content">
                        <div class="nk-widget-match">
                            <a href="#">
                                <span class="nk-widget-match-left">
                                    <span class="nk-widget-match-teams">
                                        <span class="nk-widget-match-team-logo">
                                            <img src="assets/images/team-1.jpg" alt="">
                                        </span>
                                        <span class="nk-widget-match-vs">VS</span>
                                        <span class="nk-widget-match-team-logo">
                                            <img src="assets/images/team-2.jpg" alt="">
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
                                            <img src="assets/images/team-3.jpg" alt="">
                                        </span>
                                        <span class="nk-widget-match-vs">VS</span>
                                        <span class="nk-widget-match-team-logo">
                                            <img src="assets/images/team-2.jpg" alt="">
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
                                            <img src="assets/images/team-1.jpg" alt="">
                                        </span>
                                        <span class="nk-widget-match-vs">VS</span>
                                        <span class="nk-widget-match-team-logo">
                                            <img src="assets/images/team-4.jpg" alt="">
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


            </aside>
            <!-- END: Sidebar -->
        </div>
    </div>
</div>
</div><!-- container -->

<div class="nk-gap-4"></div>


        
@include('front.partials.footer')

        
    </div>

    

    
        <!-- START: Page Background -->

    <img class="nk-page-background-top" src="assets/images/bg-top.png" alt="">
    <img class="nk-page-background-bottom" src="assets/images/bg-bottom.png" alt="">

<!-- END: Page Background -->

    

    
        <!-- START: Search Modal -->
<div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0">Search</h4>

                <div class="nk-gap-1"></div>
                <form action="#" class="nk-form nk-form-style-1">
                    <input type="text" value="" name="search" class="form-control" placeholder="Type something and press Enter" autofocus>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Search Modal -->
    

    
@include('front.partials.login')

    

    
@include('front.partials.scripts')
<script src="/js/app.js"></script>
    
</body>
</html>
