
<?php
    $Name = $_POST["name"];
?>
<?php include dirname(__FILE__).'/controllers/ViewRelevantStaffTimetableController.php' ?>

<!-- [ fixed-layout ] start -->
    <?php

    global $timetableView;
    global $res;
    global $resCount;

    if($resCount!=0) {
        //[for loop to display all the timetables that the tutor is involved in] start
        for ($r = 0; $r < $resCount; $r++) {
            ?>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <!--echo out the timetable id-->
                        <h5><?php print_r($res[$r]) ?></h5>

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
                                for ($min_start; $min_start <= 30; $min_start += 30) { ?>

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
                                        <!-- [set end min] end -->
                                        <!-- [time] -->
                                        <td>
                                            <?php echo $timeslot_start . ":" . $min_start ?>
                                            - <?php echo $end_hr . ":" . $min_end ?>
                                        </td>

                                        <!-- for loop to iterate the column data for a row -->
                                        <?php for ($i = 1; $i <= 7; $i++) {

                                            //new ITimetableCellServiceImplementation() to set the the id and retrieve data
                                            $tcsv = new ITimetableCellServiceImplementation();
                                            TimetableCell::setTimeId($res[$r]);

                                            //viewAllTimetableCells() method called
                                            $tcsv->viewAllTimetableCells(TimetableCell::getTimeId(), $i, $timeslot_start, $min_start);

                                            ?>

                                            <td>
                                                <?php echo TimetableCell::getTutor1() ?> <br>
                                                <?php echo TimetableCell::getTutor2() ?> <br>
                                                <?php echo TimetableCell::getClassType() ?> <br>
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
        //for loop to display all the timetables that the tutor is involved in] end
    }
    //if the $resCount == 0 then execute this statement
    else{?>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class = "alert alert-primary">
                        <h4 class="alert-heading">
                            There Are No Timetables Available!
                        </h4>
                        <br>
                        <p>
                            You are not currently assigned to any venue.
                        </p>
                        <hr>
                        <p>
                            Please contact the institute's adminstration department for more details if you are not do not see your timetable!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- [ fixed-layout ] end -->
