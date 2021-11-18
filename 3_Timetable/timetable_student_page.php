<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

    include '../homepage_for_student/session_for_student.php'; session_start(); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../homepage_for_student/head.inc.php' ?>
        <?php include dirname(__FILE__).'/controllers/ViewRelevantStudentTimetableController.php' ?>
    </head>

    <body>

        <?php include '../homepage_for_student/nav_and_header.inc.php'?>

        <!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper container">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="page-header-title">
                                                    <!-- [ IMS: page title ] -->
                                                    <h5 class="m-b-10">My Timetables</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <!-- [ IMS: breadcrumb ] -->
                                                    <li class="breadcrumb-item"><a href="../homepage_for_student/homepage.php"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#!">My Timetables</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Main Content ] start -->
                                <div class="row">
                                    <?php

                                    //new ITimetableServiceImplementation created to view all the timetables
                                    $timetableViewStudents = new ITimetableServiceImplementation();

                                    $timetableResListStudents = $timetableViewStudents->viewAllTimetables();
                                    if(!empty($timetableResListStudents)) {
                                        //[for loop to display all the timetables] start
                                        for ($k = 0; $k < count($timetableResListStudents); $k++) {

                                            ?>

                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">

                                                        <!--ech out the timetable id -->
                                                        <h5><?php print_r($timetableResListStudents[$k]); ?></h5>

                                                        <!-- [Timetable view]-->
                                                        <table class="table table-hover">

                                                            <!-- [column names] -->
                                                            <tr>
                                                                <th>Time</th>
                                                                <th>Monday</th>
                                                                <th>Tuesday</th>
                                                                <th>Wednesday</th>
                                                                <th>Thursday</th>
                                                                <th>Friday</th>
                                                                <th>Saturday</th>
                                                                <th>Sunday</th>
                                                            </tr>

                                                            <!-- [rows] -->
                                                            <!--for loop to iterate rows-->
                                                            <?php
                                                            //start and end times
                                                            $timeslot_start = 8;
                                                            $timeslot_end = 17;
                                                            for ($timeslot_start; $timeslot_start <= $timeslot_end; $timeslot_start++) {

                                                                $min_start = 00;
                                                                $min_start = str_pad($min_start, 2, '0', STR_PAD_LEFT);
                                                                $min_end = 00;
                                                                $min_end = str_pad($min_end, 2, '0', STR_PAD_LEFT);
                                                                for ($min_start; $min_start <= 30; $min_start += 30) {
                                                                    ?>
                                                                    <tr>
                                                                        <!-- [set end min] start -->
                                                                        <?php if ($min_start == 00) {
                                                                            $min_end = 30;
                                                                            $end_hr = $timeslot_start;
                                                                        } else {
                                                                            $min_end = 00;
                                                                            $min_end = str_pad($min_end, 2, '0', STR_PAD_LEFT);
                                                                            $end_hr = $timeslot_start + 1;
                                                                        } ?>
                                                                        <!-- [time] -->
                                                                        <td>
                                                                            <?php echo $timeslot_start . ":" . $min_start ?>
                                                                            - <?php echo $end_hr . ":" . $min_end ?>
                                                                        </td>

                                                                        <!-- for loop to iterate the column data for a row -->
                                                                        <?php for ($i = 1; $i <= 7; $i++) {

                                                                            //new ITimetableCellServiceImplementation() to set the the id and retrieve data
                                                                            $tcsvS = new ITimetableCellServiceImplementation();
                                                                            TimetableCell::setTimeId($timetableResListStudents[$k]);

                                                                            //viewAllTimetableCells() method called
                                                                            $tcsvS->viewAllTimetableCells(TimetableCell::getTimeId(), $i, $timeslot_start, $min_start);

                                                                            ?>

                                                                            <td>
                                                                                <?php echo TimetableCell::getTutorId() ?></br>
                                                                                <?php echo TimetableCell::getSubjectId() ?>
                                                                            </td>
                                                                        <?php } ?>
                                                                        <!--for loop to iterate the column data for a row end -->

                                                                    </tr>
                                                                <?php } ?>
                                                            <?php } ?>
                                                            <!--for loop to iterate rows end -->

                                                        </table>
                                                        <!-- [Timetable view] end -->

                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        //for loop to display all the timetables] end
                                    }
                                    //if there is no timetables to show else statement executes
                                    else{ ?>
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class = "alert alert-primary">
                                                        <h4 class="alert-heading">
                                                            There Are No Timetables Available!
                                                        </h4>
                                                        <br>
                                                        <p>
                                                            The Institute Management System does not contain any timetables to be displayed.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
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

        <?php include'../homepage_for_student/req_js.inc.php' ?>
    </body>

    </html>
