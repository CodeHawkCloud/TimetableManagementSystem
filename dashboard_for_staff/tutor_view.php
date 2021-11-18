<?php include 'session_for_staff.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.inc.php' ?>
</head>
<body>

<?php include 'nav_header_tutor.php' ?>
<?php

    global $userFullName;
    global $timetableURL;

?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper container">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-header bg-patern">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12 ">
                                        <div class="page-header-title">
                                            <!-- [ IMS: page title ] -->
                                            <h2 class="m-b-10">Dashboard</h2>

                                            <div class = "alert alert" role="alert">
                                                <h4 class="mb-12" style="text-align: center; color: navy">Welcome <?php echo $userFullName?> !</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ Main Content ] start -->
                        <div class="col-md-14">
                           <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="card text-white bg-danger ">
                                                <div class="card-header">
                                                    <h4 style="text-align: center" class="card-title text-light"><a class="text-light" href="<?php echo $timetableURL ?>"> Timetables</a></h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 style="text-align: center" class="card-title text-white"><a href="<?php echo $timetableURL ?>"><i class="fas fa-calendar text-light"></i></a></h1>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                           </div>
                        </div>
                        <!-- [ Main Content ] end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->


<?php include'req_js.inc.php' ?>
</body>

</html>