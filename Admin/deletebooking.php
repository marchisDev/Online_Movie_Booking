
<?php
session_start();

$n="";
$l="";
$c="";

if(isset($_POST["btn_delete"]))
{
    include("../conn.php");
   
    $id=$_GET["id"];
    $table="booking";
    $con=new connec();
    
    $delete=$con->select($table,$id);
    $deleterow=$delete->fetch_assoc();

    $con->delete($table,$id);
    $con->delete_select("seat_detail",$deleterow["show_id"],$deleterow["cust_id"]);
    $con->delete_select("seat_reserved",$deleterow["show_id"],$deleterow["cust_id"]);
    header("location:staff_viewbooking.php");
    
}


if(empty($_SESSION["admin_username"]))
{
    header("Location:index.php");
}

else
{
include("admin_header.php");





?>
       
            
            <section>
                <div class="container-fluid">
                    <div class="row">
                                
                           
                            <div class="col-md-10">
                            
                            <form method="post">
                
                                    <button type="submit" name="btn_delete" class="btn btn-success">Confirm</button>
                                    <a href="staff_viewbooking.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                                        
                               
                                
                            </form>
                            



                        </div>
                    </div>
                </div>
            </section>
                    
    <?php
    include("admin_footer.php");
}