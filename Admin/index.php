<?php
session_start();
$_SESSION["admin_username"]=null;
$error="";

if(isset($_POST["btn_login"]))
{
   $email_id=$_POST["log_email"];
   $paswrd_log=$_POST["log_psw"];

    if("admin@gmail.com"==$email_id)
    {
        if("123456"==$paswrd_log)
        {
            $_SESSION["admin_username"]=$email_id;
            header("Location:dashboard.php");
        }
        else
        {
            $error="Invalid Password";
        }
           
    }
    elseif("quanli@gmail.com"==$email_id)
    {
        if("123456"==$paswrd_log)
        {
            $_SESSION["admin_username"]=$email_id;
            header("Location:dashboard.php");
        }
        else
        {
            $error="Invalid Password";
        }
    }
    elseif("nhanvien@gmail.com"==$email_id)
    {
        if("123456"==$paswrd_log)
        {
            $_SESSION["admin_username"]=$email_id;
            header("Location:staffdashboard.php");
        }
        else
        {
            $error="Invalid Password";
        }
    }
    else
    {
        $error="Invalid Email";
        
    } 
}
?>





<!doctype html>
<html lang="en">
    <head>
        <title>Admin Panel</title>
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

        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin:auto;">
                    <form method="post">
                        <center>
                            <h1>Admin Login</h1>
                        </center>
                        <hr>

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="log_email" id="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="log_psw" id="psw" required>

                        <button type="submit" name="btn_login" class="loginbtn">Login</button>
                    </form>
                    <p style="color:maroon;margin-left:1%;"><?php echo $error;?></p>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>