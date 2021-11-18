<?php

    //inclusion of php scripts
    include dirname(__FILE__).'/models/Timetable.php';
    include dirname(__FILE__).'/models/TimetableCell.php';
    include dirname(__FILE__).'/services/ITimetableServiceImplementation.php';
    include dirname(__FILE__).'/services/ITimetableCellServiceImplementation.php';
    include dirname(__FILE__).'/mysql_db_connection.inc.php';

    global $conn;
    $searchRes = '';
    $sql = "SELECT * FROM timetable WHERE timetable_id LIKE '".$_POST["search"]."%' ";
    $queryRes = $conn->query($sql);

    if($queryRes->num_rows > 0){

        while($row = $queryRes->fetch_assoc()){ ?>


            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <!--echo out the timetable id -->
                        <div  class="col-sm-12">
                            <table class="table-borderless" style="width: inherit">
                                <tr>
                                    <th><h5><?php echo $row["timetable_id"]; ?></h5></th>
                                        <?php $updateHref  = "timetable_admin_update_page.php?loc=all&updateTimetable=".$row["timetable_id"] ?>
                                    <th style="float: right">

                                        <div class="row">
                                            <a style="margin-right: 2px" href="<?php echo $updateHref ?>" class="btn btn-info">Update</a>
                                            <form method="post">
                                                <input type="hidden" value="<?php print_r($row["timetable_id"]) ?>" name="timetable_admin_view_page_delete_id">
                                                <button type = "submit" class="btn btn-danger" name="timetable_admin_view_page_delete" >Delete</button>
                                            </form>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                        </div><br>


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
                                            TimetableCell::setTimeId($row["timetable_id"]);

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

        <?php } ?>


        <div class = col-sm-12>
            <div class="alert alert-warning" style="text-align: center">End of search results...</div>
        </div><br>

    <?php }else{ ?>

        <div class = col-sm-12>
            <div class="alert alert-warning" style="text-align: center">No Timetables</div>
        </div><br>

    <?php } ?>








