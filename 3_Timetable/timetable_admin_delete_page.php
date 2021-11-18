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

        <!-- check if the user has entered an id , if not deleteMain will be assigned with empty to trigger the error div-->
        <?php
            if(isset($_POST['timetable_admin_delete_delete'])) {
                $modalIdMain = $_POST['timetable_admin_delete_timetableID'];
                if (empty($modalIdMain)) {
                    $url = "?deleteMain=empty";
                    header('Location:'.$url);
                }
            }
        ?>

        <!-- get from URL whether the timetable was deleted successfully, whether a timetable with the id is existing-->
        <?php
            if(isset($_GET['deleteMain'])){
                $deleteMain = $_GET['deleteMain'];
            }
        ?>
        <!-- get from URL the id to be deleted-->
        <?php
            if(isset($_GET['deleteId'])){
                $timeId = $_GET['deleteId'];
            }
        ?>



        <?php include '../dashboard_for_staff/nav_and_header.inc.php'?>

        <!--delete modal [start]-->
        <div class="modal fade" id="deleteModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h3 class="modal-title" id="deleteModal">Delete Timetable <?php echo $modalIdMain; ?></h3>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>

                    <form action="controllers/DeleteTimetableController.php?loc=deleteMainPage&idFromModal=<?php echo $modalIdMain; ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="deleteId" id="deleteId">
                            <h6 >Are you sure you want to delete Timetable <?php echo $modalIdMain; ?> ?</h6>

                        </div>
                        <div class="modal-footer">
                            <button type = "button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type = "submit" class="btn btn-primary" name="timetable_admin_delete_modal">Yes</button>
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
                                                    <h5 class="m-b-10">Timetable management</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <!-- [ IMS: breadcrumb ] -->
                                                    <li class="breadcrumb-item"><a href="../1_Staff/admin_dashboard.php"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="timetable_admin_mainmenu_page.php">Timetable Management</a></li>
                                                    <li class="breadcrumb-item"><a href="#!">Delete Timetable</a></li>
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

                                                <!-- [form] start -->
                                                <!--will send the data to the modal by calling the modal script-->
                                                <form  method = "post">

                                                   <label for ="timetableDeleteMain">Please select the venue you want to delete</label>

                                                    <!--dropboxes to get the halls from the classroom table [start]-->
                                                    <select class="mb-3 form-control" name="timetable_admin_delete_timetableID" >
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

                                                   <button type="submit" id="timetable_admin_delete_delete" class="btn btn-primary" name="timetable_admin_delete_delete" >Delete</button>

                                                </form>
                                                <!-- [form] end -->

                                                <!--[alert messages] start -->
                                                <?php
                                                if(isset($_GET['deleteMain'])) {
                                                    //--[alert-if empty] start
                                                    if (strcmp($deleteMain, "empty") == 0) { ?>
                                                        <br>
                                                        <div class="alert alert-danger">Please fill in a Venue ID</div>
                                                    <!--alert-if empty end-->
                                                    <!--[alert-success] start -->
                                                    <?php } else if (strcmp($deleteMain, "success") == 0) { ?>
                                                        <br>
                                                        <div class="alert alert-success">Timetable<?php echo " $timeId " ?>has
                                                            been deleted succesfully!
                                                        </div>
                                                    <!--alert-if success end-->
                                                    <!--[alert-not found] start -->
                                                    <?php } ?>
                                                <?php }?>

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

    <!--js script to call the modal-->
    <script>

        $(document).ready(function() {
            <?php if (isset($_POST["timetable_admin_delete_delete"])): ?>
            $('#deleteModal').modal('show');
            <?php endif; ?>
        });

    </script>



