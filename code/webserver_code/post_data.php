<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Data</title>
    <style>
        table {
            width: 100%;
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
    </style>
</head>
<body>
    <h1>Sensor Data</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Humidity</th>
            <th>Temperature</th>
            <th>Soil Moisture</th>
            <th>Sensor Name</th>
            <th>Location</th>
            <th>Date</th>
        </tr>
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
        //Get the current page number
        if (isset( $_GET['page_no'] ) && $_GET['page_no']!=""){
            $page_no = $_GET['page_no']; }
        else {
            $page_no = 1;
            $offset = 0;
        }
        //Set total records per value
        $total_records_per_page = 10;
        
        //Calculate offset Value and Set other Variables
        $offset = ($page_no-1) * $total_records_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = 2;
        
        //Get the total number of pages for pagination
        //$total_records = 0;
        $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM Sensor");
        $total_records = mysqli_fetch_array($result_count);
        $total_records = $total_records['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        $second_last = $total_no_of_pages - 1;
        
        //SQL statement
        $sql = "SELECT id, humidity, temperature, Hygrometer, sensor_name, location, date FROM Sensor";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
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
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
