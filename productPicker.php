<!DOCTYPE html>
<html>
<head>
	<title>Product Picker</title>
	<link rel="stylesheet" href="style.css">
</head>

    <body>
        <img src = "images/Amazon logo.png"/>

        <?php
            // Enable error logging: 
            error_reporting(E_ALL ^ E_NOTICE);
            // mysqli connection via user-defined function

            include('./my_connect.php');
            $mysqli = get_mysqli_conn();
        ?>

        <?php
            // SQL statement
            $sql = "SELECT c.customerID, c.customerName "
                . "FROM customer c "
                . "WHERE c.customerID = ?";

            // Prepared statement, retrieving customer ID 
            $stmt = $mysqli->prepare($sql);
            $customerID = $_GET['customerID']; 
            $stmt->bind_param('i', $customerID); 
            $stmt->execute();

            // Bind result variables 
            $stmt->bind_result($customer_ID, $customer_name); 

            /* fetch values while displaying correct user */ 
            if ($stmt->fetch()) 
            { 
                echo '<h1>Welcome to the Comparison Page ' . $customer_name. '!</h1>';
            } 
            $stmt->close();

        ?>

        <div class="login">
            <form action="comparison.php" method="GET">
            
                <?php

                   // SQL statement to collect customer names and IDs
					$sql = "SELECT p.productID, p.productName "
                    . "FROM product p";

                    // Prepared statement
					$stmt = $mysqli->prepare($sql);
					$stmt->execute();

					// Bind result variables 
					$stmt->bind_result($product_id1, $product_name1); 

					/* fetch values while creating sign-in layout */ 
					echo '<label for="productID">Compare Products: </label>'; 
					echo '<select name="productID1">'; 
					while ($stmt->fetch()) 
					{
						printf ('<option value="%s">%s</option>', $product_id1, $product_name1); 
					}
					echo '</select>'; 
                    
                    // Prepared statement
					$stmt = $mysqli->prepare($sql);
					$stmt->execute();

					// Bind result variables 
                    $stmt->bind_result($product_id2, $product_name2); 
                    
                    echo '<select name="productID2">'; 
					while ($stmt->fetch()) 
					{
						printf ('<option value="%s">%s</option>', $product_id2, $product_name2); 
					}
					echo '</select><br>'; 
					/* close statement*/ 
					$stmt->close(); 
					$mysqli->close();

                ?>

                <br>
                    <input tabindex="4" class="a-button-input" type="submit" value="Add to List"/>
                    <?php
                        //re-sends customer ID data
                        echo '<input type = "hidden" name = "customer_id" value =' . $customer_ID . '/>';
                    ?>
                </br>
            </form>
        </div>
    </body>
</html>