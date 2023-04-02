<!doctype html>
<html class="modern fixed has-top-menu has-left-sidebar-half">
<head>
    @include('.admin.includes.head')
</head>
<body>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <div class="panel card-sign">
            <div class="col-md-6">
                <a href="home" class="logo float-left">
                    <img src="{{ asset('/assets/img/logo-default.png') }}" alt="PinkAd Admin" />
                </a>
            </div>
            <div class="card-body">
                <form action="home">
                    <div class="form-group mb-3">
                        <label>Username</label>
                        <div class="input-group">
                            <input name="username" type="text" class="form-control form-control-lg" />
                            <span class="input-group-text">
										<i class="bx bx-user text-4"></i>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="clearfix">
                            <label class="float-left">Password</label>
                            <a href="forgot-password" class="float-end">Lost Password?</a>
                        </div>
                        <div class="input-group">
                            <input name="pwd" type="password" class="form-control form-control-lg" />
                            <span class="input-group-text">
										<i class="bx bx-lock text-4"></i>
									</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input id="RememberMe" name="rememberme" type="checkbox"/>
                                <label for="RememberMe">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-end">
                            <button type="" class="btn btn-primary mt-2">Sign In</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-3 mb-3"><a href="https://pinkad.pk/">PinkAd</a> &copy; Copyright 2023. All Rights Reserved.</p>
    </div>
</section>
<!-- end: page -->
<footer class="row">
    @include('.admin.includes.footer')
</footer>
</body>
</html>
