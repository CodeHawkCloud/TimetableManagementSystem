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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <?php include '../dashboard_for_staff/head.inc.php' ?>
</head>

<body >

    <?php include '../dashboard_for_staff/nav_and_header.inc.php' ?>



    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper container">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body ">
                        <div class="page-wrapper ">
                            <div class="page-header">
                                <div class="page-block ">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="page-header-title">
                                                <h5 class="m-b-10">Staff management</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <!-- [ IMS: breadcrumb ] -->
                                                <li class="breadcrumb-item"><a href="admin_dashboard.php"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="staff_admin_view_page.php">Staff Management</a></li>
                                                <li class="breadcrumb-item"><a href="#!">Add Staff</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if(isset($_GET['staffAdd'])){ ?>
                                <?php $un = $_GET['uname']; ?>
                                <div class="alert alert-danger" style="text-align: center" role="alert">

                                    <?php if(strcmp($_GET['combo'],"Email")==0){ ?>
                                        <h3>Insertion failed !</h3>
                                        <p>Username or email is already in use, please try another username or email !</p>
                                    <?php } ?>
                                    <?php if(strcmp($_GET['combo'],"Nic")==0){ ?>
                                        <h3>Insertion failed !</h3>
                                        <p>NIC is invalid, please enter the correct NIC number !</p>
                                    <?php } ?>
                                    <?php if(strcmp($_GET['combo'],"First")==0){ ?>
                                        <h3>Insertion failed !</h3>
                                        <p>First name is already assigned to another staff, please try to differentiate the first name !</p>
                                    <?php } ?>
                                </div>


                            <?php  } ?>

                            <?php include 'staff_admin_add_content.php' ?>


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