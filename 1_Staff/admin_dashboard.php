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
<!-- 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ./login.php");
    exit;
}
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <?php include '../dashboard_for_staff/head.inc.php' ?>
</head>

<body>

    <?php include '../dashboard_for_staff/nav_and_header.inc.php' ?>



    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper container">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body ">
                        <div class="page-wrapper ">
                            <div class="page-header bg-info ">
                                <div class="page-block ">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="page-header-title">
                                                <!-- [ IMS: page title ] -->
                                                <h2 class="m-b-10 text-white">Dashboard  <i class="fas fa-user-shield row-left"></i></h2>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">

                                    <div class="card text-white bg-success ">
                                        <div class="card-header">
                                            <h4 class="card-title text-light"><a class="text-light" href="staff_admin_view_page.php"> Staff management</a></h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title text-white"> <a href="staff_admin_view_page.php"><i class="fas fa-user-plus text-light"></i></a></h1>
                                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->

                                        </div>
                                    </div>
                     
                                </div>


                                <div class="col-sm-4">
                                    <div class="card text-white bg-warning ">
                                        <div class="card-header">
                                            <h4 class="card-title text-white"><a class="text-light" href="../2_Subject/subject_admin_view_page.php"> Subject</a></h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title text-white"> <a href="../2_Subject/subject_admin_view_page.php"><i class="fas fa-user-plus text-light"></i></a></h1>
                                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="card text-white bg-c-purple ">
                                        <div class="card-header">
                                            <h4 class="card-title text-white"><a class="text-light" href="../4_Classroom/classroom_admin_view_page.php"> Classroom</a></h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title text-white"> <a href="../4_Classroom/classroom_admin_view_page.php"><i class="fas fa-user-plus text-light"></i></a></h1>
                                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="card text-white bg-info ">
                                        <div class="card-header">
                                            <h4 class="card-title text-white"><a class="text-light" href="../3_Timetable/timetable_admin_mainmenu_page.php"> Timetable Management</a></h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title text-white"> <a href="../3_Timetable/timetable_admin_mainmenu_page.php"><i class="fas fa-user-plus text-light"></i></a></h1>
                                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="card text-white bg-danger ">
                                        <div class="card-header">
                                            <h4 class="card-title text-white" style="text-align:center"><a class="text-light text-center" href="../other/report.php"> Report Generation</a></h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title text-white" style="text-align:center"> <a href="../other/report.php " ><i class="far fa-file-pdf text-white"></i></a></h1>
                                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>


                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ horizontal-layout ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p></p>
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


    <?php include '../dashboard_for_staff/req_js.inc.php' ?>
</body>

</html>