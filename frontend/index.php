<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .welcome-box {
            background-color: #6c757d;
            padding: 20px;
            border-radius: 10px;
            color: white;
            text-align: center;
        }
        .welcome-box a {
            margin: 5px;
        }
    </style>
</head>
<body>
    <header class="text-center p-4">
        <img src="HealthLink.png" alt="Healthcare Portal Logo" class="img-fluid">
    </header>
    <div class="container mt-5">
        <h1 class="text-center">Welcome to HealthLink</h1>
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-md-8 col-lg-6 welcome-box">
                <a href="patient_info.php" class="btn btn-light">All Patients Info</a>
                <br></br>
                <a href="aboveAvgBP.php" class="btn btn-light">Patients Above Average Blood Sugar</a>
                <br></br>
                <a href="appointment.php" class="btn btn-light">Patient Appointments</a>
                <br></br>
                <a href="provider_appointments.php" class="btn btn-light">Provider Appointments</a>
            </div>
        </div>
    </div>
</body>
</html>


