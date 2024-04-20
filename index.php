<?php 
    include_once('database/db_conn.php');
    include_once('model/patient.php');
    session_start();

    // Fetch data from the database
    $query = "SELECT * FROM tbl_patient";
    $result = mysqli_query($conn,$query);

    // Fetched data will be saved on a list of Patient objects
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
        <button onclick="handleAddPatient()">Add Patient</button>
        <table>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Address</th>
            </tr>
            
            <!-- Display the data from the list of Patient objects -->
            <?php foreach($listPatients as $patient): ?>
            <tr>
                <td><?php echo $patient->get_id(); ?></td>
                <td><?php echo $patient->get_name(); ?></td>
                <td><?php echo $patient->get_address(); ?></td>
                <td style="display: flex;">
                    <form method="post">
                        <!-- Records the data per row for editing purposes -->
                        <input type="hidden" name="patient_id" value="<?php echo $patient->get_id(); ?>">
                        <input type="hidden" name="name" value="<?php echo $patient->get_name(); ?>">
                        <input type="hidden" name="address" value="<?php echo $patient->get_address(); ?>">
                        <button type="submit" id="edit" name="edit">EDIT</button>
                    </form>
                    <form method="post" action="database/delete_patient.php">
                        <input type="hidden" name="patient_id" value="<?php echo $patient->get_id(); ?>">
                        <button type="submit" name="delete">DELETE</button>
                    </form>

                </td>
            </tr>
            <?php endforeach; ?>   
        </table>

        <!-- Container for adding patient modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">  
                <aside>
                    <button onclick="handleModalExit()">EXIT</button>
                </aside>
                
                <form method="post" action="database/add_patient.php">            
                    <h2>Patient Information</h2>
                    <label>Name</label>
                    <br>
                    <input type="text" name="name" id="pt-name" required>
                    <br>
                    <label>Address</label>
                    <br>
                    <input type="text" name="address" id="pt-add" required>
                    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>

        <!-- Container for editing patient modal -->
        <div id="editModal" class="modal">
            <div class="modal-content">           
                <aside>
                    <button onclick="handleModalExit()">EXIT</button>
                </aside>           
                <form method="post" action="database/edit_patient.php">
                    
                    <h2>Patient Information</h2>
                    
                    <label>Id</label>
                    <br>
                    <input type="text" name="id" readonly required>
                    <br>
                    <label>Name</label>
                    <br>
                    <input type="text" name="name" required>
                    <br>
                    <label>Address</label>
                    <br>
                    <input type="text" name="address" required>
                    <br>
                    <input type="submit" value="Submit">
                </form>
                </div>
        </div>
    </div>
</body>
</html>