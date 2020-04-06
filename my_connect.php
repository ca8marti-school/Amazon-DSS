<?php
    // Function to obtain mysqli connection to the database.
    function get_mysqli_conn()
    {
        //ensure that you change these to your own connection parameters
        $dbhost = 'localhost';
        $dbuser = 'username';
        $dbpassword = 'password';
        $dbname = 'username';
        $mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
    if ($mysqli->connect_errno) 
    {
        echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
    }
        return $mysqli;
    }
?>
