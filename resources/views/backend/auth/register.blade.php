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
                            <div class="panel-heading"><img src="assets/img/logo-full-retina.png" alt="logo" width="150px" height="39px" class="logo-img"><span>Please enter your user information.</span></div>
                            <div class="panel-body">
                                <form action="{{ route('supplier.storeSupplier') }}" novalidate="" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="sign-up-form">
                                        <div class="form-group">
                                            <div id="nick-handler" class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon s7-user"></i>
                                                </span>
                                                <input type="text" name="first_name" required="" placeholder="First Name" autocomplete="off" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div id="nick-handler" class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon s7-user"></i>
                                                </span>
                                                <input type="text" name="last_name" equired="" placeholder="Last Name" autocomplete="off" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div id="nick-handler" class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon s7-user"></i>
                                                </span>
                                                <input type="text" name="email" required="" placeholder="E-mail" autocomplete="off" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div id="password-handler" class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="icon s7-lock"></i>
                                                    </span>
                                                    <input type="password" name="password" placeholder="Password" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div id="confirm-handler" class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="icon s7-lock"></i>
                                                    </span>
                                                    <input type="password" name="confirmation_password" required="" placeholder="Confirm" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Sign Up</button>
                                </form>
                            </div>
                        </div>
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