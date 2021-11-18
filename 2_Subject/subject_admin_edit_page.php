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
    <?php include dirname(__FILE__).'/services/ISubjectServiceImplementation.php'; ?>
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
                                            <h5 class="m-b-10">Subject management</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <!-- [ IMS: breadcrumb ] -->
                                            <li class="breadcrumb-item"><a href="../1_Staff/admin_dashboard.php"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="subject_admin_view_page.php">Subject Management</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Update Subject</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->

                        <!-- [ Main Content ] start -->
                        <div class="row">

                            <!--update error message-->
                            <?php

                            if(isset($_GET['subjectNameExists'])){

                                $retSubName = $_GET['subjectName'];
                                $retSubId = $_GET['subId'];

                                ?>

                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="alert alert-danger">
                                                <h4 class="alert-heading">Subject <?php echo $retSubId?> : <?php echo $retSubName?> insertion failed !</h4>

                                                    <p>The subject name <?php echo $retSubName; ?> already exists, please change it and try again !</p>

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

                                            $updateSub = $_GET['subId'];

                                            $subServiceImp = new ISubjectServiceImplementation();

                                            $subRet = $subServiceImp->viewASubject($updateSub);

                                        ?>


                                        <?php $updateUrl = "controllers/UpdateSubjectController.php?subId=".$updateSub; ?>

                                        <form action="<?php echo $updateUrl ?>" method="post" >


                                            <!-- subject -->
                                            <label>Subject</label>
                                            <div class="form-group">
                                                <input type="text" name="subject_update_name" value="<?php echo $subRet->getSubName(); ?>" class="form-control" required>
                                            </div>

                                            <!-- references -->
                                            <label>References</label>
                                            <div class="form-group">
                                                <textarea type="text" name="subject_update_reference" class="form-control" rows="3" required maxlength="500"><?php echo $subRet->getSubReference(); ?></textarea>

                                            </div>

                                            <!-- Description -->
                                            <label>Description</label>
                                            <div class="form-group">
                                                <textarea type="text" name="subject_update_description" class="form-control" rows="4" required maxlength="1000"><?php echo $subRet->getSubDesc(); ?></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary" name = "btn_update_subject_form">Update</button>
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




