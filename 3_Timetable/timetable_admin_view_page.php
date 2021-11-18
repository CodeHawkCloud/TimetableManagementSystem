<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

    include '../dashboard_for_staff/session_for_staff.php'; ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../dashboard_for_staff/head.inc.php' ?>
        <?php include dirname(__FILE__).'/controllers/ViewAllTimetablesController.php'; ?>
    </head>


    <body>

        <?php include '../dashboard_for_staff/nav_and_header.inc.php'?>

        <?php
            if(isset($_GET['updateTimetable'])){
                $updateTimetableId = $_GET['updateTimetableId'];
            }
        ?>

        <?php
            if(isset($_GET['deleteMain'])){
                $deleteTimetableId = $_GET['deleteId'];
            }
        ?>

        <!--setting the id to delete timetable-->
        <?php
            if(isset($_POST['timetable_admin_view_page_delete'])) {
                $modalIdMain = $_POST['timetable_admin_view_page_delete_id'];
            }
        ?>

        <!--delete modal [start]-->
        <div class="modal fade" id="deleteModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h3 class="modal-title" id="deleteModal">Delete Timetable <?php echo $modalIdMain; ?></h3>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>

                    <form action="controllers/DeleteTimetableController.php?loc=all&idFromModal=<?php echo $modalIdMain; ?>" method="post">
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
                                                    <h5 class="m-b-10">Timetable Management</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <!-- [ IMS: breadcrumb ] -->
                                                    <li class="breadcrumb-item"><a href="../1_Staff/admin_dashboard.php"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="timetable_admin_mainmenu_page.php">Timetable Management</a></li>
                                                    <li class="breadcrumb-item"><a href="#!">View All Timetables</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ breadcrumb ] end -->

                                <!-- [ Main Content ] start -->
                                <div class="row">
                                    <!-- [ fixed-layout ] start -->

                                    <!--update success messages -->

                                    <?php if(isset($_GET['updateTimetable'])){ ?>
                                        <div class="col-sm-12">
                                            <div class="alert alert-info">Timetable <?php echo " $updateTimetableId "?>has been updated successfully!</div>
                                        </div>
                                    <?php } ?>
                                    <!--update success message end -->

                                    <!--delete success message-->
                                    <?php if(isset($_GET['deleteMain'])){ ?>
                                        <div class="col-sm-12">
                                            <div class="alert alert-danger">Timetable <?php echo " $deleteTimetableId "?>has been deleted successfully!</div>
                                        </div>
                                    <?php } ?>
                                    <!--delete success message end-->

                                    <!--search bar start-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                    <div class="form">
                                                        <input type="text" name="search_timetable" id="search_timetable" placeholder="Search Timetables" class="form-control"/>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--search bar ends-->

                                    <!--live search res-->
                                    <div id="result" class="col-sm-12">

                                    </div>


                                    <!--timetable ids stored in $timtableResList by calling ViewAllTimetables() method -->
                                    <?php

                                        global $timetableView;
                                        $timetableResList = $timetableView->viewAllTimetables();
                                        if(!empty($timetableResList)) {
                                            //[for loop to display all the timetables] start
                                            for ($k = 0; $k < count($timetableResList); $k++) {

                                                ?>

                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <!--ech out the timetable id -->
                                                            <div  class="col-sm-12">
                                                                    <table class="table-borderless" style="width: inherit">
                                                                        <tr>
                                                                            <th><h5><?php print_r($timetableResList[$k]); ?></h5></th>
                                                                            <?php $updateHref  = "timetable_admin_update_page.php?loc=all&updateTimetable=".$timetableResList[$k] ?>
                                                                            <th style="float: right">
                                                                                <div class="row">
                                                                                    <a style="margin-right: 2px" href="<?php echo $updateHref ?>" class="btn btn-info">Update</a>
                                                                                    <form method="post">
                                                                                        <input type="hidden" value="<?php print_r($timetableResList[$k]) ?>" name="timetable_admin_view_page_delete_id">
                                                                                        <button type = "submit" class="btn btn-danger" name="timetable_admin_view_page_delete" >Delete</button>
                                                                                    </form>
                                                                                </div>
                                                                            </th>
                                                                        </tr>
                                                                    </table>
                                                            </div>
                                                            <br>


                                                            <!-- [Timetable view]-->
                                                            <table class="table table-hover">

                                                                <!-- [column names] -->
                                                                <tr>
                                                                    <th>Time</th>
                                                                    <th>Monday</th>
                                                                    <th>Tuesday</th>
                                                                    <th>Wednesday</th>
                                                                    <th>Thursday</th>
                                                                    <th>Friday</th>
                                                                    <th>Saturday</th>
                                                                    <th>Sunday</th>
                                                                </tr>

                                                                <!-- [rows] -->
                                                                <!--for loop to iterate rows-->
                                                                <?php
                                                                //start and end times
                                                                $timeslot_start = 8;
                                                                $timeslot_end = 17;
                                                                for ($timeslot_start; $timeslot_start <= $timeslot_end; $timeslot_start++) {

                                                                    $min_start = 00;
                                                                    $min_start = str_pad($min_start, 2, '0', STR_PAD_LEFT);
                                                                    $min_end = 00;
                                                                    $min_end = str_pad($min_end, 2, '0', STR_PAD_LEFT);
                                                                    for ($min_start; $min_start <= 30; $min_start += 30) {
                                                                        ?>
                                                                        <tr>
                                                                            <!-- [set end min] start -->
                                                                            <?php if ($min_start == 00) {
                                                                                $min_end = 30;
                                                                                $end_hr = $timeslot_start;
                                                                            } else {
                                                                                $min_end = 00;
                                                                                $min_end = str_pad($min_end, 2, '0', STR_PAD_LEFT);
                                                                                $end_hr = $timeslot_start + 1;
                                                                            } ?>
                                                                            <!-- [time] -->
                                                                            <td>
                                                                                <?php echo $timeslot_start . ":" . $min_start ?>
                                                                                - <?php echo $end_hr . ":" . $min_end ?>
                                                                            </td>

                                                                            <!-- for loop to iterate the column data for a row -->
                                                                            <?php for ($i = 1; $i <= 7; $i++) {

                                                                                //new ITimetableCellServiceImplementation() to set the the id and retrieve data
                                                                                $tcsv = new ITimetableCellServiceImplementation();
                                                                                TimetableCell::setTimeId($timetableResList[$k]);

                                                                                //viewAllTimetableCells() method called
                                                                                $tcsv->viewAllTimetableCells(TimetableCell::getTimeId(), $i, $timeslot_start, $min_start);

                                                                                ?>

                                                                                <td>
                                                                                    <?php echo TimetableCell::getTutor1() ?></br>
                                                                                    <?php echo TimetableCell::getTutor2() ?></br>
                                                                                    <?php echo TimetableCell::getClassType() ?></br>
                                                                                    <?php echo TimetableCell::getSubjectId() ?>
                                                                                </td>
                                                                            <?php } ?>
                                                                            <!--for loop to iterate the column data for a row end -->

                                                                        </tr>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                                <!--for loop to iterate rows end -->

                                                            </table>
                                                            <!-- [Timetable view] end -->

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                            //for loop to display all the timetables] end
                                        }
                                        //if there is no timetables to show else statement executes
                                        else{ ?>
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class = "alert alert-primary">
                                                            <h4 class="alert-heading">
                                                                There Are No Timetables Available!
                                                            </h4>
                                                            <br>
                                                            <p>
                                                                The Institute Management System does not contain any timetables to be displayed.
                                                            </p>
                                                            <hr>
                                                            <p>
                                                                To add timetables please select "Add New Timetables" from the timetable management menu!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       <?php } ?>
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


    <script>

        //js script to call the modal
        $(document).ready(function() {
            <?php if (isset($_POST["timetable_admin_view_page_delete"])): ?>
            $('#deleteModal').modal('show');
            <?php endif; ?>
        });

        //js script for the search bar
        $(document).ready(function(){
            $('#search_timetable').keyup(function () {
                var text = $(this).val();
                if(text != ''){
                    $.ajax({
                        url:"timetable_admin_view_fetch.php",
                        method:"post",
                        data:{search:text},
                        dataType:"html",
                        success:function(data)
                        {
                            $('#result').html(data);
                        }
                    })
                }else{

                }
            });
        });

    </script>
