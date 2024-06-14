<?php

//Start MySQL Connection
include("dbConnector.php");
//$con=connectToDB();


echo "<html><head><title> Evening Vocational School of Ierapetra - Raspberry Pi Autonomous Robot Car </title><link rel=\"stylesheet\" href=\"../css/bootstrap.min.css\" />".
"<style>table {width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>".
"</head><body><div style=\"width:700px; margin:0 auto;\"><h1>Esperino EPAL Ierapetras</h1><h1>Autonomous Robot Car Log</h1><table class=\"table table-striped table-bordered\">".
"<thead><tr>".
"<th style='width:100px;'>ID</th>".
"<th style='width:100px;'>Sensor Name</th>".
"<th style='width:100px;'>Location of Robot Car</th>".
"<th style='width:100px;'>Date</th>".
"</tr>".
"</thead><tbody>";

//Sql Select statement
$SQL = "SELECT ID, sensor_name, location, date from Sensor";

//Retrieve all records and display them
$result = mysqli_query($conn, $SQL);

//process every record

while ($row = mysqli_fetch_array( $result))
{
	echo "<tr>";
	echo "<td>" .$row['ID']. "</td>";
	echo "<td>" .$row['sensor_name']. "</td>";
	echo "<td>" .$row['location']. "</td>";
	echo "<td>" .$row['date']. "</td></tr>";
	
}

echo "</tbody></table></div></body></html>";
mysqli_close($conn);
?>
