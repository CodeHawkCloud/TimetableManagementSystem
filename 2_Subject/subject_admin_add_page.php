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
                                            <h5 class="m-b-10">Subject management</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <!-- [ IMS: breadcrumb ] -->
                                            <li class="breadcrumb-item"><a href="../1_Staff/admin_dashboard.php"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="subject_admin_view_page.php">Subject Management</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Add Subject</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->

                        <!-- [ Main Content ] start -->
                        <div class="row">

                            <?php

                                if(isset($_GET['subjectNameExists']) || isset($_GET['subjectIdExists'])){

                                    $retSubName = $_GET['subjectName'];
                                    $retSubId = $_GET['subjectId'];

                                    ?>



                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="alert alert-danger">
                                                    <h4 class="alert-heading">Subject <?php echo $retSubId?> : <?php echo $retSubName?> insertion failed !</h4>

                                                    <?php if(isset($_GET['subjectNameExists'])){?>

                                                        <p>The subject name <?php echo $retSubName; ?> already exists, please change it and try again !</p>

                                                    <?php }else{ ?>

                                                        <p>The subject code <?php echo $retSubId ?> already exists, please change it and try again !</p>

                                                    <?php } ?>
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

                                        if(isset($_GET['subjectAdded'])){

                                            $subjectName = $_GET['subjectName'];
                                            $subjectId = $_GET['subjectId'];

                                            ?>


                                            <div class = "col-sm-12">

                                                <div class="alert alert-success">
                                                     The subject <?php echo $subjectId; ?> : <?php echo $subjectName; ?> was added successfully !
                                                </div>

                                            </div>

                                        <?php } ?>


                                        <form action="controllers/AddSubjectController.php" method="post" >

                                            <!-- subject Id-->
                                            <label>Subject Id</label>
                                            <div class="form-group">
                                                <input type="text" name="subject_add_id" value="" class="form-control" placeholder="Enter Subject Id" required>
                                            </div>

                                            <!-- subject Name-->
                                            <label>Subject Name</label>
                                            <div class="form-group">
                                                <input type="text" name="subject_add_name" value="" class="form-control" placeholder="Enter Subject Name" required>
                                            </div>

                                            <!-- references -->
                                            <label>References</label>
                                            <div class="form-group">
                                                <textarea type="text" name="subject_add_reference" class="form-control" placeholder="Enter References" rows="3" required maxlength="500"></textarea>

                                            </div>

                                            <!-- Description -->
                                            <label>Description</label>
                                            <div class="form-group">
                                                <textarea type="text" name="subject_add_description" class="form-control" placeholder="Enter Description" rows="4" required maxlength="1000"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name = "btn_add_subject_form">Submit</button>
                                                <a class="btn btn-success" href="subject_admin_view_page.php">View Subjects</a>
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





