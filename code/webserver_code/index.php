<html>
<head>
	<title> Evening Vocational School of Ierapetra - Raspberry Pi Autonomous Robot Car </title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>

<body>
	<div style="width:700px; margin:0 auto;">
		<h1>ΕΣΠΕΡΙΝΟ ΕΠΑΛ ΙΕΡΑΠΕΤΡΑΣ</h1>
		<h1>ΑΥΤΟΝΟΜΟ ΡΟΜΠΟΤΙΚΟ ΟΧΗΜΑ </h1>
		<h1>6ος ΠΑΝΕΛΛΗΝΙΟΣ ΔΙΑΓΩΝΙΣΜΟΣ ΑΝΟΙΧΤΩΝ ΤΕΧΝΟΛΟΓΙΩΝ ΣΤΗΝ ΕΚΠΑΙΔΕΥΣΗ - https://openedtech.ellak.gr/</h1>
		<table class="table table-striped table-bordered">
			<thead><tr>
				<td style='width:100px;'>Μετρήσεις</td>
				<td style='width:100px;'>Τοποθεσία οχήματος</td>
			</tr>
<?php
//Connect to MySQL
include("dbConnector.php");
//$con=connectToDB();

	echo "<tbody><tr>";
	echo "<td style=\"width:100px;\"><a href=\"post_data.php\">View Measurements</a></td>";
	echo "<td style=\"width:100px;\"><a href=\"review_location.php\">View Location</a></td>";
	echo "</tr></tbody>";
?>
		</table>
	</div>
</body>
</html>
