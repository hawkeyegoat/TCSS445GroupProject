<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Health Info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        .login-box {
            background-color: #6c757d; 
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
        .table-responsive {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
        }
        .container-custom {
            max-width: 900px; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="HealthLink.png" alt="HealthLink Logo" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" href="index.php">Welcome Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="patient_info.php">All Patients Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboveAvgBP.php">Patients Above Average Blood Sugar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="appointment.php">Patient Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="provider_appointments.php">Provider Appointments</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5 container">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-lg-5 login-box">
                <p class="text-center">Patient Health Info</p>
                <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="patientName" class="form-label">Select Patient:</label>
                        <select class="form-control" id="patientName" name="patientId" onchange='this.form.submit()'>
                            <option selected>Select a patient</option>
                            <?php
                            $connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                            if ($connection->connect_error) {
                                die("Connection failed: " . $connection->connect_error);
                            }
                            $sql = "SELECT DISTINCT p.PatientID, p.First_name, p.Last_name 
                                    FROM patients p
                                    JOIN MonitoringData m ON p.PatientID = m.PatientID";
                            if ($result = $connection->query($sql)) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['PatientID'] . '">' . $row['First_name'] . ' ' . $row['Last_name'] . '</option>';
                                }
                                $result->free();
                            }
                            ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-sm-6 col-lg-5 login-box" id="createDataBox">
                <p class="text-center">Add health record</p>
                <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="patientID">Patient ID:</label><br>
                    <input type="text" id="patientID" name="patientID" required><br><br>

                    <label for="recordDateTime">Record Date and Time:</label><br>
                    <input type="datetime-local" id="recordDateTime" name="recordDateTime" required><br><br>

                    <label for="heartRate">Heart Rate:</label><br>
                    <input type="text" id="heartRate" name="heartRate"><br><br>

                    <label for="bloodPressure">Blood Pressure:</label><br>
                    <input type="text" id="bloodPressure" name="bloodPressure"><br><br>

                    <label for="temperature">Temperature:</label><br>
                    <input type="text" id="temperature" name="temperature"><br><br>

                    <label for="oxygenSaturation">Oxygen Saturation:</label><br>
                    <input type="text" id="oxygenSaturation" name="oxygenSaturation"><br><br>

                    <label for="bloodSugar">Blood Sugar:</label><br>
                    <input type="text" id="bloodSugar" name="bloodSugar"><br><br>

                    <label for="weight">Weight:</label><br>
                    <input type="text" id="weight" name="weight"><br><br>

                    <label for="arrythmiaEvent">Arrythmia Event:</label><br>
                    <input type="text" id="arrythmiaEvent" name="arrythmiaEvent"><br><br>

                    <input type="submit" name="create" value="Submit Health Record">
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET")
                {
                    $connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                    if ( mysqli_connect_errno() )
                                    {
                                        die( mysqli_connect_error() );
                                    }
                    if (isset($_GET['create'])) {
                        $patientId = $_GET['patientID'];
                        $recordDateTime = $_GET['recordDateTime'];
                        $heartRate = $_GET['heartRate'];
                        $bloodPressure = $_GET['bloodPressure'];
                        $temperature = $_GET['temperature'];
                        $oxygenSaturation = $_GET['oxygenSaturation'];
                        $bloodSugar = $_GET['bloodSugar'];
                        $weight = $_GET['weight'];
                        $arrythmiaEvent = $_GET['arrythmiaEvent'];
                        if (strcasecmp($arrythmiaEvent, "T") != 0 && strcasecmp($arrythmiaEvent, "F") != 0 ) {
                            echo "<div> Arrythmia Event must be 'T' or 'F'! </div>";
                            exit();
                        }
                        $sql = "INSERT INTO MonitoringData (patientID, recordDateTime, heartRate, bloodPressure, temperature, oxygenSaturation, bloodSugar, weight, arrythmiaEvent)
                                VALUES ('$patientId', '$recordDateTime', '$heartRate', '$bloodPressure', '$temperature', '$oxygenSaturation', '$bloodSugar', '$weight', '$arrythmiaEvent')";
                        try {
                            $result = mysqli_query($connection, $sql);
                        } catch (Exception $e) {
                            echo "<div> Query Failure! </div>";
                        }
                    }
                }
                ?>
            </div>
            <div class="col-sm-10 col-lg-10 login-box" id="createAppointmentsBox">
                <div id="healthInfoResult" class="mt-3">
                    <?php
                    if (isset($_GET['patientId'])) {
                        $patientId = $_GET['patientId'];

                        $sql = "SELECT p.First_name, p.Last_name, m.RecordDateTime, m.HeartRate, m.BloodPressure, m.Temperature, 
                                        m.OxygenSaturation, m.BloodSugar, m.Weight, m.ArrythmiaEvent
                                FROM patients p
                                JOIN MonitoringData m ON p.PatientID = m.PatientID
                                WHERE p.PatientID = '$patientId'";
                        
                        if ($result = $connection->query($sql)) {
                            if ($result->num_rows > 0) {
                                echo "<div class='table-responsive'>
                                        <table class='table table-hover'>
                                            <thead>
                                                <tr class='table-success'>
                                                    <th scope='col'>First Name</th>
                                                    <th scope='col'>Last Name</th>
                                                    <th scope='col'>Record Date Time</th>
                                                    <th scope='col'>Heart Rate</th>
                                                    <th scope='col'>Blood Pressure</th>
                                                    <th scope='col'>Temperature</th>
                                                    <th scope='col'>Oxygen Saturation</th>
                                                    <th scope='col'>Blood Sugar</th>
                                                    <th scope='col'>Weight</th>
                                                    <th scope='col'>Arrythmia Event</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['First_name']; ?></td>
                                        <td><?php echo $row['Last_name']; ?></td>
                                        <td><?php echo $row['RecordDateTime']; ?></td>
                                        <td><?php echo $row['HeartRate']; ?></td>
                                        <td><?php echo $row['BloodPressure']; ?></td>
                                        <td><?php echo $row['Temperature']; ?></td>
                                        <td><?php echo $row['OxygenSaturation']; ?></td>
                                        <td><?php echo $row['BloodSugar']; ?></td>
                                        <td><?php echo $row['Weight']; ?></td>
                                        <td><?php echo $row['ArrythmiaEvent']; ?></td>
                                    </tr>
                                    <?php
                                }
                                echo "</tbody>
                                    </table>
                                </div>";
                            } else {
                                echo '<p class="text-center">No health information found.</p>';
                            }
                            $result->free();
                        }
                    }
                    $connection->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>