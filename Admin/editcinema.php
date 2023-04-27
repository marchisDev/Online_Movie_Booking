<?php
session_start();

$n="";
$l="";
$c="";

if(isset($_POST["btn_update"]))
{
    include("../conn.php");
    $name = $_POST["cinema_name_txt"];
    $location = $_POST["cinema_location_txt"];
    $city = $_POST["city_name_txt"];
    
    $id=$_GET["id"];
    $con=new connec();
    $sql="update cinema set name='$name', location='$location', city='$city' WHERE id='$id';";
    $con->update($sql,"Record Updated");
    header("location:viewcinema.php");
}


if(empty($_SESSION["admin_username"]))
{
    header("Location:index.php");
}

else
{
include("admin_header.php");

    if(isset($_GET["id"]))
    {
        $id=$_GET["id"];
        $con=new connec();
        $tbl="cinema";
        $result=$con->select($tbl,$id);
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();
            $n=$row["name"];
            $l=$row["location"];
            $c=$row["city"];
        }
    }




?>
       
            
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" id="main_color">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-center mt-2" style="color:#1974D3;">Edit Cinema Details</h5>
                            

                            <form method="post">
                                <label for="email"><b>Cinema Name</b></label>
                                <input type="text" placeholder="Enter Cinema Name" name="cinema_name_txt" value="<?php echo $n; ?>" required>

                                <label for="email"><b>Cinema Location</b></label>
                                <input type="text" placeholder="Enter Cinema Location" name="cinema_location_txt" value="<?php echo $l; ?>" required>

                                <label for="email"><b>City</b></label>
                                <input type="text" placeholder="Enter City" name="city_name_txt" value="<?php echo $c; ?>" required>

                                <button type="submit" name="btn_update" class="loginbtn">Update</button>
                            </form>



                        </div>
                    </div>
                </div>
            </section>
                    
    <?php
    include("admin_footer.php");
}