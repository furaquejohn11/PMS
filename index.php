<?php 
    include_once('database/db_conn.php');
    include_once('model/patient.php');
    session_start();

    $query = "SELECT * FROM tbl_patient";
    $result = mysqli_query($conn,$query);

    $listPatients = [];
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_array($result))
        {
            $listPatients[] = new Patient($row[0],$row[1],$row[2]);
        }
    }
    else {
        echo "Wala";
    }


    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
</head>
<body>
    <div>
        <!-- <form action="" method="post">
            <input type="submit" id="myBtn" value="Add">
        </form> -->
        <button onclick="handleAddPatient()">Add Patient</button>
        <table>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Address</th>
            </tr>
            <?php foreach($listPatients as $patient): ?>
            <tr>
                <td><?php echo $patient->get_id(); ?></td>
                <td><?php echo $patient->get_name(); ?></td>
                <td><?php echo $patient->get_address(); ?></td>
                <td style="display: flex;">
                    <form method="post">
                        <input type="hidden" name="patient_id" value="<?php echo $patient->get_id(); ?>">
                        <button type="submit" name="edit">EDIT</button>
                    </form>
                    <form method="post">
                        <input type="hidden" name="patient_id" value="<?php echo $patient->get_id(); ?>">
                        <button type="submit" name="delete">DELETE</button>
                    </form>

                </td>
            </tr>
            <?php endforeach; ?>
            
        </table>

        <div id="myModal" class="modal">

        <!-- Modal content -->
            <div class="modal-content">
                
                <aside>
                    <button onclick="handleModalExit()">EXIT</button>
                </aside>
                
                <form method="post" action="database/addpatient.php">
                    <label for="">Id</label>
                    <br>
                    <input type="text" name="id" id="">
                    <br>
                    <label for="">Name</label>
                    <br>
                    <input type="text" name="name" id="">
                    <br>
                    <label for="">Address</label>
                    <br>
                    <input type="text" name="address" id="">
                    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>

    </div>
</body>
</html>