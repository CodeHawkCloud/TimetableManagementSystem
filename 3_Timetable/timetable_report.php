<?php

    require_once dirname(__FILE__) . '/../other/pdf/fpdf.php';
    include dirname(__FILE__).'/controllers/AnalyseTimetableController.php';

    //creation of a new FPDF object and overriding its title and text colour
    $pdf = new FPDF('L','mm', 'A4');
    $pdf->SetTitle("Timetable Report",1);
    $pdf->SetTextColor(77,54,43);

    /* front page [start] */
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 20);
    $date = date("d/m/y");

    $pdf->Text(95,105,"Timetable Report as at " . $date);
    $pdf->Image('../assets/images/logoDark.png',130,90);

    /*front page [end] */

    /* 3_Timetable display pages */

    //create a new ITimetableServiceImplementation() object
    $pdfTimetableView = new ITimetableServiceImplementation();

    //store the result of all timetables in a list
    $pdfTimetableResList = $pdfTimetableView->viewAllTimetables();

    if(!empty($pdfTimetableResList)) {

        //for loop to iterate through all the timetables
        for ($k = 0; $k < count($pdfTimetableResList); $k++) {

            //timetable ids
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Image('../assets/images/logoDark.png',10,13);
            $pdf->cell(277, 20, "Timetable : " . $pdfTimetableResList[$k], 0, 1, 'C');

            $pdf->cell(25, 15, 'Time', 1, 0, 'C');
            $pdf->cell(36, 15, 'Monday', 1, 0, 'C');
            $pdf->cell(36, 15, 'Tuesday', 1, 0, 'C');
            $pdf->cell(36, 15, 'Wednesday', 1, 0, 'C');
            $pdf->cell(36, 15, 'Thursday', 1, 0, 'C');
            $pdf->cell(36, 15, 'Friday', 1, 0, 'C');
            $pdf->cell(36, 15, 'Saturday', 1, 0, 'C');
            $pdf->cell(36, 15, 'Sunday', 1, 1, 'C');


            //start and end times
            $timeslot_start = 8;
            $timeslot_end = 17;

            for ($timeslot_start; $timeslot_start <= $timeslot_end; $timeslot_start++) {

                $min_start = 00;
                $min_start = str_pad($min_start, 2, '0', STR_PAD_LEFT);
                $min_end = 00;
                $min_end = str_pad($min_end, 2, '0', STR_PAD_LEFT);
                for ($min_start; $min_start <= 30; $min_start += 30) {

                    //set end minutes
                    if ($min_start == 00) {
                        $min_end = 30;
                        $end_hr = $timeslot_start;
                    } else {
                        $min_end = 00;
                        $min_end = str_pad($min_end, 2, '0', STR_PAD_LEFT);
                        $end_hr = $timeslot_start + 1;
                    }

                    //time]
                    $pdf->cell(25, 20, $timeslot_start . ":" . $min_start . "-" . $end_hr . ":" . $min_end, 1, 0, 'C');

                    $newLine = 0;
                    $x = $pdf->GetX();
                    $y = $pdf->GetY();
                    //for loop to iterate the column data for a row -->
                    for ($i = 1; $i <= 7; $i++) {

                        $newLine = 0;
                        //new ITimetableCellServiceImplementation() to set the the id and retrieve data
                        $pdfTcsv = new ITimetableCellServiceImplementation();
                        TimetableCell::setTimeId($pdfTimetableResList[$k]);

                        //viewAllTimetableCells() method called
                        $pdfTcsv->viewAllTimetableCells(TimetableCell::getTimeId(), $i, $timeslot_start, $min_start);

                        $pdfTempTutor1 = TimetableCell::getTutor1();
                        $pdfTempTutor2 = TimetableCell::getTutor2();
                        $pdfClassType = TimetableCell::getClassType();
                        $pdfTempSubject = TimetableCell::getSubjectId();



                        //$pdf->cell(36, 10,$pdfTempTutor1, 1, $newLine, 'C');

                        $pdf->MultiCell(36,5,"$pdfTempTutor1 \n $pdfTempTutor2 \n $pdfClassType \n $pdfTempSubject",1,'C',false);

                        $pdf->SetXY($x + 36, $y);
                        $x  = $pdf->GetX();
                        $y = $pdf->GetY();

                        if($i == 7){
                            $pdf->Ln(0);
                            $pdf->SetY($y + 20);
                            $y = $pdf->GetY();
                        }

                    }
                }
            }
        }

        //Stats page
        $pdf->AddPage();
        $pdf->Image('../assets/images/logoDark.png',10,13);
        $pdf->Text(10, 30, "Statistics of the Timetables");
        $pdf->Text(10,33,"---------------------------------------");
        $pdf->Text(10,36,"");

        //get global variables
        global $noOfHalls;
        global $countLeftChartTimetableResList;
        global $difLeft;
        global $fullCountSlots;
        global $vacantCountSlots;
        $occupiedTimeSlots = $fullCountSlots - $vacantCountSlots;

        //Hall usage efficiency
        $pdf->Text(10,65, "Hall Usage Efficiency:");
        $pdf->Text(15, 70, "The hall usage efficiency compares the number of halls available and the number of halls that are allocated with a timetable and those that are not.");
        $pdf->Text(18,76, "- Total number of halls                                    : " . $noOfHalls);
        $pdf->Text(18,82, "- Total number of halls with Timetables        : " . $countLeftChartTimetableResList);
        $pdf->Text(18,88, "- Total number of halls without Timetables  : " . $difLeft);

        //Hall usage efficiency status
        if($countLeftChartTimetableResList == $noOfHalls){
            $pdf->Text(18, 94, "- Hall Usage Efficiency                                    : Excellent");
        }else if(($countLeftChartTimetableResList / $noOfHalls) * 100 >= 75 ){
            $pdf->Text(18, 94, "- Hall Usage Efficiency                                    : Very Good");
        }else if(($countLeftChartTimetableResList / $noOfHalls) * 100 >= 50 ){
            $pdf->Text(18, 94, "- Hall Usage Efficiency                                    : Average");
        }else if(($countLeftChartTimetableResList / $noOfHalls) * 100 >= 25 ){
            $pdf->Text(18, 94, "- Hall Usage Efficiency                                    : Poor");
        }else{
            $pdf->Text(18, 94, "- Hall Usage Efficiency                                    : Very Poor");
        }

        //Slot efficiency

        $pdf->Text(10, 110, "Time Slot efficiency:");
        $pdf->Text(15,115,"The time slot efficiency compares the total time slots with the vacant and the occupied time slots");

        //display time slot efficiency only if there are timetables in the IMS
        if($fullCountSlots!=0) {
            $pdf->Text(18,121,"- Total Time slots of 30 minutes                    : " . $fullCountSlots);
            $pdf->Text(18,127,"- Vacant Time slots of 30 minutes                 : " . $vacantCountSlots);
            $pdf->Text(18,133,"- Occupied Time slots of 30 minutes             : " . $occupiedTimeSlots);

            //time slot efficiency status
            if($occupiedTimeSlots == $fullCountSlots){
                $pdf->Text(18, 139, "- Hall Usage Efficiency                                    : Excellent");
            }else if(($occupiedTimeSlots / $fullCountSlots) * 100 >= 75) {
                $pdf->Text(18, 139, "- Hall Usage Efficiency                                    : Very Good");
            }else if(($occupiedTimeSlots / $fullCountSlots) * 100 >= 50) {
                $pdf->Text(18, 139, "- Hall Usage Efficiency                                    : Average");
            }else if(($occupiedTimeSlots / $fullCountSlots) * 100 >= 25){
                    $pdf->Text(18, 139, "- Hall Usage Efficiency                                : Poor");
            }else{
                $pdf->Text(18, 139, "- Hall Usage Efficiency                                    : Very Poor");
            }

        }else{
            $pdf->Text(18,127,"No Timetables in the Institute Management to calculate the time slot efficiency !");
        }


        $pdf->Text(10,200,"=================================================END OF TIMETABLE REPORT=================================================");
    }

    //if there is no timetables to show, else statement executes
    else{

            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 20);
            $pdf->Text(110,100,"No Timetables to display");

        }

    //output the pdf file
    $pdf->Output();



