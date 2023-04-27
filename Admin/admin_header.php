<?php 
include("../conn.php");
?>


<!doctype html>
<html lang="en">
    <head>
        <title>Admin Panel - Online Movie Ticket</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     
        <link rel="stylesheet" href="../CSS/style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="icon" href="../images/logo.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
            
        <nav class="navbar navbar-expand-md navbar-dark" id="main_color">
            <a class="navbar-brand"><img src="../images/logo.png" id="logo_main"/></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <h5><a class="nav-link" href="">Admin Panel Online Movie Ticket Booking</a></h5>
                    </li>
                        
                </ul>
            
                <ul  class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/index.php" >Logout</a>
                    </li>
                </ul>
                        
            </div>
        </nav>