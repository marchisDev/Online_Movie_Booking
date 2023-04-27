<?php
session_start();

if(empty($_SESSION["admin_username"]))
{
    header("Location:index.php");
}

else
{
  
include("admin_header.php");

$con=new connec();
$tbl="slider";
$result=$con->select_all($tbl);
?>
       
            
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" id="main_color">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-center mt-2" style="color:#1974D3;">Slider Details</h5>
                            <a href="addslider.php">Add Slider</a>

                            <table class="table mt-5" border=1>
                            <thead id="main_color">
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Alt.Text</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($result->num_rows>0)
                                    {
                                        while($row=$result->fetch_assoc())
                                        {
                                            ?>
                                                <tr>                          
                                                    <td><?php echo $row["id"]; ?></td>
                                                    <td><img src="../<?php echo $row["img_path"]; ?>" style="height:100px;width:150px;"></td>
                                                    <td><?php echo $row["alt"]; ?></td>
                                                    <td>
                                                        <a href="editslider.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Edit</a>
                                                        <a href="deleteslider.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </section>
                    
    <?php
    include("admin_footer.php");
}