<?php
include("conn.php");
$con=new connec();


if(!isset($_SESSION))
{
    session_start();
}

if(isset($_GET["action"]))
{
    if($_GET["action"]== "logout")
    {
        $_SESSION["username"]=null;
        $_SESSION["cust_id"]=null;
    }
}

if(empty($_SESSION["username"]))
{
    $_SESSION["ul"]='<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modelId">Register</a></li><li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modelId1">Login</a></li>';
}



if(isset($_POST["btn_login"]))
{
    $email_id = $_POST["log_email"];
    $paswrd_log=$_POST["log_psw"];

    $result=$con->select_login("customer",$email_id);
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();

        if($row["email"]==$email_id && $row["password"]==$paswrd_log)
        {
            $_SESSION["username"]=$row["fullname"];
            $_SESSION["cust_id"]=$row["id"];
            $_SESSION["ul"] ='<li class="nav-item"> <a class="nav-link" href="viewticket.php">View Your Ticket</a></li><li class="nav-item"><a class="nav-link">'.$_SESSION["username"].'</a></li><li class="nav-item"> <a class="nav-link" href="index.php?action=logout">Logout</a></li>';
        }
        else
        {
            echo '<script> alert("Invalid Password");</script>' ;
        }
    }
    else
    {
        echo '<script> alert("Invalid Email ID");</script>' ;
    }

}

if(isset($_POST["btn_reg"]))
{
    $name=$_POST["reg_full_name"];
    $email=$_POST["reg_email"];
    $cellno=$_POST["reg_number_txt"];
    $gender=$_POST["reg_gender_txt"];
    $paswrd=$_POST["reg_psw"];
    $cnfrm_paswrd=$_POST["psw_repeat"];

    if($paswrd==$cnfrm_paswrd)
    {
        $sql="insert into customer values(0,'$name','$email','$cellno','$gender','$cnfrm_paswrd')";

        $con->insert($sql, "Registration succeed. You can log in!");

    }
    else
    {
        ?>
            <script> alert("Confirm Password Not Matched"); </script>
        <?php
        // echo "Confirm Password Not Matched";
    }
}

?>






<!doctype html>
<html lang="en">
    <head>
        <title>Online Movie Ticket Booking</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     
        <link rel="stylesheet" href="CSS/style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="icon" href="images/logo.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 

    </head>
    <body>

    <nav class="navbar navbar-expand-md navbar-dark" id="main_color">
        <a class="navbar-brand" href="index.php"><img id="logo_main" src="images/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Movie</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="comingsoon.php">Coming Soon</a>
                    <a class="dropdown-item" href="nowshowing.php">Now Showing</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="offer.php">Offers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="nowshowing.php">Buy Ticket</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <?php echo $_SESSION["ul"]; ?>

                <!-- <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#modelId">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#modelId1">Login</a>
                </li> -->
            </ul>

            <!-- <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>
    
   
    <!-- Register Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" id="main_color">
                    <!-- <h5 class="modal-title">Register</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="container">
                            <center>
                                <h1>Register</h1>
                                <p>Please fill in this form to create an account.</p>
                            </center>
                            <hr>

                            <label for="username"><b>Full Name</b></label>
                            <input type="text" placeholder="Enter Your Name" name="reg_full_name" id="username" required>

                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="reg_email" id="email" required>

                            <label for="number"><b>Cell Number</b></label>
                            <input type="tel" placeholder="Enter number" name="reg_number_txt" id="number" required>

                            <label for="gender"><b>Gender</b></label>
                            <br>
                            <input type="radio" value="male" name="reg_gender_txt" id="gender" required>Male
                            <input type="radio" value="female" name="reg_gender_txt" id="gender" required>Female
                            <br>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="reg_psw" id="psw" required>

                            <label for="psw-repeat"><b>Repeat Password</b></label>
                            <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw-repeat" required>



                            <hr>
                            <p>By creating an account you agree to our <a href="#" id="a_color">Terms & Privacy</a>.</p>
            
                            <button type="submit" name="btn_reg" class="registerbtn">Register</button>
                        </div>
                        <div class="container signin">
                            <p>Already have an account? <a id="a_color" href="#" data-toggle="modal" data-target="#modelId1" data-dismiss="modal">Log in</a>.</p>
                        </div>
                    </form>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>


    <!-- Login Modal -->
    <div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" id="main_color">
                    <!-- <h5 class="modal-title">Login</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container"> 
                        <form method="post">
                            <center>
                                <h1>Login</h1>
                            </center>
                            <hr>

                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="log_email" id="email" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="log_psw" id="psw" required>

                            <button type="submit" name="btn_login" class="loginbtn">Login</button>
                        </form>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn" id="main_color">Login</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>


    