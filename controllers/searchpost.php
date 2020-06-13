<?php
require_once('data_access_helper.php');

//Get keyword sent from user
$keyword = $_GET["keyword"];

//Create an instance of data access helper
$db = new DataAccessHelper();

//Connect to database
$db->connect();

//Query database
$sql = "SELECT * FROM Product WHERE ProductName LIKE '%" . $keyword . "%' LIMIT 12;";

$result = $db->executeQuery($sql);

//Display result out
if ($result->num_rows > 0) {
  // output data of each row
	while($row = $result->fetch_assoc()) {
		echo "Name: " . $row["ProductName"]. " - RegularPrice: " . $row["RegularPrice"]. "<br>";
	}
} else {
	echo "0 results";
}

//Close connection
$db->close();
?>