<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

    include '../dashboard_for_staff/session_for_staff.php'; ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <?php include '../dashboard_for_staff/head.inc.php' ?>
    </head>

    <body>

        <?php include '../dashboard_for_staff/nav_and_header.inc.php'?>

        <!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- [ breadcrumb ] start -->
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="page-header-title">
                                                    <!-- [ IMS: page title ] -->
                                                    <h5 class="m-b-10">Timetable management</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <!-- [ IMS: breadcrumb ] -->
                                                    <li class="breadcrumb-item"><a href="../1_Staff/admin_dashboard.php"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#!">Timetable Management</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ breadcrumb ] end -->

                                <!-- [ Main Content ] start -->
                                    <div class="row">

                                        <!--[button to navigate to the insert timetable function] end-->
                                        <div class="col-sm-4">
                                            <div class="card text-white bg-success ">
                                                <div class="card-header">
                                                    <h4 class="card-title text-light"><a class="text-light" href="timetable_admin_insert_main_page.php"> Add New Timetables</a></h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title text-white"><a href="timetable_admin_insert_main_page.php"><i class="fa fa-plus text-light"></i></a></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <!--[button to navigate to the insert timetable function] end-->

                                        <!--[button to navigate to the update timetable function] start-->
                                        <div class="col-sm-4">
                                            <div class="card text-white bg-warning ">
                                                <div class="card-header">
                                                    <h4 class="card-title text-light"><a class="text-light" href="timetable_admin_update_main_page.php">Update Timetables</a></h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title text-light"><a href="timetable_admin_update_main_page.php"><i class="fa fa-pen text-light"></i></a></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <!--[button to navigate to the update timetable function] end-->

                                        <!--[button to navigate to the delete timetable function] start-->
                                        <div class="col-sm-4">
                                            <div class="card text-white bg-danger ">
                                                <div class="card-header">
                                                    <h4 class="card-title text-light"><a class="text-light" href="timetable_admin_delete_page.php">Delete Timetables</a></h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title text-light"><a href="timetable_admin_delete_page.php"><i class="fa fa-trash text-light"></i></a></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <!--[button to navigate to the delete timetable function] end-->

                                        <!--[button to navigate to the view timetable function] start-->
                                        <div class="col-sm-4">
                                            <div class="card text-white bg-info ">
                                                <div class="card-header">
                                                    <h4 class="card-title text-light"><a class="text-light" href="timetable_admin_view_page.php">View All Timetables</a></h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title text-light"><a href="timetable_admin_view_page.php"><i class="fa fa-eye text-light"></i></a></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <!--[button to navigate to the view timetable function] end-->

                                        <!--[button to navigate to the view individual function] start-->
                                        <div class="col-sm-4">
                                            <div class="card text-white bg-instagram ">
                                                <div class="card-header">
                                                    <h4 class="card-title text-light"><a class="text-light" href="timetable_admin_view_individual_main_page.php">View Individual Timetable</a></h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title text-light"><a href="timetable_admin_view_individual_main_page.php"><i class="fa fa-filter text-light"></i></a></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <!--[button to navigate to the analysis function] start-->

                                        <div class="col-sm-4">
                                            <div class="card text-white bg-c-purple ">
                                                <div class="card-header">
                                                    <h4 class="card-title text-light"><a class="text-light" href="timetable_admin_analyse.php">Analysis</a></h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title text-light"><a href="timetable_admin_analyse.php"><i class="fas fa-chart-pie text-light"></i></a></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <!--[button to navigate to the analysis function] end-->
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->

        <?php include'../dashboard_for_staff/req_js.inc.php' ?>
    </body>

    </html>



