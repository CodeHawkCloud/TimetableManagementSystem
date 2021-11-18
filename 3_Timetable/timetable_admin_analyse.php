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

        <!--inclusion of php scripts-->
        <?php include '../dashboard_for_staff/head.inc.php' ?>
        <?php include 'controllers/AnalyseTimetableController.php' ?>

        <!--inclusion of js and css scripts and links-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootsrap.min.css"/>

        <!--keyframes function to rotate the charts onload-->
        <style>
            @-webkit-keyframes rotateChart {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }

            @keyframes rotateChart {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }
        </style>

    </head>

    <body>

    <!--check internet connection-->
    <?php
        $internetConnection = @fsockopen("www.google.com", 80);
    ?>

    <?php include '../dashboard_for_staff/nav_and_header.inc.php'?>

    <?php
        //fetching the data from the controller
        global $countLeftChartTimetableResList;
        global $difLeft;
        global $noOfHalls;
        global $vacantCountSlots;
        global $fullCountSlots;
        global $countRightChartResList;

        $difRight = $fullCountSlots - $vacantCountSlots;
    ?>

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
                                                <li class="breadcrumb-item"><a href="timetable_admin_mainmenu_page.php">Timetable Management</a></li>
                                                <li class="breadcrumb-item"><a href="#!">Analyse</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->

                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ fixed-layout ] start -->
                                <!--donut pie chart 1-->
                                <div class="col-sm-6">
                                    <div class="card bg-patern">
                                            <div class="card-header"><h4>Hall Usage Efficiency</h4></div>

                                            <div class="card-body">
                                                <!--display donut pie chart only when the internet is available-->
                                                <?php if($internetConnection){ ?>
                                                    <div id = "pieChartLeft" style="animation: 1s ease-out 0s 1 rotateChart;">

                                                    </div>
                                                <?php }else{ ?>
                                                    <div class="card-body">
                                                        <h5 style="text-align: center;color: tomato">Please connect to the internet to view the Hall Usage Efficiency !</h5>

                                                    </div>
                                                    <i class="fa fa-2x fa-wifi"style="float:right"></i>
                                                <?php } ?>
                                            </div>

                                    </div>
                                </div>

                                <!--donut pie chart 2-->
                                <div class="col-sm-6">
                                    <div class="card bg-patern">

                                            <div class="card-header"><h4>Time Slot Allocation Efficiency</h4></div>

                                            <div class="card-body" >
                                                <!--display donut pie chart only when the internet is available-->
                                                <?php if($internetConnection){

                                                    if($countRightChartResList != 0) { ?>
                                                        <div id="pieChartRight" style="animation: 1s ease-out 0s 1 rotateChart;">

                                                        </div>

                                                <?php
                                                    //message if there are no timetables
                                                    }else{ ?>

                                                        <div class="card-body">
                                                            <h5 style="text-align: center;color: tomato;">
                                                                There are no timetables available to demonstrate slot efficiency in
                                                                a donut chart !
                                                            </h5>
                                                        </div>
                                                <?php }
                                                //error message if there is no internet connection-->
                                                }else{ ?>

                                                        <div class="card-body">
                                                            <h5 style="text-align: center;color: tomato;">Please connect
                                                                to the internet to view the Time Slot Allocation
                                                                Efficiency !
                                                            </h5>
                                                        </div>
                                                        <i class="fa fa-2x fa-wifi" style="float: right"></i>
                                                <?php } ?>
                                            </div>
                                    </div>
                                </div>

                                <!--Stats-->
                                <div class = "col-sm-12">
                                    <div class="card bg-patern">

                                            <div class="card-header"><h3>Stats</h3></div>

                                            <div class="card-body" >
                                                <!--carousel to showcase stats one by one-->
                                                <div id="statCarousel" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">

                                                        <!-- carousel items [start]-->
                                                        <div class="carousel-item active" style="text-align: center">
                                                            <h5>Total halls</h5>
                                                            <h3 style="color: navy;"><?php echo $noOfHalls; ?></h3>
                                                        </div>
                                                        <div class="carousel-item" style="text-align: center">
                                                            <h5>Halls with Timetables</h5>
                                                            <h3 style="color: green"><?php echo $countLeftChartTimetableResList; ?></h3>
                                                        </div>
                                                        <div class="carousel-item" style="text-align: center">
                                                            <h5>Halls without Timetables</h5>
                                                            <h3 style="color: tomato"><?php echo $difLeft; ?></h3>
                                                        </div>
                                                        <div class="carousel-item" style="text-align: center">
                                                            <h5>Total Time Slots of 30 minutes</h5>
                                                            <h3 style="color: navy"><?php echo $fullCountSlots; ?></h3>
                                                        </div>
                                                        <div class="carousel-item" style="text-align: center">
                                                            <h5>Occupied Time Slots of 30 minutes</h5>
                                                            <h3 style="color: green"><?php echo $difRight; ?></h3>
                                                        </div>
                                                        <div class="carousel-item" style="text-align: center">
                                                            <h5>Vacant Time Slots of 30 minutes</h5>
                                                            <h3 style="color: tomato"><?php echo $vacantCountSlots; ?></h3>
                                                        </div>
                                                        <!--carousel items[end]-->

                                                    </div>
                                                </div>

                                                <!--left and right navigation for the stat items-->
                                                <a class="carousel-control-prev" href="#statCarousel" role="button" data-slide="prev"></a>
                                                <a class="carousel-control-next" href="#statCarousel" role="button" data-slide="next"></a>

                                                <!--left and right navigation icons for item-->
                                                <i class="fa fa-chevron-left"></i>
                                                <i class="fa fa-chevron-right" style="float:right"></i>
                                            </div>
                                    </div>
                                </div>
                                <!-- [ fixed-layout ] end -->
                            </div>
                            <!-- [ Main Content ] end -->

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

    <!--Morris.js script to create the left and right donut charts-->
    <script>

        //donut chart to display the occupied and vacant halls
        Morris.Donut({
            element: 'pieChartLeft',
            data: [{label:"Occupied halls",value:<?php echo $countLeftChartTimetableResList ?>},{label:"Vacant halls",value:<?php echo $difLeft ?>}],
            resize: true,
            labelColor: '#000000',
            formatter: function (x) { return Math.round((x /<?php echo $noOfHalls ?>) * 100)  + "%" }
        });

        //chart to display the vacant slots
        Morris.Donut({
            element: 'pieChartRight',
            data: [{label:"Occupied slots",value:<?php echo $difRight ?>},{label:"Vacant slots", value:<?php echo $vacantCountSlots ?>}],
            resize: true,
            formatter: function (x) { return Math.round((x /<?php echo $fullCountSlots ?>) * 100)  + "%" }
        });
    </script>








