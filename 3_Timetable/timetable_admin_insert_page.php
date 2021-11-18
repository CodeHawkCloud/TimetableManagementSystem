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

        <?php include '../dashboard_for_staff/head.inc.php' ?>
        <?php include 'mysql_db_connection.inc.php' ?>

    </head>

    <body>

        <!-- get from URL the id that was entered-->
        <?php $timeId = $_GET['timetable']; ?>
        <!--get from URL if there was an combo error-->
        <?php
            if(isset($_GET['comboTutor'])){
                $comboTimetable = $_GET['comboTimetable'];
                $comboStartTime = $_GET['comboStartTime'];
                $comboMin = $_GET['comboMin'];
                $comboDay = $_GET['comboDay'];
                $comboTutorName = $_GET['comboTutorName'];
                $comboDouble = $_GET['double'];
            }
        ?>
        <?php include '../dashboard_for_staff/nav_and_header.inc.php' ?>

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
                                                    <li class="breadcrumb-item"><a href="#!">Create new timetable</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ breadcrumb ] end -->

                                <!-- [ Main Content ] start -->
                                <div class="row">
                                    <!-- [ fixed-layout ] start -->

                                    <!--combo tutor error message start-->
                                    <?php if(isset($_GET['comboTutor'])){ ?>
                                        <div class="col-sm-12">
                                            <div class="card">
                                                    <div class="card-body">
                                                        <div class = "alert alert-danger">
                                                            <h4 class = "alert-heading">Timetable Submission Failed</h4>

                                                            <?php if(strcmp("$comboDouble","false") == 0){ ?>
                                                                <p>
                                                                    The timetable <?php echo $timeId ?> was not added to the system, because tutor <?php echo $comboTutorName ?>
                                                                    is already allocated to venue <?php echo $comboTimetable ?> at <?php echo $comboStartTime.":".$comboMin ?>
                                                                    on <?php echo $comboDay?>!
                                                                </p>
                                                                <hr>
                                                                <p>
                                                                    Please update timetable <?php echo $comboTimetable ?> or select valid time slots for the tutor in the <?php echo $timeId ?> timetable !
                                                                </p>
                                                            <?php }else{ ?>
                                                                <p>
                                                                    The timetable <?php echo $timeId ?> was not added to the system, because tutor <?php echo $comboTutorName ?>
                                                                    was entered twice in this timetable at <?php echo $comboStartTime.":".$comboMin ?> on <?php echo $comboDay?>!
                                                                </p>

                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!--combo tutor error message end-->

                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <!--[Timetable form] start -->
                                                <form method="post" action="controllers/AddTimetableController.php?timetable=<?php echo $timeId ?>">

                                                    <table class="table table-hover"">
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
                                                            $timeslot_start = 8;
                                                            $timeslot_end = 17;
                                                            for ($timeslot_start; $timeslot_start <= $timeslot_end; $timeslot_start++) {

                                                                $min_start = 00;
                                                                $min_start =str_pad($min_start, 2, '0', STR_PAD_LEFT);
                                                                $min_end = 00;
                                                                $min_end = str_pad($min_end, 2, '0', STR_PAD_LEFT);
                                                                for ($min_start; $min_start <=30 ; $min_start += 30){ ?>
                                                                    <tr>
                                                                        <!-- [set end min] start -->
                                                                        <?php if($min_start == 00){
                                                                            $min_end = 30;
                                                                            $end_hr = $timeslot_start;
                                                                        }
                                                                        else{
                                                                            $min_end = 00;
                                                                            $min_end = str_pad($min_end,2,'0',STR_PAD_LEFT);
                                                                            $end_hr = $timeslot_start + 1;
                                                                        }?>
                                                                        <!-- [set end min] end -->
                                                                        <!-- [time] -->
                                                                        <td>
                                                                            <?php echo $timeslot_start . ":" .$min_start ?> - <?php echo $end_hr . ":".$min_end?>
                                                                        </td>

                                                                        <!-- for loop to iterate the column data for a row -->
                                                                        <?php for ($i = 1; $i <= 7; $i++) { ?>
                                                                            <td>

                                                                                <!--Select to enter the tutor 1 start -->
                                                                                <select class = "mb-3 form-control" name = "<?php echo $timeslot_start . $min_start . "tutor1" . $i ?>">
                                                                                        <!--default value-->
                                                                                        <option value="">Tutor</option>
                                                                                    <?php
                                                                                        global $conn;
                                                                                        $resTutor = $conn->query("SELECT * FROM staff WHERE tutor='True'");
                                                                                        while($row = $resTutor->fetch_assoc()){
                                                                                    ?>
                                                                                        <option value="<?php echo $row['Full_Name'] ?>"><?php echo $row['Full_Name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <!--Select to enter the tutor 1 end -->
                                                                                <!--Select to enter the tutor 2 start -->
                                                                                <select class = "mb-3 form-control" name = "<?php echo $timeslot_start . $min_start . "tutor2" . $i ?>">
                                                                                    <!--default value-->
                                                                                    <option value="">Tutor</option>
                                                                                    <?php
                                                                                    global $conn;
                                                                                    $resTutor = $conn->query("SELECT * FROM staff WHERE tutor='True'");
                                                                                    while($row = $resTutor->fetch_assoc()){
                                                                                        ?>
                                                                                        <option value="<?php echo $row['Full_Name'] ?>"><?php echo $row['Full_Name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <!--Select to enter the tutor 2 end -->
                                                                                <!--Select to enter the type start -->
                                                                                <select class = "mb-3 form-control" name = "<?php echo $timeslot_start . $min_start . "classType" . $i ?>">
                                                                                    <!--default value-->
                                                                                    <option value="">Type</option>
                                                                                    <option value="Lecture">Lecture</option>
                                                                                    <option value="Labs">Labs</option>
                                                                                    <option value="Tutorial">Tutorial</option>
                                                                                </select>
                                                                                <!--Select to enter the type end -->
                                                                                <!--Select to enter the subjects start -->
                                                                                <select class = "mb-3 form-control" name = "<?php echo $timeslot_start . $min_start. "subject" . $i ?>">
                                                                                        <!--default value-->
                                                                                        <option value="" >Subject</option>

                                                                                    <?php
                                                                                        $resSubject = $conn->query("SELECT * FROM subject");
                                                                                        while($row = $resSubject->fetch_assoc()){
                                                                                    ?>

                                                                                        <option value="<?php echo $row['subject'] ?>"><?php echo $row['subject'] ?></option>
                                                                                    <?php } ?>

                                                                                        <!--value for reserved-->
                                                                                        <option style="color: sandybrown" value="Reserved" <?php if(($timeslot_start == 8 && $min_start == 0) || ($timeslot_start == 17 && $min_start == 30) ){?>  selected <?php } ?>>Reserved</option>
                                                                                </select>
                                                                                <!--Select to enter the subjects end -->

                                                                            </td>
                                                                        <?php } ?>
                                                                        <!--for loop to iterate the column data for a row end -->
                                                                     </tr>
                                                                <?php } ?>
                                                            <?php } ?>
                                                            <!--for loop to iterate rows end -->

                                                    </table>

                                                    <button type="submit" class="btn btn-primary" name="timetable_admin_insert_save">Save</button>
                                                </form>
                                                <!-- [Timetable form] end-->
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

        <?php include '../dashboard_for_staff/req_js.inc.php' ?>
    </body>

    </html>