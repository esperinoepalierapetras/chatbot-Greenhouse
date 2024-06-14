<?php
//Start MySQL Connection
include("dbConnector.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID, humidity, temperature, Hygrometer, sensor_name, location, date FROM Sensor ORDER BY ID DESC LIMIT 1";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
