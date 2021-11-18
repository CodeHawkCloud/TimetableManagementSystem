<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

include '../dashboard_for_staff/session_for_staff.php'; ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <?php include '../dashboard_for_staff/head.inc.php' ?>
</head>

<body>

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
                                            <h5 class="m-b-10">Classroom management</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <!-- [ IMS: breadcrumb ] -->
                                            <li class="breadcrumb-item"><a href="../1_Staff/admin_dashboard.php"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="classroom_admin_view_page.php">Classroom Management</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Add Classroom</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->

                        <!-- [ Main Content ] start -->
                        <div class="row">

                            <?php

                            if(isset($_GET['classExists'])){

                                $retClassId = $_GET['retClassId'];

                                ?>



                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="alert alert-danger">
                                                <h4 class="alert-heading">Classroom <?php echo $retClassId?> insertion failed !</h4>

                                                    <p>A classroom with the id <?php echo $retClassId ?> already exists, please change it and try again !</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>



                            <!-- [ fixed-layout ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">

                                        <?php

                                        if(isset($_GET['classRoomAdded'])){

                                            $retClassId = $_GET['retClassId'];

                                            ?>


                                            <div class = "col-sm-12">

                                                <div class="alert alert-success">
                                                    Classroom <?php echo $retClassId; ?> was added successfully !
                                                </div>

                                            </div>

                                        <?php } ?>


                                        <form action="controllers/AddClassroomController.php" method="post" >

                                            <!-- classroom Id-->
                                            <label>Classroom Id</label>
                                            <div class="form-group">
                                                <input type="text" name="class_add_id" value="" class="form-control" placeholder="Enter Class Id" required>
                                            </div>

                                            <!-- Building-->
                                            <label>Building</label>
                                            <div class="form-group">
                                                <input type="text" name="class_building" value="" class="form-control" placeholder="Enter Building" required>
                                            </div>

                                            <!-- Seats-->
                                            <label>Seats</label>
                                            <div class="form-group">
                                                <input type="text" name="class_seats" value="" class="form-control" placeholder="Enter number of seats" required>
                                            </div>

                                            <!-- Floor-->
                                            <label>Floor</label>
                                            <div class="form-group">
                                                <input type="text" name="class_floor" value="" class="form-control" placeholder="Enter the floor number" required>
                                            </div>

                                            <!-- Multimedia -->
                                            <label>Multimedia</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="Yes" id="multi1"  name="classroom_multi" checked>
                                                    <label for="multi1" class="custom-control-label" >Yes</label>
                                                </div>

                                                <div class="custom-control custom-radio">
                                                    <input type="radio" name="classroom_multi" value="No" id="multi2" class="custom-control-input" >
                                                    <label for="multi2" class="custom-control-label">No</label>
                                                </div>

                                            <!-- AC -->

                                            <label>Air Condition</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="classroom_ac" value="Yes" id="airCon1" checked>
                                                    <label for="airCon1" class="custom-control-label">Yes</label>
                                                </div>

                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="classroom_ac" value="No" id="airCon2" >
                                                    <label for="airCon2" class="custom-control-label">No</label>
                                                </div>


                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name = "btn_add_classroom_form">Submit</button>
                                                <a class="btn btn-success" href="classroom_admin_view_page.php">View Classrooms</a>
                                            </div>
                                        </form>


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





