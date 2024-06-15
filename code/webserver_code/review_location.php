<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 100px;
            height: auto;
        }
        .header h1 {
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .pagination {
            margin: 20px 0;
            text-align: center;
        }
        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 4px;
            border: 1px solid #ddd;
            text-decoration: none;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }
        .pagination a:hover {
            background-color: #ddd;
        }
        .navigation {
            margin: 20px 0;
            text-align: center;
        }
        .navigation button {
            padding: 10px 20px;
            margin: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .navigation button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Autonomous Robot Car Location</h1>
    <div class="navigation">
        <button onclick="window.location.href='index.php';">Go to Previous Index</button>
    </div>
<?php

//Start MySQL Connection
include("dbConnector.php");
// Pagination settings
    $limit = 10; // Number of entries to show in a page.
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    }
    $start_from = ($page-1) * $limit;

//Sql Select statement
$SQL = "SELECT ID, sensor_name, location, date from Sensor ORDER BY id DESC LIMIT $start_from, $limit";

//Retrieve all records and display them
$result = mysqli_query($conn, $SQL);

if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Sensor Name</th>
                    <th>Location</th>
                    <th>Date</th>
                </tr>";
                
//process every record
				while ($row = mysqli_fetch_array( $result))
				{
					echo "<tr>";
					echo "<td>" .$row['ID']. "</td>";
					echo "<td>" .$row['sensor_name']. "</td>";
					echo "<td>" .$row['location']. "</td>";
					echo "<td>" .$row['date']. "</td></tr>";
	
				}
				echo "</table>";
        } else {
            echo "0 results";
        }
        // Pagination
    $sql = "SELECT COUNT(id) FROM Sensor";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $total_records = $row[0];
    $total_pages = ceil($total_records / $limit);

    //$conn->close();
    mysqli_close($conn);
    ?>
      <div class="pagination">
        <?php
        for ($i=1; $i<=$total_pages; $i++) {
            if ($i == $page) {
                echo "<a href='review_location.php?page=".$i."' class='active'>".$i."</a>";
            } else {
                echo "<a href='review_location.php?page=".$i."'>".$i."</a>";
            }
        }
        //$conn->close();
        ?>
        </div>

</table>
</body>
</html>
