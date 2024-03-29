<?php
require_once "config.php";

$username = $password  = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $_SESSION['username_err'] = "Username cannot be blank";
        header("location: register.php");
    } else {
        $sql = "SELECT id FROM user WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $_SESSION['username_err'] = "This username is already taken";
                    header("location: register.php");
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


    // Check for password
    if (empty(trim($_POST['password']))) {
        $_SESSION['password_err'] = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $_SESSION['password_err'] = "Password cannot be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
    }



    // If there were no errors, go ahead and insert into the database
    if (empty($username_err) && empty($password_err) ) {
        $sql = "INSERT INTO user (username, password, DOB, email) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_dob, $param_email);

            // Set these parameters
            $param_username = $username;
            $param_password = $password;
            $param_dob = $_POST['DOB'];
            $param_email = $_POST['email'];

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location: welcome.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}

?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./CSS/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Register</title>
</head>

<body style="background: #f9f9f9">
    <header class="all_header">
        <nav class="nav bg-secondary"
            style="position: absolute; top: 0px; width:100vw; height: 60px; justify-content: center;">
            <div class="wel_main">
                <ul class="all_ul">
                    <li><a href="./login.php">LOGIN</a></li>
                    <li class="active"><a href="#">REGISTER</a></li>
                    <li><a href="./admin.php">ADMIN</a></li>
                </ul>
            </div>
        </nav>

        <div class="container text-dark shadow p-3 mb-5 bg-white rounded"
            style="position: absolute; top: 50%; left: 50%;  transform: translate(-50%, -50%); width: 450px; border: none; padding: 20px 30px; border-radius: 5px;">
            <h4>Please Register Here:</h4>
            <hr>
            <form action="" method="post">
                <div class="form-group">
                    <label for="inputEmail4">Username</label>
                    <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Username">
                    <span class="help-block"><?php if(isset($_SESSION['username_err'])) echo $_SESSION['username_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="DOB">Date of Birth</label>
                    <input type="date" class="form-control" name="DOB" id="DOB" placeholder="Date of Birth">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4"
                        placeholder="Password">
                </div>
                <button class="btn btn-secondary" type="submit" class="wel_btn">Register</button>
            </form>
        </div>
    </header>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>