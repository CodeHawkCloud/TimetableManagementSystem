<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 *
 */


    include '../dashboard_for_staff/session_for_staff.php'; ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../dashboard_for_staff/head.inc.php' ?>
    </head>

    <body>

    <!-- timetable with such id is not existing-->
    <?php
    if(isset($_GET['viewTimetableId'])) {
        $viewTimetableId = $_GET['viewTimetableId'];
    }
    if(isset($_GET['updateTimetable'])){
        $updateIdIndividual = $_GET['updateTimetableId'];
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
                                                <li class="breadcrumb-item"><a href="#!">View Individual Timetable</a></li>
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
                                            <form method = "post" action=controllers/ViewIndividualTimetableController.php>
                                                <label for ="timetableInsertMain">Please select the venue that you want to view the timetable for</label>

                                                <!--dropboxes to get the halls from the classroom table [start]-->
                                                <select class="mb-3 form-control" name="timetable_admin_view_timetableID" >
                                                    <!--default value-->
                                                    <option value="">Select venue</option>

                                                    <?php
                                                    $resHall = $conn->query("SELECT * FROM timetable");
                                                    while($row = $resHall->fetch_assoc()){
                                                        ?>

                                                        <option value="<?php echo $row['timetable_id'] ?>"><?php echo $row['timetable_id'] ?></option>
                                                    <?php } ?>

                                                </select>
                                                <!--dropboxes to get the halls from the classroom table [end]-->

                                                <button type="submit" class="btn btn-primary" name="timetable_admin_view_next">Next</button>
                                            </form>
                                            <!--form end-->

                                            <!--[alert messages] start-->
                                            <!--[alert if no id was entered] start -->
                                            <?php if(isset($_GET['viewTimetable'])){?>
                                                    <br>
                                                        <div class="alert alert-danger">Please fill in a Venue ID</div>
                                            <?php } ?>
                                            <!--[alert if no id was entered] start -->
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




