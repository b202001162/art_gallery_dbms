<?php
//This script will handle login
session_start();

// check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
    } else {
        $choice = $_POST['choice'];
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


    if (empty($err)) {
        if ($choice === "1") {
            $sql = "SELECT * FROM artist WHERE artistname='$username' AND password='$password'";
        } else {
            $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        }
        // $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($choice === '1' && $row['artistname'] === $username && $row['password'] === $password) {

                $_SESSION['id'] = $row['id'];
                $_SESSION['artist'] = true;
                $_SESSION['artistname'] = $row['artistname'];
                //Redirect user to welcome page
                header("location: artist_welcom.php");
                // $_SESSION['user'] = true;
                //     $_SESSION['username'] = $row['username'];
            } else if ($choice !== '1' && $row['username'] === $username && $row['password'] === $password) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['user'] = true;
                $_SESSION['username'] = $row['username'];
                //Redirect user to welcome page
                header("location: welcome.php");
            }
        }





        // $sql = "SELECT id, username, password FROM users WHERE username = ?";
        // $stmt = mysqli_prepare($conn, $sql);
        // mysqli_stmt_bind_param($stmt, "s", $param_username);
        // $param_username = $username;


        // // Try to execute this statement
        // if(mysqli_stmt_execute($stmt)){
        //     mysqli_stmt_store_result($stmt);
        //     if(mysqli_stmt_num_rows($stmt) == 1)
        //             {
        //                 mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
        //                 if(mysqli_stmt_fetch($stmt))
        //                 {
        //                     if(password_verify($password, $hashed_password))
        //                     {
        //                         // this means the password is corrct. Allow user to login
        //                         session_start();
        //                         $_SESSION["username"] = $username;
        //                         $_SESSION["id"] = $id;
        //                         $_SESSION["loggedin"] = true;

        //                         //Redirect user to welcome page
        //                         header("location: welcome.php");

        //                     }
        //                 }

        //             }

        // }
    }


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

    <title>User login</title>
</head>

<body style="background: #f9f9f9">

    <header class="all_header">
        <nav class="nav bg-secondary"
            style="position: absolute; top: 0px; width:100vw; height: 60px; justify-content: center;">
            <div class="wel_main">
                <ul class="all_ul">
                    <li class="active"><a href="#">LOGIN</a></li>
                    <li><a href="./register.php">REGISTER</a></li>
                    <li><a href="./admin.php">ADMIN</a></li>
                </ul>
            </div>
        </nav>


        <div class="container text-dark  shadow p-3 mb-5 bg-white rounded"
            style="position: absolute; top: 50%; left: 50%;  transform: translate(-50%, -50%); width: 450px; border: none; padding: 20px 30px; border-radius: 5px;">
            <h4>User Login Here:</h4>
            <hr>
            <form action="" method="post">
                <div class="form-group form-radio">
                    <input type="radio" name="choice" class="form-radio-input" id="radio1" value="1" required>
                    <label class="form-radio-label" for="radio1" style="margin-right: 5px">Artist</label>
                    <input type="radio" name="choice" class="form-radio-input" id="radio2" value="user" required>
                    <label class="form-radio-label" for="radio2">User</label>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter Username" style="background-color: #00000008;">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Enter Password" style="background-color: #00000008;">
                </div>
                <button id="submit-btn" class="btn btn-secondary" type="submit" class="wel_btn" style="">Submit</button>
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