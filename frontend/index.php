<?php require_once('config.php'); ?>
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
            <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="col-sm-4 col-lg-4 login-box" id="patientBox">
                    <!-- Patient Box -->
                    <p>Patient Portal</p>
                    <button class="btn btn-light btn-sm" name="signUpExpand">Sign Up</button>
                    <button class="btn btn-light btn-sm" name="loginExpand">Login</button>
                </div>
                <div class="col-sm-4 col-lg-4 login-box" id="doctorBox">
                    <!-- Doctor Box -->
                    <p>Doctor Login</p>
                    <button class="btn btn-light btn-sm" name="providerLoginExpand">Login</button>
                </div>
            </form>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET")
                {
                    $connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                    if ( mysqli_connect_errno() )
                                    {
                                        die( mysqli_connect_error() );
                                    }
                    if (isset($_GET['signUpExpand'])) {
                        // Do something to give entry fields
                        echo '
                        <div class="col-sm-4 col-lg-4 login-box" id="signupForm">
                            <form class="form-inner" method="GET" action="index.php">
                                <input type="email" class="form-control mb-2" placeholder="Email">
                                <input type="password" class="form-control mb-2" placeholder="Password">
                                <textarea class="form-control mb-2" placeholder="Symptoms"></textarea>
                                <button type="submit" class="btn btn-primary" name="patientSignup">Sign Up</button>
                            </form>
                        </div>
                        ';
                    } else if (isset($_GET['loginExpand'])) {
                        // Do something to give entry fields
                        echo '
                        <div class="col-sm-4 col-lg-4 login-box" id="loginForm">
                            <form class="form-inner" method="GET" action="index.php">
                                <input type="email" class="form-control mb-2" placeholder="Email">
                                <input type="password" class="form-control mb-2" placeholder="Password">
                                <button type="submit" class="btn btn-primary" name="patientLogin">Login</button>
                            </form>
                        </div>
                        ';
                    } else if (isset($_GET['providerLoginExpand'])) {
                        // Do something to give entry fields
                        echo '
                        <div class="col-sm-4 col-lg-4 login-box" id="doctorForm">
                            <form class="form-inner" method="GET" action="index.php">
                                <input type="email" class="form-control mb-2" placeholder="Email">
                                <input type="password" class="form-control mb-2" placeholder="Password">
                                <button type="submit" class="btn btn-primary" name="providerLogin">Login</button>
                            </form>
                            <p class="admin-info" style="font-size: 0.8rem;">If you do not have a login, please contact your hospital admin.</p>
                        </div>
                        ';
                    }
                }
            ?>
    </div>
</body>
</html>


