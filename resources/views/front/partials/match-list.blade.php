
	<div>

            <!-- START: Tabbed News  -->
            <!-- <div class="nk-gap-3"></div> -->
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> Matches</span></h3>
            <div class="nk-gap"></div>
            <div class="nk-tabs">
                <!--
                    Additional Classes:
                        .nav-tabs-fill
                -->
                <ul class="nav nav-tabs nav-tabs-fill" >
                    <li class="nav-item">
                        <a class="nav-link active" href="#">ALL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">DOTA 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CSGO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">LOL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SPORTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">OTHERS</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="tabs-1-1">
                        <div class="nk-gap"></div>
                        <!-- START: Action Tab -->
                        @foreach($matches as $match)
                            <div class="nk-match" v-for="match in matches" :key="match.id">
                                <div class="nk-match-team-left">
                                    <a href="/match/{{$match->slug}}">
                                        <span class="nk-match-team-logo">
                                            <img src="/storage/images/teams/{{$match->teama->photo}}" alt="">
                                        </span>
                                        <span class="nk-match-team-name">
                                            {{$match->teama->name}}
                                            <br>{{$match->odds_a}}
                                        </span>
                                    </a>
                                </div>
                                <div class="nk-match-status">
                                    <a :href="'/match/'+match.slug">
                                        <span class="nk-match-status-vs">[BO{{$match->number_of_matches}}] {{$match->event->name}}</span>
                                        <span class="nk-match-status-date">
                                            
                                        </span>
                                        <span class="nk-match-score bg-danger">
                                            {{$match->time}}
                                        </span>
                                    </a>
                                </div>
                                <div class="nk-match-team-right">
                                    <a href="/match/{{$match->slug}}">
                                        <span class="nk-match-team-logo">
                                            <img src="/storage/images/teams/{{$match->teamb->photo}}" alt="">
                                        </span>
                                        <span class="nk-match-team-name">
                                            {{$match->teamb->name}}
                                            <br>{{$match->odds_b}}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endforeach

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
