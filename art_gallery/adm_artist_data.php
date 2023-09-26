<?php

session_start();
require_once "config.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: admin.php");
}



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="./CSS/style.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Admin</title>
</head>

<body style="background: #f9f9f9">
    <header class="all_header admin_header">
        <nav class="nav bg-secondary"
            style="position: absolute; top: 0px; width:100vw; height: 60px; justify-content: center;">
            <div class="wel_main">
                <ul class="all_ul">
                    <li class="active"><a href="#">ADMIN</a></li>
                    <li><a href="./logout.php">LOG OUT</a></li>
                </ul>
            </div>
        </nav>
        <div class="adm_slide bg-secondary">
            <a href="./admin_welcome.php"><button class="wel_btn adm_btn" id="adm_Us_Da">Users Database</button></a>
            <a href="#"><button class="wel_btn adm_btn adm_active" id="adm_art_da">Artist Database</button></a>
            <a href="admin_admin_data.php"><button class="wel_btn adm_btn " id="adm_adm_da ">Admin Database</button></a>
            <a href="adm_Image_data.php"><button class="wel_btn adm_btn" id="adm_img_da">Images Database</button> </a>
        </div>
        <div class="Welcome_text">
            <h3>Artist Database Records</h3>
        </div>

        <!-- Button trigger modal -->
        <a href="add_artist.php"><button type="button" class="btn btn-primary"
                style="position: fixed; top: 85%; right: 1.5%;">
                <span class="material-symbols-outlined">
                    person_add
                </span>
            </button>
        </a>


        <div class="adm_table_cont">
            <table class="table text-dark table-striped">
                <thead class="bg-secondary text-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Age</th>
                        <th scope="col">Email</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM artist";

                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $username = $row['artistname'];
                            $password = $row['password'];
                            $DOB = $row['DOB'];
                            $age = $row['age'];
                            $email = $row['email'];
                            echo '<tr>
                            <th scope="row">' . $id . "</th>
                            <td>" . $username . "</td>
                            <td>" . $password . '</td>
                            <td>' . $DOB . '</td>
                            <td>' . $age . '</td>
                            <td>' . $email . '</td>
                            <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal' . $id . '"><span class="material-symbols-outlined">
                            delete
                            </span></button>
        
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you want to delete it permanent!</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                                <a href="delete.php?deleteArtID=' . $id . '">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                        </tr>';
                        }
                    }

                    ?>

                </tbody>
            </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>