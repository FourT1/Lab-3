<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product</title>
	<link rel="stylesheet" type="text/css" href="product.css">
</head>
<body>
	<table id="tintable">
		<tr>
			<th>Code</th>
			<th>Name</th>
		</tr>
		<?php
		require_once('data_access_helper.php');

//Create an instance of data access helper
		$db = new DataAccessHelper();

//Connect to database
		$db->connect();

//Query database
		$result = $db->executeQuery("SELECT * FROM products LIMIT 12;");

//Display result out
		if ($result->num_rows > 0) {
  // output data of each row

			while($row = $result->fetch_assoc()) {
				echo "<tr><td>"  .$row["productCode"] ."</td><td>" .$row["productName"]. "</td></tr>";
			}

		} else {
			echo "0 results";
		}

//Close connection
		$db->close();
		?>
	</table>
</body>
</html>