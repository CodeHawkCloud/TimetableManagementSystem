    <?php

    include dirname(__FILE__).'/../3_Timetable/mysql_db_connection.inc.php';
    require("../other/pdf/fpdf.php");

    //creation of a new FPDF object and overriding its title and text colour
    $pdf = new FPDF('L','mm', 'A4');
    $pdf->SetTitle("Classroom Report",1);
    $pdf->SetTextColor(77,54,43);

    /* front page [start] */
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 20);
    $date = date("d/m/y");

    $pdf->Text(95,105,"Classroom Report as at " . $date);
    $pdf->Image('../assets/images/logoDark.png',130,90);

    //next page
    $pdf->AddPage();
    $pdf->Image('../assets/images/logoDark.png',10,6);
    $pdf->SetFont('Arial', 'B', 11);

    $sqlClass = "SELECT * FROM classroom";
    $resClass = $conn->query($sqlClass);

    if($resClass->num_rows > 0 ){
        $pdf->SetY(20);

        $pdf->cell(50, 10, 'Classroom', 1, 0, 'C');
        $pdf->cell(60, 10, 'Building', 1, 0, 'C');
        $pdf->cell(50, 10, 'Number of seats', 1, 0, 'C');
        $pdf->cell(40, 10, 'Floor', 1, 0, 'C');
        $pdf->cell(40, 10, 'Multimedia', 1, 0, 'C');
        $pdf->cell(40, 10, 'Air Condition', 1, 1, 'C');


        while($rowClass = $resClass->fetch_assoc()){
            $pdf->cell(50, 10, $rowClass['class_id'], 1, 0, 'C');
            $pdf->cell(60, 10, $rowClass['building'], 1, 0, 'C');
            $pdf->cell(50, 10, $rowClass['number_of_seats'], 1, 0, 'C');
            $pdf->cell(40, 10, $rowClass['floor'], 1, 0, 'C');
            $pdf->cell(40, 10, $rowClass['multimedia'], 1, 0, 'C');
            $pdf->cell(40, 10, $rowClass['air_condition'], 1, 1, 'C');
        }

    }
    else{
        $pdf->Text(130,100,"No Classrooms to display");
    }

    $pdf->Text(10,200,"====================================================END OF CLASSROOM REPORT=============================================");


    $pdf->Output();

