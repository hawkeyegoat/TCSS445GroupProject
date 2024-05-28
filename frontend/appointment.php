<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Appointments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
                        <a class="nav-link" href="all_patients.html">All Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="patient_bloodsugar.html">Blood Sugar Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="appointments.php">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="patient_info.html">Patient Info</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="text-center p-4">
        <img src="HealthLink.png" alt="Healthcare Portal Logo" class="img-fluid">
    </header>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-lg-5 login-box" id="queryAppointmentsBox">
                <p>Query Appointments</p>
                <form method="GET" action="appointments.php">
                    <div class="mb-3">
                        <label for="patientName" class="form-label">Select Patient:</label>
                        <select class="form-control" id="patientName" name="patientId" onchange='this.form.submit()'>
                            <option selected>Select a patient</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
