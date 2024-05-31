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
<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        echo '<script>alert("Request!")</script>';
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
        if ( mysqli_connect_errno() )
                        {
                            die( mysqli_connect_error() );
                        }
        if (isset($_GET['patientID']) && isset($_GET['providerID']) && isset($_GET['appointmentDateTime']) && isset($_GET['appointmentType']) && isset($_Get['notes'])) {
            $patientId = $_GET['patientID'];
            $providerId = $_GET['providerID'];
            $appointmentDateTime = $_GET['appointmentDateTime'];
            $appointmentType = $_GET['appointmentType'];
            $notes = $_GET['notes'];
            $sql = "INSERT INTO Appointments
                    VALUES ($patientId, $providerId, $appointmentDateTime, $appointmentType, $notes)";
            echo '<script>alert('.$sql.')</script>';
            if ($result = mysqli_query($connection, $sql))
            {
                if(mysqli_affected_rows($connection) > 0) {
                    echo "<div> Success! </div>";
                } else {
                    echo "<div> Failure! </div>";
                }
            }
        }
        else {
            echo "<div>Missing required fields!</div>";
        }
    }
?>
</body>
