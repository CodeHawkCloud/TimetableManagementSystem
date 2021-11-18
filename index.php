<?php

    session_start();
    if(isset($_SESSION['login'])){
        $_SESSION['login'] = FALSE;
        session_destroy();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Timetable Management System</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- title icon -->
    <link rel="icon" href="assets/images/titleLogo.png" type="image/png">
    <!-- prism css -->
    <link rel="stylesheet" href="assets/css/plugins/prism-coy.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .m-header {
            width: 100% !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pcoded-main-container {
            margin-left: unset;
            display: flex;
            align-content: center;
            align-items: center;
        }

        .notification-card {
            cursor: pointer !important;
        }
    </style>

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper container">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">

                            <!-- [ Main Content ] start -->
                            <div class="row justify-content-center">

                                <div class="col-md-6 col-xl-3">
                                    <a href="1_Staff/login.php">
                                        <div class="card bg-c-blue notification-card">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-4 notify-icon"><i class="fas fa-user-tie"></i></div>
                                                    <div class="col-8 notify-cont">
                                                        <h4>Staff</h4>
                                                        <p>Portal</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>


    <!-- prism Js -->
    <script src="assets/js/plugins/prism.js"></script>

</body>

</html>