<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="style.css">
</head>

	<body>
		<img src = "images/Amazon logo.png"/>
		<h1>Sign in to Amazon DSS</h1>

		<div class="login">
			<form action="productPicker.php" method="GET">
				
				<?php
					// Enable error logging: 
					error_reporting(E_ALL ^ E_NOTICE);
					// mysqli connection via user-defined function
					include ('./my_connect.php');
					$mysqli = get_mysqli_conn();
				?>

				<?php
					// SQL statement to collect customer names and IDs
					$sql = "SELECT c.customerID, c.customerName "
						. "FROM customer c";
						
					// Prepared statement
					$stmt = $mysqli->prepare($sql);
					$stmt->execute();

					// Bind result variables 
					$stmt->bind_result($customer_id, $customer_name); 

					/* fetch values while creating sign-in layout */ 
					echo '<label for="customerID">Pick Customer: </label>'; 
					echo '<select name="customerID">'; 
					while ($stmt->fetch()) 
					{
						printf ('<option value="%s">%s</option>', $customer_id, $customer_name); 
					}
					echo '</select><br>'; 
					
					/* close statement and connection*/ 
					$stmt->close(); 
					$mysqli->close();
				?>
					
				<br>
					<input tabindex="4" class="a-button-input" type="submit" value="Sign-in"/>
				</br>
				
			</form>
		</div>
	</body>
</html>
