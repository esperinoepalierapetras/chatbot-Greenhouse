<html>
<head>
	<title> Evening Vocational School of Ierapetra - Raspberry Pi Autonomous Robot Car </title>
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
	<div class="header">
        <img src="Smart_Owl_Lab_1.png" alt="Logo"> <!-- Replace 'path_to_logo.png' with the actual path to your logo image -->
        <h1>Sensor Data Monitoring</h1>
    </div>
	<div style="width:700px; margin:0 auto;">
		<h1>ΕΣΠΕΡΙΝΟ ΕΠΑΛ ΙΕΡΑΠΕΤΡΑΣ 2023-2024</h1>
		<h1>ΑΥΤΟΝΟΜΟ ΡΟΜΠΟΤΙΚΟ ΟΧΗΜΑ</h1>
		<h1>6ος ΠΑΝΕΛΛΗΝΙΟΣ ΔΙΑΓΩΝΙΣΜΟΣ ΑΝΟΙΧΤΩΝ ΤΕΧΝΟΛΟΓΙΩΝ ΣΤΗΝ ΕΚΠΑΙΔΕΥΣΗ - https://openedtech.ellak.gr/</h1>
		<table class="table table-striped table-bordered">
			<thead><tr>
				<td style='width:100px;'>Μετρήσεις</td>
				<td style='width:100px;'>Τοποθεσία Οχήματος</td>
			</tr>
<?php
//Connect to MySQL
include("dbConnector.php");
//$con=connectToDB();

	echo "<tbody><tr>";
	echo "<td style=\"width:100px;\"><div class=\"navigation\">
        <button onclick=\"window.location.href='post_data.php';\">View Measurements</button>
    </div></td>";
	echo "<td style=\"width:100px;\"><div class=\"navigation\">
        <button onclick=\"window.location.href='review_location.php';\">View Location</button>
    </div></td>";
	echo "</tr></tbody>";
?>
		</table>
	</div>
</body>
</html>
