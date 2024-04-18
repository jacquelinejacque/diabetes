<?php
include '../connect.php';

$patient= "SELECT * FROM reports join patients ON patients.patient_id = reports.user_id ";
$patientrun = mysqli_query($conn, $patient);
$rows = mysqli_fetch_all($patientrun, MYSQLI_ASSOC);

// reference the Dompdf namespace
require_once '../vendor/autoload.php';



use Dompdf\Dompdf;
$total = 0;
$html = '<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>patients Report</title>
    <link rel="shortcut icon" href="../images/eagle.jpg">
//    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<style>
td,th{
text-align: left;
font-size: 37px;
border: 2px solid #ddd;
}
</style>

        <div class="tems">

        <h2 style="text-align: center;text-transform: uppercase;color: #0d6efd;">
            Patients Report
        </h2>
        
        <table style="border-collapse: collapse; border: 2px solid #6AE512;width: 100%;">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Date</th>
                <th>Activity</th>
            </tr>
            </thead>
            <tbody>
        ';


foreach ($rows as $row) {
    $html .= '<tr>
              <td>' . $row['fullName'] . '</td>
              <td>' . $row['date'] . '</td>
            <td>' . $row['activity'] . '</td>
</tr>';
}

$html .= '</tbody>
        </table>
        </div>
    </div>
</body>
</html>';
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('patients Report.pdf', array('Attachment' => 0));