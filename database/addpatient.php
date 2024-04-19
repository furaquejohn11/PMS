<?php 
    include_once('db_conn.php');

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name =  $_POST['name'];
        $address =  $_POST['address'];

        $query = "INSERT INTO tbl_patient(name,address) VALUES(?, ?)";

        $statement = $conn->prepare($query);
        $statement->bind_param("ss", $name, $address);
        $result = $statement->execute();

        if ($result) {
            // If insertion was successful, redirect or perform any other action
            // For example, you can redirect to the same page to avoid resubmission
            header("Location: ../index.php");
            exit(); // Make sure to exit after a header redirect
        } else {
            // If insertion failed, handle the error
            echo "Error: " . $conn->error;
        }

    }

    


?>