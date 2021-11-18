<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

    include '../dashboard_for_staff/session_for_staff.php' ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php $Name = $_GET['staffName']; ?>
        <?php include '../dashboard_for_staff/head.inc.php' ?>
        <?php include dirname(__FILE__).'/controllers/ViewRelevantStaffTimetableController.php' ?>
    </head>

    <body>

        <?php include '../dashboard_for_staff/nav_header_tutor.php'?>

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
                                                    <h5 class="m-b-10">My Timetables</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <!-- [ IMS: breadcrumb ] -->
                                                    <li class="breadcrumb-item"><a href="../dashboard_for_staff/tutor_view.php"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#">My Timetables</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ breadcrumb ] end -->

                                <div class = "row">
                                    <div class="col-sm-12" style="text-align: center">

                                        <button type="submit" class="btn btn-primary" id="my_venues" name="my_venues" >My venues</button>
                                        <button type="submit" class="btn btn-secondary" id="my_timetable" name="my_timetable" >My Timetable</button>

                                    </div>
                                </div><br>

                                <!-- [ Main Content ] start -->
                                <div class="row" id ="my_timetable_container">

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

    //js script for the search bar
    $(document).ready(function(){
        $('#my_venues').click(function () {
            var text = "<?php echo $Name; ?>";
                $.ajax({
                    url:"timetable_staff_all_timetables_page.php",
                    method:"post",
                    data:{name:text},
                    dataType:"html",
                    success:function(data)
                    {
                        $('#my_timetable_container').html(data);
                    }
                })

        });
    });

    $(document).ready(function(){
        $('#my_timetable').click(function () {
            var text = "<?php echo $Name; ?>";
            $.ajax({
                url:"timetable_staff_sum_up_page.php",
                method:"post",
                data:{name:text},
                dataType:"html",
                success:function(data)
                {
                    $('#my_timetable_container').html(data);
                }
            })

        });
    });

</script>
