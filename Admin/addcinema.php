<?php
session_start();

if(empty($_SESSION["admin_username"]))
{
    header("Location:index.php");
}

else
{
  
include("admin_header.php");

if(isset($_POST["btn_insert"]))
{
    $name = $_POST["cinema_name_txt"];
    $location = $_POST["cinema_location_txt"];
    $city = $_POST["city_name_txt"];

    $con=new connec();
    $sql="insert into cinema values(0,'$name','$location','$city')";
    $con->insert($sql,"Record Insert");
    header("location:viewcinema.php");
}


?>
       
            
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" id="main_color">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-center mt-2" style="color:#1974D3;">Add Cinema</h5>
                            

                            <form method="post">
                                <label for="email"><b>Cinema Name</b></label>
                                <input type="text" placeholder="Enter Cinema Name" name="cinema_name_txt" required>

                                <label for="email"><b>Cinema Location</b></label>
                                <input type="text" placeholder="Enter Cinema Location" name="cinema_location_txt" required>

                                <label for="email"><b>City</b></label>
                                <input type="text" placeholder="Enter City" name="city_name_txt" required>

                                <button type="submit" name="btn_insert" class="loginbtn">Insert</button>
                            </form>



                        </div>
                    </div>
                </div>
            </section>
                    
    <?php
    include("admin_footer.php");
}