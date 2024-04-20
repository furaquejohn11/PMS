<?php

    include_once('db_conn.php');

    session_start();

    if (isset($_POST['patient_id']))
    {
        $id = $_POST['patient_id'];
        echo $id;
        $query = "DELETE FROM tbl_patient WHERE patient_id = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param("i", $id);
        $result = $statement->execute();

        if ($result) {
            session_destroy();
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }


    }

    

?>