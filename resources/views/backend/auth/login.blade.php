<!DOCTYPE html>
<html lang="en" class="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login - Admin</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/lib/stroke-7/style.css')  }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/lib/jquery.nanoscroller/css/nanoscroller.css')  }}"/>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/lib/theme-switcher/theme-switcher.min.css')  }}"/>
        <link type="text/css" href="{{ asset('backend/assets/css/style.css')  }}" rel="stylesheet">
    </head>
    <body class="am-splash-screen">
        <div class="am-wrapper am-login">
            <div class="am-content">
                <div class="main-content">
                    <div class="login-container">
                        <div class="panel panel-default">
                            <div class="panel-heading"><img src="{{ asset('backend/assets/img/logo-full-retina.png') }}" alt="logo" width="150px" height="39px" class="logo-img"><span>Please enter your user information.</span></div>
                            <div class="panel-body">
                                <form action="{{ route('backend.authenticate') }}" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="login-form">
                                        <div class="form-group">
                                            <div class="input-group"><span class="input-group-addon"><i class="icon s7-user"></i></span>
                                            <input id="email" name="email" type="text" placeholder="email" autocomplete="off" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group"><span class="input-group-addon"><i class="icon s7-lock"></i></span>
                                        <input id="password" name="password" type="password" placeholder="Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group login-submit">
                                    <button data-dismiss="modal" type="submit" class="btn btn-primary btn-lg">Log me in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('backend/assets/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/lib/theme-switcher/theme-switcher.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        App.init();
    });
</script>
</body>