<?php

    /*login page design by Pirathikaran */

    session_start();
    include_once 'user.php';
    $user = new User();
    if(isset($_SESSION['login'])){
        if (($_SESSION['Administrator'] == "True")) {

            header("location:admin_dashboard.php");
        } else {
            header("location:../dashboard_for_staff/tutor_view.php");
        }
    }
    $error = 0;

   //redirection and call of login check function
    if (isset($_POST['submit'])) {
        $emailUserName = $_POST['emailusername'];
        $password = $_POST['password'];
        $login = $user->check_login($emailUserName, $password);

        //Registration Success
        if ($login) {
            if (($_SESSION['Administrator'] == "True")) {

                header("location:admin_dashboard.php");
            } else {
                header("location:../dashboard_for_staff/tutor_view.php");
            }

        // Registration Failed
        } else {

            $error = 1;

        }
    }
?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Timetable Management System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="icon" href="../assets/images/titleLogo.png" type="image/png">

        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
    </head>

    <body>

        <!--image and form-->
            <div class="container-login100" style="background:linear-gradient(to right,#4099ff,#73b4ff);">
                <div class="wrap-login100" >


                    <!--image-->
                    <div class="login100-pic js-tilt" data-tilt style="height: max-content;margin-top: 10%" >
                        <img src="../assets/images/timetable.png" alt="timetable image">
                    </div>

                    <!--form starts-->
                    <form method="POST" class="login100-form validate-form" onsubmit="return check()"  name="login" action="" >
                        <!--incorrect username or password message [start]-->
                        <?php if($error==1){   ?>

                            <div class="alert alert-danger" style="text-align: center">
                                Incorrect Username or Password !
                            </div>

                        <?php } ?>
                        <!--incorrect username or password message [end]-->

                        <!--registration success message [start]-->
                        <?php if(isset($_GET['registration'])){   ?>

                            <div class="alert alert-success" style="text-align: center">
                                Registration Successful !
                            </div>

                        <?php } ?>

                        <!--registration success message [end]-->
                        <span class="login100-form-title">
                            Log In
                        </span>

                        <div class="wrap-input100 validate-input" ">
                            <input class="input100" aria-describedby="emailHelp" id="exampleInputEmail1" type="text" name="emailusername" placeholder="Email | User Name">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <input class="input100" id="exampleInputPassword1" name="password" type="password" placeholder="Password" />
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <input onclick="return(submitlogin());" type="submit" name="submit" class="login100-form-btn" value="Login" />


                        </div>


                        <!--redirect to registration page-->
                        <div class="text-center p-t-50">
                            <a class="txt2" href="registration.php">
                                Register
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>

                        <!--redirect to home page-->
                        <div class="text-center p-t-20">
                            <a class="txt2" href="../index.php">
                                Home <i class="fas fa-home"></i>
                            </a>
                        </div>

                    </form>
                    <!--form ends-->

                </div>
            </div>



    </body>

    </html>

    <script type="text/javascript">
        function submitlogin() {
            var form = document.login;
            if (form.emailusername.value === "") {
                swal("Empty ", "Enter email or username", "warning");

                //alert("Enter email or username.");
                return false;
            } else if (form.password.value === "") {
                swal("Empty ", "Enter password", "warning");

                //alert("Enter password.");
                return false;
            }
        }



    </script>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>