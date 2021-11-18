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

    </head>

    <body>

        <!-- get from URL whether the id field was empty,timetable with the particular id is existing-->
        <?php
            if(isset($_GET['updateMain'])){
                $updateMain = $_GET['updateMain'];
            }
        ?>
        <!-- get from URL whether the timetable was updated successfully-->
        <?php
            if(isset($_GET['updateTimetable'])){
                $updateTimetable =$_GET['updateTimetable'];
            }
        ?>
        <!-- get from URL the id that was entered-->
        <?php
            if(isset($_GET['updateTimetableId']))  {
                $timeId = $_GET['updateTimetableId'];
            }
        ?>

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
                                                    <li class="breadcrumb-item"><a href="timetable_admin_mainmenu_page.php">Timetable Management</a></li>
                                                    <li class="breadcrumb-item"><a href="#!">Update Timetable</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ breadcrumb ] end -->

                                <!-- [ Main Content ] start -->
                                <div class="row">
                                    <!-- [ fixed-layout ] start -->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <!--form start-->
                                                <form method="post" action="controllers/UpdateTimetableController.php">
                                                    <label for ="timetableUpdateMain">Please select the timetable you want to update</label>

                                                    <!--dropboxes to get the halls from the classroom table [start]-->
                                                    <select class="mb-3 form-control" name="timetable_admin_update_timetableID" >
                                                        <!--default value-->
                                                        <option value="">Select timetable</option>

                                                        <?php
                                                        $resHall = $conn->query("SELECT * FROM timetable");
                                                        while($row = $resHall->fetch_assoc()){
                                                            ?>

                                                            <option value="<?php echo $row['timetable_id'] ?>"><?php echo $row['timetable_id'] ?></option>
                                                        <?php } ?>

                                                    </select>
                                                    <!--dropboxes to get the halls from the classroom table [end]-->

                                                    <button type="submit" class="btn btn-primary" name="timetable_admin_update_updateTimetable">Update Timetable</button>
                                                </form>
                                                <!--form end-->

                                                <!--[alert messages] start-->
                                                <?php
                                                    if(isset($_GET['updateMain'])) {
                                                        //[alert-if empty] start
                                                        if (strcmp($updateMain, "empty") == 0) { ?>
                                                            <br>
                                                            <div class="alert alert-danger">Please fill in the Venue ID!
                                                            </div>
                                                        <!--[alert-if empty] end-->
                                                        <?php } } ?>

                                                <!--[alert-update success] start -->
                                                <?php
                                                    if(isset($_GET['updateTimetable'])){
                                                        if(strcmp($updateTimetable,"success")==0){ ?>
                                                            <br>
                                                            <div class="alert alert-success">Timetable <?php echo " $timeId "?>has been updated successfully!</div>
                                                        <?php }
                                                    } ?>
                                                <!--[alert-update success] end-->
                                                <!--[alert messages] end-->

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


