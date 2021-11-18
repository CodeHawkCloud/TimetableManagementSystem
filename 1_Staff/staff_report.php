
<?php


    include dirname(__FILE__).'/../3_Timetable/mysql_db_connection.inc.php';
    require("../other/pdf/fpdf.php");

    //creation of a new FPDF object and overriding its title and text colour
    $pdf = new FPDF('L','mm', 'A4');
    $pdf->SetTitle("Staff Report",1);
    $pdf->SetTextColor(77,54,43);

    /* front page [start] */
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 20);
    $date = date("d/m/y");

    $pdf->Text(105,105,"Staff Report as at " . $date);
    $pdf->Image('../assets/images/logoDark.png',130,90);

    /*front page [end] */

    $pdf->AddPage();
    $pdf->Image('../assets/images/logoDark.png',10,6);
    $pdf->SetY(20);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->cell(10, 10, 'NO', 1, 0, 'C');
    $pdf->cell(30, 10, 'Staff_ID', 1, 0, 'C');
    $pdf->cell(50, 10, 'First_Name', 1, 0, 'C');
    $pdf->cell(50, 10, 'Last_Name', 1, 0, 'C');
    $pdf->cell(60, 10, 'Email', 1, 0, 'C');
    $pdf->cell(50, 10, 'Qualification', 1, 0, 'C');
    $pdf->cell(30, 10, 'Salary', 1, 1, 'C');

    $sql = "SELECT Staff_ID,Full_Name,Last_Name,Email,Qualification,Salary from staff";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $i = 0;
        while ($row = $res->fetch_assoc()) {
            $i++;
            $pdf->cell(10, 6, $i, 1, 0, 'C');
            $pdf->cell(30, 6, $row["Staff_ID"], 1, 0, 'C');
            $pdf->cell(50, 6, $row["Full_Name"], 1, 0, 'C');
            $pdf->cell(50, 6, $row["Last_Name"], 1, 0, 'C');
            $pdf->cell(60, 6, $row["Email"], 1, 0, 'C');
            $pdf->cell(50, 6, $row["Qualification"], 1, 0, 'C');
            $pdf->cell(30, 6, $row["Salary"], 1, 1, 'C');

            $pdf->Text(10,200,"===================================================END OF STAFF REPORT=================================================");
        }
    } else {
        $pdf->Text(110,100,"No Staff to display");
    }

    $pdf->Output();
