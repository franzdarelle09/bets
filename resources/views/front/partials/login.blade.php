<!-- START: Login Modal -->
<div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" id="login-close" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0"><span class="text-main-1">Sign</span> In</h4>

                <div class="nk-gap-1"></div>
                <form action="#" class="nk-form text-white">
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            Use email and password:

                            <div class="nk-gap"></div>
                            <input type="email" value="" name="email" id="signin_email" class=" form-control" placeholder="Email">

                            <div class="nk-gap"></div>
                            <input type="password" value="" name="password" id="signin_password" class="required form-control" placeholder="Password">

                            <div class="nk-gap"></div>
                            <input type="checkbox" id="remember" name="remember">&nbsp; <label for="remember">Remember Acccount</label>
                        </div>
                        <div class="col-md-6">
                            Or social account:

                            <div class="nk-gap"></div>

                            <ul class="nk-social-links-2">
                                <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                                <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                                <li><a class="nk-social-twitter" href="#"><span class="fab fa-twitter"></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="nk-gap-1"></div>
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            <a href="#" id="signin" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Sign In</a>
                        </div>
                        <div class="col-md-6">
                            <div class="mnt-5">
                                <small><a href="#">Forgot your password?</a></small>
                            </div>
                            <div class="mnt-5">
                                <small><a href="#" data-toggle="modal" id="link-to-register" data-target="#modalRegister">Not a member? Sign up</a></small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Login Modal -->

<!-- START: Register Modal -->
<div class="nk-modal modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" id="register-close" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0"><span class="text-main-1">Sign</span> Up</h4>

                <div class="nk-gap-1"></div>
                <form action="/user/signup" class="nk-form text-white">
                    <div class="row vertical-gap">
                        <div class="col-md-6">

                            <div class="nk-gap"></div>
                            <input type="email" value="" name="email" id="email" class=" form-control" placeholder="Email">

                            <div class="nk-gap"></div>
                            <input type="name" value="" name="name" id="name" class=" form-control" placeholder="Name">

                            <div class="nk-gap"></div>
                            <input type="password" value="" name="password" id="password" class="required form-control" placeholder="Password">

                            <div class="nk-gap"></div>
                            <input type="password" value="" name="password2" id="password2" class="required form-control" placeholder="Confirm Password">
                        </div>
                        <div class="col-md-6">
                            Or social account:

                            <div class="nk-gap"></div>

                            <ul class="nk-social-links-2">
                                <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                                <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                                <li><a class="nk-social-twitter" href="#"><span class="fab fa-twitter"></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="nk-gap-1"></div>
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            <a href="#" id="signup" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Sign Up</a>
                        </div>
                        <div class="col-md-6">
                            <div class="mnt-5">
                                <small><a href="#">Forgot your password?</a></small>
                            </div>
                            <div class="mnt-5">
                                <small><a href="#" data-toggle="modal" id="link-to-login" data-target="#modalLogin">Already a member? Sign in</a></small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- END: Register Modal -->
<script type="text/javascript">
    $("#signup").on('click',function(e){
        e.preventDefault();

        var email = $("#email").val();
        var name = $("#name").val();
        var password = $("#password").val();
        var password2 = $("#password2").val();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            type:'POST',
            url:'/user/signup',
            data:{email:email,name:name,password:password},
            success: function(res){
                console.log(res);
                if (res == 'success'){
                    window.location = '/';
                }else{
                    toastr.error(res);
                }
            }
        });
    });

    $("#signin").on('click',function(e){
        e.preventDefault();

        var email = $("#signin_email").val();
        var password = $("#signin_password").val();
        var remember = $("#remember").val();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            type:'POST',
            url:'/user/signin',
            data:{email:email,password:password,remember:remember},
            success: function(res){
                console.log(res);
                if (res == 'success'){
                    window.location = '/';
                }else{
                    toastr.error(res);
                }
            }
        });
    });
</script>