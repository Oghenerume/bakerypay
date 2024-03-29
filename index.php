<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Options Admin - Responsive Web Application Kit - Login</title>

        <!-- ========== COMMON STYLES ========== -->
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >

        <!-- ========== PAGE STYLES ========== -->
        <link rel="stylesheet" href="css/icheck/skins/flat/blue.css" >

        <!-- ========== THEME CSS ========== -->
        <link rel="stylesheet" href="css/main.css" media="screen" >

        <!-- ========== MODERNIZR ========== -->
        <script src="js/modernizr/modernizr.min.js"></script>
        <link href="css/sweetalert.css" rel="stylesheet">
    </head>
    <body class="">
        <div class="main-wrapper">

            <div class="login-bg-color bg-black-300">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel login-box">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <h4>BakeryPay -  Login</h4>
                                </div>
                            </div>
                            <div class="panel-body p-20">

                                <form>
                                	<div class="form-group">
                                		<label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email Id" autocomplete="off" >
                                	</div>
                                	<div class="form-group">
                                		<label for="exampleInputPassword1">Password</label>
                                		<input type="password" class="form-control" id="password" placeholder="Password">
                                	</div>
                                    <div class="form-group mt-20">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-labeled pull-right" id="btnsign">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>

                                <hr>

                            </div>
                        </div>
                        <!-- /.panel -->
                        <p class="text-muted text-center"><small>Copyright © BakeryPay 2019</small></p>
                    </div>
                    <!-- /.col-md-6 col-md-offset-3 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script src="js/sweetalert.min.js"></script>
        <script src="js/validate.js"></script>
        <script>
            $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
            });

            $('#btnsign').click(function (e) {
                e.preventDefault();
                var username = $('#email').val();
                var password = $('#password').val();
                var validate_array = [{'value': username, 'type': 'string', 'name': "Username"}, {
                    'value': password,
                    'type': 'string',
                    'name': "Password"
                }];
                validate_result = validateForm(validate_array);
                if (validate_result['error'] === 0) {

                    $.ajax({
                        type: "POST",
                        url: "scripts/loginscript.php",
                        data: {username: username, password: password, functionID: 1},

                        success: function (msg) {
                            console.log('this is it' + msg);

                            if (msg === "1001") {
                                window.location.replace('pages/dashboard.php');
                            } else {
                                sweetAlert("Oops...", msg, "error");
                                return false;
                            }

                        }
                    });

                    return false;
                }
                else {
                    sweetAlert("Oops...", validate_result['message'], "error");
                    return false;
                }

            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
