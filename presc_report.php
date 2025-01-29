<?php
// Database connection 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'myhmsdb';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get doctor data
$sql = "SELECT doctor, pid,ID fname, lname, apptime,disease, allergy,prescription FROM prestb"; // Specify the columns you need
$result = $conn->query($sql);

// Open CSV file for writing
$filename = "Prescription_list.csv";

// Force the file to download in Excel format
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$output = fopen('php://output', 'w');

// Add UTF-8 BOM to ensure proper encoding
fwrite($output, "\xEF\xBB\xBF");  // BOM for UTF-8

// Add CSV header (must match the fields you selected in the query)
fputcsv($output, array('Patient ID', 'Appointment ID','First Name', 'Last Name', 'Gender', 'Email', 'Mobile Phone','Doctor','Fee','Appointment Date','Appointment Time'));

// Fetch and write data to CSV
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

fclose($output);
$conn->close();
?>