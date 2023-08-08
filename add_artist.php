<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    // Check if username is empty
    if (!empty(trim($_POST["artistname"]))) {
        $artistname = trim($_POST['artistname']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);
        $DOB = trim($_POST['DOB']);
        $sql = "Insert into artist (artistname, password, email, DOB) values('$artistname', '$password', '$email', '$DOB');";
        $result = mysqli_query($conn, $sql);
        $sql2 = "UPDATE artist set age = YEAR(NOW()) - YEAR(artist.DOB);";
        $result2 = mysqli_query($conn, $sql2);
        header("location: adm_artist_data.php");
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

    <title>Add Artist</title>
</head>

<body style="background: #f9f9f9">
    <header class="all_header">
        <nav class="nav bg-secondary"
            style="position: absolute; top: 0px; width:100vw; height: 60px; justify-content: center;">
            <div class="wel_main">
                <ul class="all_ul">
                    <li class="active"><a href="./admin.php">ADMIN</a></li>
                </ul>
            </div>
        </nav>

        <div class="container text-dark shadow p-3 mb-5 bg-white rounded"
            style="position: absolute; top: 50%; left: 50%;  transform: translate(-50%, -50%); width: 450px; border: none; padding: 20px 30px; border-radius: 5px;">
            <h4>Add details of Artist:</h4>
            <hr>
            <form action="" method="post">
                <div class="form-group">
                    <label for="inputEmail4">Artist name</label>
                    <input type="text" class="form-control" name="artistname" id="inputEmail4" placeholder="Artist Name">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Email</label>
                    <input type="email" class="form-control" name="email" id="inputPassword"
                        placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="DOB">Date of Birth</label>
                    <input type="date" class="form-control" name="DOB" id="DOB"
                        placeholder="Date of Birth">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4"
                        placeholder="Password">
                </div>
                <button class="btn btn-primary" type="submit" class="wel_btn">Register</button>
                <a href="adm_artist_data.php"><button class="btn btn-danger" type="" class="wel_btn">Cancel</button></a>
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