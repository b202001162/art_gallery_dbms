<?php

session_start();
require_once "config.php";

if (!isset($_SESSION['user']) || $_SESSION['user'] !== true) {
    header("location: login.php");
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

    <title>Art Gallery</title>
</head>

<body style="background: #f9f9f9">
    <header class="all_header">
        <nav class="nav bg-secondary"
            style="position: absolute; top: 0px; width:100vw; height: 60px; justify-content: center;">
            <div class="wel_main">
                <ul class="all_ul">
                    <li class="active"><a href="#">HOME</a></li>
                    <li><a href="./logout.php">LOG OUT</a></li>
                </ul>
            </div>
        </nav>
        <div class="container" style="justify-content: center;
    align-items: center;
    display: flex;
    top: 160px;
    position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);">
            <h3>
                WELCOME TO THE ART GALLERY!
            </h3>
        </div>
        <div class="wel_cont">
            <?php

            $sql = "SELECT * FROM images";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $image = $row['imgname'];
                    $url = $row['url'];
                    $artistname = $row['artistname'];
                    if ($row1 = mysqli_fetch_assoc($result)) {
                        $id1 = $row1['id'];
                        $url1 = $row1['url'];
                        $image1 = $row1['imgname'];
                        $artistname1 = $row1['artistname'];
                    }
                    if ($row2 = mysqli_fetch_assoc($result)) {
                        $url2 = $row2['url'];
                        $image2 = $row2['imgname'];
                        $artistname2 = $row2['artistname'];
                    }
                    if ($row3 = mysqli_fetch_assoc($result)) {
                        $url3 = $row3['url'];
                        $image3 = $row3['imgname'];
                        $artistname3 = $row3['artistname'];
                    }
                    echo '
                        <div class="row">
                        <div class="wel_img_cont col">
                        <img src="' . $url . '" alt="" srcset="" style="max-height: 150px;"/>
                        <div class="wel_img_cont_title">'.$image.'
                            <div class="wel_img_cont_artistname"> By '.$artistname.' </div>
                            </div>
                        </div>
                        ';
                    if ($row1) {
                        echo '
                            <div class="wel_img_cont col">
                            <img src="' . $url1 . '" alt="" srcset="" style="max-height: 150px;"/>
                            <div class="wel_img_cont_title">'.$image1.'
                            <div class="wel_img_cont_artistname"> By '.$artistname1.' </div>
                            </div>
                            </div>
                        ';
                    }
                    if ($row2) {
                        echo '
                            <div class="wel_img_cont col">
                            <img src="' . $url2 . '" alt="" srcset="" style="max-height: 150px;"/>
                            <div class="wel_img_cont_title">'.$image2.'
                            <div class="wel_img_cont_artistname"> By '.$artistname2.' </div>
                            </div>
                            </div>
                        ';
                    }
                    if ($row3) {
                        echo '
                            <div class="wel_img_cont col">
                            <img src="' . $url3 . '" alt="" srcset="" style="max-height: 150px;"/>
                            <div class="wel_img_cont_title">'.$image3.'
                            <div class="wel_img_cont_artistname"> By '.$artistname3.' </div>
                            </div>
                            </div>
                        ';
                    }
                    echo '</div>';
                }
            }

            ?>

        </div>

        <!-- <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail">
                    <img
                        src="https://source.unsplash.com/random/?Artwork/">
                </div>
            </div> -->
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
    <script src="https://code.jquery.com/jquery-3.1.1.js"
        integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>

</html>