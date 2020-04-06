<!DOCTYPE html>
<html>
<head>
    <title>Comparison Page</title>
    <link rel="stylesheet" href="style.css">
</head>

    <body>
        <div class="row">
            <?php
                // Enable error logging: 
                error_reporting(E_ALL ^ E_NOTICE);
                // mysqli connection via user-defined function
                include ('./my_connect.php');
                $mysqli = get_mysqli_conn();
            ?>
            
            <?php

                // SQL statement
                $sql = "SELECT p.productID, p.img "
                    . "FROM product p";
                
                // Prepared statement, retrieving customer ID 
                $stmt = $mysqli->prepare($sql);   
                $stmt->execute();
                
                // Bind result variables 
                $stmt->bind_result($product_id, $product_img); 
                
                /* fetch values while displaying correct user */ 
                while ($stmt->fetch()) 
                { 
                    echo '<div class="column">';
                    echo '<img src=' . $product_img . ' width="200px" height="300px">';
                    echo '</div>';
                } 
                $stmt->close();
            ?>
            <form action="index.php" method="POST">
                <input tabindex="4" class="a-button-input" type="submit" value="Delete Table"/>
                    <?php
                        //re-sends customer ID data
                        $customerID = $_GET['customerID'];
                        echo '<input type = "hidden" name = "customer_id" value =' . $customerID . '/>';
                    ?>
            </form>
        </div>

        <div class= "row">
            <h1>Comparison Table</h1>
            <br></br>
            <table>
                <tr>
                    <th width="25%">Google Pixel 3a</th>
                    <th width="50%">Iphone 7</th>
                </tr>
                <tr>
                    <td>Best Review: 5 Stars</td>
                    <td>Best Review: 5 Stars</td>
                </tr>
                <tr>
                    <td>Worst Review: 1 Star</td>
                    <td>Worst Review: 1 Star</td>
                </tr>
                <tr>
                    <td bgcolor = "red">Price: $517.20</td>
                    <td bgcolor = "green">Price: $220.00</td>
                </tr>
                <tr>
                    <td>Delivery Time: 1 Month</td>
                    <td>Delivery Time: 1 Month</td>
                </tr>
                <tr>
                    <td>OS: Android</td>
                    <td>OS: IOS</td>
                </tr>
                <tr>
                    <td bgcolor = "green">RAM: 64GB</td>
                    <td bgcolor = "red">RAM: 32GB</td>
                </tr>
                <tr>
                    <td bgcolor = "red">Weight: 145g</td>
                    <td bgcolor = "green">Weight: 9.07g</td>
                </tr>
                <tr>
                    <td bgcolor = "green">Dimensions: 15.1 x 7 x 0.8cm</td>
                    <td bgcolor = "red">Dimensions: 13.8 x 0.7 x 6.7cm</td>
                </tr>
                <tr>
                    <td>Colour: Black</td>
                    <td>Colour: Rose Gold</td>
                </tr>
            </table>
        </div>

    </body>

</html>