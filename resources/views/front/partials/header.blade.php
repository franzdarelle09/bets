<header class="nk-header nk-header-opaque">

    
    
<!-- START: Top Contacts -->
<div class="nk-contacts-top">
    <div class="container">
        <div class="nk-contacts-left">
            <ul class="nk-social-links">
                <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>
                <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a></li>
                <li><a class="nk-social-steam" href="#"><span class="fab fa-steam"></span></a></li>
                <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                <li><a class="nk-social-twitter" href="https://twitter.com/nkdevv" target="_blank"><span class="fab fa-twitter"></span></a></li>
                <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a></li>

            </ul>
        </div>
        <div class="nk-contacts-right">
            <ul class="nk-contacts-icons">
                @if(!Auth::check())
                    <li>
                        <a href="#" data-toggle="modal" data-target="#modalRegister">
                            <button class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-info">Register</button>
                        </a>
                    </li>
                    
                    
                    <li>
                        <a href="#" data-toggle="modal" data-target="#modalLogin">
                            <button class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-info">Login</button>
                        </a>
                    </li>
                
                @endif
                
                
                
            </ul>
        </div>
    </div>
</div>
<!-- END: Top Contacts -->

    

    <!--
        START: Navbar

        Additional Classes:
            .nk-navbar-sticky
            .nk-navbar-transparent
            .nk-navbar-autohide
    -->
    <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
        <div class="container">
            <div class="nk-nav-table">
                
                <a href="/" class="nk-nav-logo">
                    <img src="/assets/images/logo.png" alt="GoodGames" width="199">
                </a>
                
                <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">
                    
        <li class=" nk-drop-item">
            <a href="/">
                Home
                
            </a>
            <ul class="dropdown">
                        
                    <li>
                        <a href="elements.html">
                            Elements (Shortcodes)
                            
                        </a>
                    </li>
                    <li class=" nk-drop-item">
                        <a href="forum.html">
                            Forum
                            
                        </a>
                        <ul class="dropdown">
                                        
                            <li>
                                <a href="forum.html">
                                    Forum
                                    
                                </a>
                            </li>
                            <li>
                                <a href="forum-topics.html">
                                    Topics
                                    
                                </a>
                            </li>
                            <li>
                                <a href="forum-single-topic.html">
                                    Single Topic
                                    
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html">
                            Widgets
                            
                        </a>
                    </li>
                    <li>
                        <a href="coming-soon.html">
                            Coming Soon
                            
                        </a>
                    </li>
                    <li>
                        <a href="offline.html">
                            Offline
                            
                        </a>
                    </li>
                    <li>
                        <a href="404.html">
                            404
                            
                        </a>
                    </li>
            </ul>
        </li>
      
        <li>
            <a href="/matches">
                Matches
                
            </a>
        </li>
        <li>
            <a href="/matches">
                Market
                
            </a>
        </li>
        
                @if(Auth::check())
                    <li class="nk-drop-item">
                        <a href="/my-account">
                            {{Auth::user()->name }} 
                            <span class="badge badge-primary" style="color: white; padding: 5px !important;">
                                @if (Auth::user()->points % 1 == 0)
                                    {{number_format(Auth::user()->points,0)}}
                                @else
                                    {{number_format(Auth::user()->points,2)}}
                                @endif 
                                POINTS
                            </span>
                        </a>
                          <ul class="dropdown">
                            <li>
                                <a href="/recharge">
                                    Recharge
                                    
                                </a>
                            </li>
                            <li>
                                <a href="/my-account">
                                    My Account
                                    
                                </a>
                            </li>
                            <li>
                                <a href="/user/signout">
                                    Sign Out
                                    
                                </a>
                            </li>
                           </ul>
                    </li>
                @endif
                    
                
                
            
        
        
                </ul>
                <ul class="nk-nav nk-nav-right nk-nav-icons">
                    
                        <li class="single-icon d-lg-none">
                            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>
                    
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- END: Navbar -->

</header>