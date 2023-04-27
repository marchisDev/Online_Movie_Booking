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
    $alt=$_POST["slider_alt_txt"];

    $target_dir = "images/";
    $target_file=$target_dir.$_FILES["fileToUpload"]["name"];

    $target_dir_01 = "../images/";
    $target_file_01=$target_dir_01.$_FILES["fileToUpload"]["name"];
    $uploadOk=1;
    $imageFiveType=strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload"]["name"],$target_file_01))
    {   
        include("../conn.php");
        $con=new connec();
        $sql="insert into slider values(0,'$target_file','$alt')";
        $con->insert($sql,"Record Insert");
        header("location:viewslider.php");
    }
    else
    {
        echo "Failed";
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
                            <h5 class="text-center mt-2" style="color:#1974D3;">Add Slider</h5>

                            <form method="post" enctype="multipart/form-data" class="mt-5">
                                <div class="container">
                                    <label><b>Select Image</b></label>
                                    <input type="file" name="fileToUpload" id="fileToUpload" required>
                                    <br><br>

                                    <label><b>Alternate Text</b></label>
                                    <input type="text" placeholder="Enter Alternate Text" name="slider_alt_txt" required>

                                    <button type="submit" name="btn_insert" class="loginbtn">Insert</button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </section>
                    
    <?php
    include("admin_footer.php");
}