<?php

include '../lib/session.php';
Session::checkSession();


?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/styleadmin.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="bootstrap/js/jquery-331.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>


</head>

<body>



    <div class="nav-menu">
        <nav class="navbar navbar-expand-lg  navbar-dark navbar-default">
            <a class="navbar-brand" href="dashboard.php"><img src="../assets/logo.png" alt="Logo" style="width:50px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.php">Dashboard </a>
                    </li>
                    <li>
                        <a class="nav-link" href="vieworders.php">Orders</a>
                    </li>


                    <li>
                        <a class="nav-link" href="../index.php">Shop</a>
                    </li>
                
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php
                    //destroy the session if the user logged out 
                    if (isset($_GET['action']) && $_GET['action'] == "logout") {
                        Session::destroy();
                    }
                    ?>

                    <li><a class="nav-link" href="?action=logout">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>


    <nav class="admin-area navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Area</a>
  </div>
</nav>
