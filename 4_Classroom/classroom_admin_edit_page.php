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
    <?php include dirname(__FILE__).'/services/IClassroomServiceImplementation.php'; ?>
    <?php include '../dashboard_for_staff/head.inc.php' ?>
</head>

<body>

<?php include '../dashboard_for_staff/nav_and_header.inc.php' ?>

<?php

//returns

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
                                            <h5 class="m-b-10">Classroom management</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <!-- [ IMS: breadcrumb ] -->
                                            <li class="breadcrumb-item"><a href="../1_Staff/admin_dashboard.php"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="classroom_admin_view_page.php">Classroom Management</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Update Classroom</a></li>
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


                                        <?php

                                        $updateClass = $_GET['classId'];

                                        $classServiceImp = new IClassroomServiceImplementation();

                                        $classRet = $classServiceImp->viewAClassroom($updateClass);

                                        ?>


                                        <?php $updateUrl = "controllers/UpdateClassroomController.php?classId=".$updateClass; ?>

                                        <form action="<?php echo $updateUrl ?>" method="post" >

                                            <!-- Building-->
                                            <label>Building</label>
                                            <div class="form-group">
                                                <input type="text" name="class_update_building" value="<?php echo $classRet->getClassBuilding(); ?>" class="form-control" placeholder="Enter Building" required>
                                            </div>

                                            <!-- Seats-->
                                            <label>Seats</label>
                                            <div class="form-group">
                                                <input type="text" name="class_update_seats" value="<?php echo $classRet->getClassSeats(); ?>" class="form-control" placeholder="Enter number of seats" required>
                                            </div>

                                            <!-- Floor-->
                                            <label>Floor</label>
                                            <div class="form-group">
                                                <input type="text" name="class_update_floor" value="<?php echo $classRet->getClassFloor(); ?>" class="form-control" placeholder="Enter the floor number" required>
                                            </div>

                                            <?php if(strcmp("Yes",  $classRet->getClassMulti())==0){ ?>
                                                <!-- Multimedia -->
                                                <label>Multimedia</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="Yes" id="multi1"  name="classroom_update_multi" checked>
                                                    <label for="multi1" class="custom-control-label" >Yes</label>
                                                </div>

                                                <div class="custom-control custom-radio">
                                                    <input type="radio" name="classroom_update_multi" value="No" id="multi2" class="custom-control-input" >
                                                    <label for="multi2" class="custom-control-label">No</label>
                                                </div>

                                            <?php }else{ ?>

                                                <!-- Multimedia -->
                                                <label>Multimedia</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="Yes" id="multi1"  name="classroom_update_multi" >
                                                    <label for="multi1" class="custom-control-label" >Yes</label>
                                                </div>

                                                <div class="custom-control custom-radio">
                                                    <input type="radio" name="classroom_update_multi" value="No" id="multi2" class="custom-control-input" checked>
                                                    <label for="multi2" class="custom-control-label">No</label>
                                                </div>
                                            <?php } ?>

                                            <?php if(strcmp("Yes",  $classRet->getClassAirCon())==0){ ?>
                                                <!-- AC -->
                                                <label>Air Condition</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="classroom_update_ac" value="Yes" id="airCon1" checked>
                                                    <label for="airCon1" class="custom-control-label">Yes</label>
                                                </div>

                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="classroom_update_ac" value="No" id="airCon2" >
                                                    <label for="airCon2" class="custom-control-label">No</label>
                                                </div>
                                            <?php }else{ ?>
                                                <!-- AC -->
                                                <label>Air Condition</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="classroom_update_ac" value="Yes" id="airCon1" >
                                                    <label for="airCon1" class="custom-control-label">Yes</label>
                                                </div>

                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="classroom_update_ac" value="No" id="airCon2" checked>
                                                    <label for="airCon2" class="custom-control-label">No</label>
                                                </div>
                                            <?php } ?>

                                            <button type="submit" class="btn btn-primary" name = "btn_update_classroom_form">Update</button>
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





