<?php
// Initialize the session
session_start();
include_once 'user.php';
$user = new User();
$Staff_ID = $_SESSION['Staff_ID'];
if (!$user->get_session()) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <?php include '../dashboard_for_staff/head.inc.php' ?>
</head>

<body>

<?php include '../dashboard_for_staff/nav_and_header.inc.php'?>

<?php if(isset($_POST['staff_admin_view_delete'])){
    $modalIdMain = $_POST['staff_admin_view_delete_id'];
    $modalUnameMain = $_POST['staff_admin_view_delete_uname'];
    $currentSessionId = $_SESSION['Staff_ID'];
}


?>

<!--delete modal [start]-->
<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title" id="deleteModal">Delete <?php echo $modalUnameMain; ?></h3>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <?php $formModalURL = "controllers/DeleteStaffController.php?idFromModal=".$modalIdMain."&unameFromModal=".$modalUnameMain."&sessionAdminId=".$currentSessionId; ?>
            <form action="<?php echo $formModalURL?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="deleteId" id="deleteId">
                    <h6 >Are you sure you want to delete staff <?php echo $modalUnameMain; ?> with staff Id <?php echo $modalIdMain; ?> ?</h6>

                </div>
                <div class="modal-footer">
                    <button type = "button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type = "submit" class="btn btn-primary" name="staff_admin_delete_modal">Yes</button>
                </div>

            </form>
        </div>

    </div>
</div>
<!--delete modal [end]-->

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
        <div class="pcoded-wrapper container">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body ">
                        <div class="page-wrapper ">

                    
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ horizontal-layout ] start -->
                                <div class="col-sm-14">
                                    <div class="card">
                                        <div class="card-body">

                                            <!--add staff success message start-->
                                            <?php if(isset($_GET['staffAdd'])){ ?>
                                                <?php $un = $_GET['uname']; ?>
                                                <div class="alert alert-success" style="text-align: center" role="alert">
                                                    Staff with username <?php echo $un ?> has been inserted successfully !
                                                </div>

                                            <?php  } ?>
                                            <!--add staff success message end-->

                                            <!--delete staff messages start-->
                                            <?php if(isset($_GET['staffDelete'])){ ?>
                                                <?php

                                                    $retUname = $_GET['retUname'];
                                                ?>
                                                <!--current admin delete -->
                                                <?php if(strcmp($_GET['retReason'],"sessionDel")==0){?>

                                                    <div class="alert alert-danger" style="text-align: center" role="alert">
                                                        You are currently logged in as <?php echo $retUname ?>, hence deletion has failed !
                                                    </div>

                                                <?php }else if(strcmp($_GET['retReason'],"success")==0){ ?>

                                                    <div class="alert alert-success" style="text-align: center" role="alert">
                                                        Staff member with username <?php echo $retUname ?> has been deleted successfully !
                                                    </div>

                                                <?php } ?>
                                            <?php } ?>
                                            <!--delete staff messages end-->

                                            <!--update staff success message start-->
                                            <?php if(isset($_GET['updateSuccess'])){ ?>
                                                <?php $updateSUN = $_GET['updateSUN']; ?>
                                                <div class="alert alert-success" style="text-align: center" role="alert">
                                                    Staff with username <?php echo $updateSUN ?> has been updated successfully !
                                                </div>

                                            <?php  } ?>
                                            <!--update staff success message end-->

                                            <?php include 'staff_admin_view_content.php' ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ horizontal-layout ] end -->
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

<script>

    //js script to call the modal
    $(document).ready(function() {
        <?php if (isset($_POST["staff_admin_view_delete"])): ?>
        $('#deleteModal').modal('show');
        <?php endif; ?>
    });

</script>
