<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Appointments</title>
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
                        <a class="nav-link" href="patient_info.php">All Patients info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboveAvgBP.php">Patients Above Average Blood Sugar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="appointment.php">Patient Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="provider_appointments.php">Provider Appointments</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-lg-5 login-box" id="queryAppointmentsBox">
                <p class="text-center">Appointments by Provider</p>
                <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="providerName" class="form-label">Select Provider:</label>
                        <select class="form-control" id="providerName" name="providerId" onchange='this.form.submit()'>
                            <option selected>Select a provider</option>
                            <?php
                            $connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                            if ($connection->connect_error) {
                                die("Connection failed: " . $connection->connect_error);
                            }
                            $sql = "SELECT ProviderID, FirstName, LastName 
                                    FROM HealthcareProviders";
                            if ($result = $connection->query($sql)) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['ProviderID'] . '">';
                                    echo $row['FirstName'] . ' ' . $row['LastName'];
                                    echo "</option>";
                                }
                                $result->free();
                            }
                            ?>
                        </select>
                    </div>
                </form>
                <div id="appointmentsResult" class="mt-3">
                    <?php
                    if (isset($_GET['providerId'])) {
                        $providerId = $_GET['providerId'];
                        $sql = "SELECT h.FirstName, h.LastName, a.AppointmentDateTime, a.AppointmentType, p.First_name, p.Last_name 
                                FROM HealthcareProviders h
                                JOIN Appointments a ON h.ProviderID = a.ProviderID
                                JOIN patients p ON a.PatientID = p.PatientID
                                WHERE h.ProviderID = '$providerId'";
                        if ($result = $connection->query($sql)) {
                            if ($result->num_rows == 0) {
                                echo '<p class="text-center">No appointments found.</p>';
                            } else {
                                echo "<div class='table-responsive'>
                                        <table class='table table-hover'>
                                            <thead>
                                                <tr class='table-success'>
                                                    <th scope='col'>First Name</th>
                                                    <th scope='col'>Last Name</th>
                                                    <th scope='col'>Date</th>
                                                    <th scope='col'>Time</th>
                                                    <th scope='col'>Type</th>
                                                    <th scope='col'>Patient</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                                while ($row = $result->fetch_assoc()) {
                                    $appointmentDate = date("Y-m-d", strtotime($row['AppointmentDateTime']));
                                    $appointmentTime = date("H:i:s", strtotime($row['AppointmentDateTime']));
                                    ?>
                                    <tr>
                                        <td><?php echo $row['FirstName']; ?></td>
                                        <td><?php echo $row['LastName']; ?></td>
                                        <td><?php echo $appointmentDate; ?></td>
                                        <td><?php echo $appointmentTime; ?></td>
                                        <td><?php echo $row['AppointmentType']; ?></td>
                                        <td><?php echo $row['First_name'] . ' ' . $row['Last_name']; ?></td>
                                    </tr>
                                    <?php
                                }
                                echo '</tbody>';
                                echo '</table>';
                                echo '</div>';
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