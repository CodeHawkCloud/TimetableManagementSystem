    <?php

    include dirname(__FILE__).'/../3_Timetable/mysql_db_connection.inc.php';
    require("../other/pdf/fpdf.php");

    //creation of a new FPDF object and overriding its title and text colour
    $pdf = new FPDF('L','mm', 'A4');
    $pdf->SetTitle("Subject Report",1);
    $pdf->SetTextColor(77,54,43);

    /* front page [start] */
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 20);
    $date = date("d/m/y");

    $pdf->Text(103,105,"Subject Report as at " . $date);
    $pdf->Image('../assets/images/logoDark.png',130,90);

    /*front page [end] */

    $pdf->AddPage();
    $pdf->Image('../assets/images/logoDark.png',10,6);
    $pdf->SetFont('Arial', 'B', 11);

    $sqlSub = "SELECT * FROM subject";
    $resSub = $conn->query($sqlSub);

    if($resSub->num_rows > 0 ){

        $pdf->SetY(20);
        $pdf->cell(30, 10, 'Subject Id', 1, 0, 'C');
        $pdf->cell(30, 10, 'Subject', 1, 0, 'C');
        $pdf->cell(110, 10, 'Reference', 1, 0, 'C');
        $pdf->cell(110, 10, 'Description', 1, 1, 'C');


        while($rowSub = $resSub->fetch_assoc()){
            $pdf->cell(30, 10, $rowSub['subject_id'], 1, 0, 'C');
            $pdf->cell(30, 10, $rowSub['subject'], 1, 0, 'C');
            $pdf->cell(110, 10, $rowSub['reference'], 1, 0, 'C');
            $pdf->cell(110, 10, $rowSub['description'], 1, 1, 'C');
        }
    }
    else{
        $pdf->Text(130,100,"No Subjects to display");
    }


    $pdf->Text(10,200,"======================================================END OF SUBJECT REPORT===============================================");




    $pdf->Output();

