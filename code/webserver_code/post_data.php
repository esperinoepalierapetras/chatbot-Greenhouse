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
    <h1>Sensor Data</h1>
    <div class="navigation">
        <button onclick="window.location.href='index.php';">Go to Previous Index</button>
    </div>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "greenhouse123";
        $dbname = "esp_data";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
       // Pagination settings
    $limit = 10; // Number of entries to show in a page.
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    }
    $start_from = ($page-1) * $limit;
        
        //SQL statement
        $sql = "SELECT id, humidity, temperature, Hygrometer, sensor_name, location, date FROM Sensor ORDER BY id DESC LIMIT $start_from, $limit";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Humidity</th>
                    <th>Temperature</th>
                    <th>Soil Moisture</th>
                    <th>Sensor Name</th>
                    <th>Location</th>
                    <th>Date</th>
                </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["humidity"]. "</td>
                        <td>" . $row["temperature"]. "</td>
                        <td>" . $row["Hygrometer"]. "</td>
                        <td>" . $row["sensor_name"]. "</td>
                        <td>" . $row["location"]. "</td>
                        <td>" . $row["date"]. "</td>
                      </tr>";
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

    $conn->close();
    ?>

    <div class="pagination">
        <?php
        for ($i=1; $i<=$total_pages; $i++) {
            if ($i == $page) {
                echo "<a href='post_data.php?page=".$i."' class='active'>".$i."</a>";
            } else {
                echo "<a href='post_data.php?page=".$i."'>".$i."</a>";
            }
        }
        //$conn->close();
        ?>
        </div>
    </table>
</body>
</html>
