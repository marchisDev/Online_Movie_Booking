<?php
include("header.php");


if(isset($_POST["btn_submit"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $no=$_POST["number"];
    $messg=$_POST["message"];

    $sql="insert into contact values(0,'$name','$email','$no','$messg', now())";

    $con=new connec();
    $con->insert($sql, "We Will Contact You Soon On Your Email Address");
}
?>


<section class="section">
    <div class="container">
        <div class="col-md-12">
            <center>
                <h1>Contact Us</h1>
                <h5>GET IN TOUCH</h5>
                <p>We'd love to talk about how we can work together.<br> Send us a message below and we'll respond as soon as possible.</p>
            </center>
        </div>
        <div class="row">
            <div class="col-md-6 mt-5 mb-5 pl-5" id="main_color" style="border-radius: 30px;">
                <h2 class="mt-5">Contact Information</h2>
                <p class="mt-1">
                    Our team will get back with in 24hours.
                </p>

                <p class="mt-5"><i class="fa fa-phone mt3"></i>&nbsp; +84 347263120</p>
                <p class="mt-3"><i class="fa fa-envelope mt3"></i>&nbsp; ddkcinme@gmail.com</p>
                <p class="mt-3"><i class="fa fa-map-marker mt3"></i>&nbsp; duydla86@gmail.com</p>

                <h2 class="mt-5">Join Us</h2>
                <div class="mb-5">
                    <a href="#" class="mt-5" style="color:white"><i class="fa fa-facebook-square fa-2x mt-3"></i></a>
                    <a href="#" class="mt-5 ml-3" style="color:white"><i class="fa fa-twitter-square fa-2x mt-3"></i></a>
                    <a href="#" class="mt-5 ml-3" style="color:white"><i class="fa fa-instagram fa-2x mt-3"></i></a>
                    <a href="#" class="mt-5 ml-3" style="color:white"><i class="fa fa-linkedin-square fa-2x mt-3"></i></a>
                </div>
            
            </div>
            <div class="col-md-6">
                <form method="post">
                    <div class="container">

                        <label for="username"><b>Your Name</b></label>
                        <input type="text" placeholder="Enter name" name="name" id="username" required>

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email" required>

                        <label for="number"><b>Number</b></label>
                        <input type="tel" placeholder="Enter number" name="number" id="number" required>

                        <label for="message"><b>Message</b></label>
                        <textarea name="message" id="message" rows="6"></textarea>
            
                        <button type="submit" name="btn_submit" class="registerbtn">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>






<?php
include("footer.php")
?>