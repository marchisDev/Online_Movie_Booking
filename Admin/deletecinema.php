<?php
session_start();

$n="";
$l="";
$c="";

if(isset($_POST["btn_delete"]))
{
    include("../conn.php");
   
    $id=$_GET["id"];
    $table="cinema";
    $con=new connec();
    
    $con->delete($table,$id);
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
                            <h5 class="text-center mt-2" style="color:#1974D3;">Delete Cinema Details</h5>
                            

                            <form method="post">
                                <label for="email"><b>Cinema Name</b></label>
                                <input type="text" placeholder="Enter Cinema Name" name="cinema_name_txt" value="<?php echo $n; ?>" required>

                                <label for="email"><b>Cinema Location</b></label>
                                <input type="text" placeholder="Enter Cinema Location" name="cinema_location_txt" value="<?php echo $l; ?>" required>

                                <label for="email"><b>City</b></label>
                                <input type="text" placeholder="Enter City" name="city_name_txt" value="<?php echo $c; ?>" required>

                                
                                <button type="submit" name="btn_delete" class="loginbtn">Delete</button>
                                <hr>
                                <a class="cancel_btn" href="viewcinema.php">Cancel</a>
                                
                                
                            </form>



                        </div>
                    </div>
                </div>
            </section>
                    
    <?php
    include("admin_footer.php");
}