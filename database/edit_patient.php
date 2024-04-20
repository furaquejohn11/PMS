<?php 

session_start();
include_once('db_conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    $query = "UPDATE tbl_patient SET name = ?, address = ? WHERE patient_id = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("ssi", $name, $address, $id);
    $result = $statement->execute();

    if ($result) {
        header("Location: ../index.php");
        exit(); 
    } else { 
        echo "Error: Update failed.";  
    }
}
    
?>