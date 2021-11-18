<?php

    /*
     * Name    : N.S.R.Corera
     * Id      : IT18508338
     * Group Id: ITP-2019-MLB-FO-03
     */


    include '../dashboard_for_staff/session_for_staff.php';
    include dirname(__FILE__).'/services/IClassroomServiceImplementation.php';

    ?>

    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html">

    <head>
        <?php include '../dashboard_for_staff/head.inc.php' ?>
    </head>

    <body>

    <?php include '../dashboard_for_staff/nav_and_header.inc.php' ?>

    <?php if(isset($_POST['classroom_admin_view_delete'])){

        $modalIdMain = $_POST['classroom_admin_view_delete_id'];

    }


    ?>

    <!--delete modal [start]-->
    <div class="modal fade" id="deleteModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title" id="deleteModal">Delete Classroom <?php echo $modalIdMain; ?></h3>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>

                <form action="controllers/DeleteClassroomController.php?idFromModal=<?php echo $modalIdMain; ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="deleteId" id="deleteId">
                        <h6 >Are you sure you want to delete classroom <?php echo $modalIdMain; ?> ? </h6>

                    </div>
                    <div class="modal-footer">
                        <button type = "button" class="btn btn-danger" data-dismiss="modal">No</button>
                        <button type = "submit" class="btn btn-primary" name="classroom_admin_delete_modal">Yes</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <!--delete modal [end]-->

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
                                                <li class="breadcrumb-item"><a href="#!">Classroom Management</a></li>
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

                                            <!--delete success message [start] -->
                                            <?php if(isset($_GET['deleteClassroom'])){
                                                $delId  = $_GET['deleteId']; ?>

                                                <div class="col-sm-12">
                                                    <div class="alert alert-danger">
                                                        Classroom <?php echo $delId; ?> has been deleted successfully!
                                                    </div>
                                                </div>

                                            <?php } ?>
                                            <!--delete success message [end] -->

                                            <!--update success message [start] -->
                                            <?php if(isset($_GET['classroomUpdate'])){
                                                $updateClassId = $_GET['classId']
                                                ?>

                                                <div class="col-sm-12">
                                                    <div class="alert alert-success">
                                                        Classroom <?php echo $updateClassId; ?> has been updated successfully!
                                                    </div>
                                                </div>

                                            <?php } ?>

                                            <!--update success message [end] -->

                                            <form method="post" action="controllers/AddClassroomController.php">

                                            <button type="submit" class="btn btn-warning" name="btn_classroom_add" >Add Classroom</button>

                                            </form><br>

                                            <?php

                                                $classServiceImp = new IClassroomServiceImplementation();
                                                $classArr = $classServiceImp->viewAllClassrooms();

                                                $countClassArr = sizeof($classArr);

                                                if($countClassArr > 0){

                                            ?>

                                                    <table class = "table table-hover">
                                                        <tr>
                                                            <th>Class Id</th>
                                                            <th>Building</th>
                                                            <th>Seats</th>
                                                            <th>Floor</th>
                                                            <th>Multimedia</th>
                                                            <th>Air condition</th>
                                                            <th>Action</th>
                                                        </tr>

                                                        <!--call view all subects function through services-->
                                                        <?php

                                                            for($si = 0; $si < count($classArr) ; $si++) {

                                                            ?>


                                                                <tr>

                                                                    <?php

                                                                        $classTemp = $classArr[$si];

                                                                    ?>

                                                                    <td><?php echo $classTemp->getClassId(); ?></td>
                                                                    <td><?php echo $classTemp->getClassBuilding(); ?></td>
                                                                    <td><?php echo $classTemp->getClassSeats(); ?></td>
                                                                    <td><?php echo $classTemp->getClassFloor(); ?></td>
                                                                    <td><?php echo $classTemp->getClassMulti(); ?></td>
                                                                    <td><?php echo $classTemp->getClassAirCon(); ?></td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <?php $updateHref = "classroom_admin_edit_page.php?classId=".$classTemp->getClassId(); ?>
                                                                            <a style="margin-right: 2px" href="<?php echo $updateHref ?>" class="btn btn-info">Update</a>
                                                                            <form method="post">
                                                                                <input type="hidden" value="<?php echo $classTemp->getClassId(); ?>" name="classroom_admin_view_delete_id">
                                                                                <button type = "submit" class="btn btn-danger" name="classroom_admin_view_delete" >Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            <?php
                                                            }
                                                            ?>

                                                    </table>

                                            <?php }else{ ?>

                                            <div class = col-sm-12>
                                                <div class="card-body">
                                                        <div class = "alert alert-info">
                                                            There are no Classrooms available to be displayed !
                                                        </div>
                                                </div>
                                            </div>



                                            <?php } ?>

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

    <script>

        //js script to call the modal
        $(document).ready(function() {
            <?php if (isset($_POST["classroom_admin_view_delete"])): ?>
            $('#deleteModal').modal('show');
            <?php endif; ?>
        });

    </script>



