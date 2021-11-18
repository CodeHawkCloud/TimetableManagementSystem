

<!--Name    : N.S.R.Corera-->
<!--Id      : IT18508338-->
<!--Group Id: ITP-2019-MLB-FO-03-->



                        <?php $Name = $_POST["name"];?>


                        <?php include dirname(__FILE__).'/controllers/ViewAllTimetablesController.php'; ?>



                            <!-- [ fixed-layout ] start -->

                            <!--timetable ids stored in $timtableResList by calling ViewAllTimetables() method -->
                            <?php

                            global $timetableView;


                            $timetableResList = $timetableView->viewAllTimetables();
                            if(!empty($timetableResList)) {

                                    ?>

                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <!--echo out the timetable id -->
                                                <div  class="col-sm-12">
                                                    <table class="table-borderless" style="width: inherit">
                                                        <tr>
                                                            <th><h5><?php echo "My Timetable" ; ?></h5></th>
                                                        </tr>
                                                    </table>
                                                </div><br>


                                                <!-- [Timetable view]-->
                                                <table class="table table-hover" >

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
                                                                <?php for ($i = 1; $i <= 7; $i++) {?>

                                                                    <td>
                                                                        <?php
                                                                        for ($k = 0; $k < count($timetableResList); $k++) {

                                                                        //new ITimetableCellServiceImplementation() to set the the id and retrieve data
                                                                        $tcsv = new ITimetableCellServiceImplementation();
                                                                        TimetableCell::setTimeId($timetableResList[$k]);

                                                                        //viewAllTimetableCells() method called
                                                                        $tcsv->viewAllTimetableCells(TimetableCell::getTimeId(), $i, $timeslot_start, $min_start); ?>

                                                                        <?php if(strcmp("$Name", TimetableCell::getTutor1())== 0 || strcmp("$Name",TimetableCell::getTutor2())==0){ ?>
                                                                            <?php echo TimetableCell::getTutor1() ?></br>
                                                                            <?php echo TimetableCell::getTutor2() ?></br>
                                                                            <?php echo TimetableCell::getClassType() ?></br>
                                                                            <?php echo TimetableCell::getSubjectId() ?></br>
                                                                            <h6 style="color: blue"><?php print_r($timetableResList[$k]) ?></h6>

                                                                        <?php } } ?>

                                                                    </td>
                                                                <?php  } }?>
                                                                <!--for loop to iterate the column data for a row end -->

                                                            </tr>
                                                        <?php } ?>

                                                    <!--for loop to iterate rows end -->

                                                </table>
                                                <!-- [Timetable view] end -->

                                            </div>
                                        </div>
                                    </div>
                                <?php
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


