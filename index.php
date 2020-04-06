<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="style.css">
</head>

	<body>
		<img src = "images/Amazon logo.png"/>
		<h1>Sign in to Amazon DSS</h1>
		<form action="cruisingrange.php" method="GET">
			
			<?php
				// Enable error logging: 
				error_reporting(E_ALL ^ E_NOTICE);
				// mysqli connection via user-defined function
				include ('./my_connect.php');
				$mysqli = get_mysqli_conn();
			?>

			<?php
				// SQL statement
				$sql = "SELECT c.customerID, c.customerName"
					. "FROM customer c";
					
				// Prepared statement, stage 1: prepare
				$stmt = $mysqli->prepare($sql);

				// Prepared statement, stage 2: execute
				$stmt->execute();

				// Bind result variables 
				$stmt->bind_result($customerID, $customerName); 

				/* fetch values */ 
				echo '<label for="customerID">Please Enter your Customer ID </label>'; 
				echo '<select name="customerID">'; 
				while ($stmt->fetch()) 
				{
					printf ('<option value="%s">%s</option>', $customerID, $customerName); 
				}
				echo '</select><br>'; 

				/* close statement and connection*/ 
				$stmt->close(); 
				$mysqli->close();
			?>

			<br>
				<input type="submit" value="Continue"/>
			</br>
		</form>
	</body>
</html>