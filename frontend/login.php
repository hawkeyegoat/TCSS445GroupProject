
<?php require_once('config.php'); ?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['email'], $_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $symptoms = isset($_POST['symptoms']) ? $_POST['symptoms'] : '';

            echo "<div>Form submitted successfully!</div>";

            $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
            
            if (mysqli_connect_errno()) {
                die('Connection failed: ' . mysqli_connect_error());
            }

            $sql = "SELECT * FROM PATIENTS_SIGNIN WHERE {$_POST['email']} = Patient_Username AND {$_POST['password']} = Patient_Password";

            if ($result = mysqli_query($connection, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    header('Location: all_patients.html');
                    exit();
                } else {
                    echo "<div> Wrong credentials!";
                }
                mysqli_free_result($result);
            }
        }
    }
    else {
        echo "<div>Form missing info!";
    }
?>