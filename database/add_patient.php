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
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }

    }


?>