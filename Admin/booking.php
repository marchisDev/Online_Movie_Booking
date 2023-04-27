<?php
session_start();

if(empty($_SESSION["admin_username"]))
{
    header("Location:index.php");
}

else
{
include("admin_header.php");


$b="";
$n="";
$r="";
$i="";
$g="";
$l="";
$d="";



    if(isset($_GET["id"]))
    {   
        
        $con=new connec();
        $resultCinema=$con->select_all("cinema");

        $id=$_GET["id"];
       
        $tbl="movie";
        $result=$con->select($tbl,$id);
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();

            
            $b=$row["movie_banner"];
            $n=$row["name"];
            $r=$row["rel_date"];
            $ind=$con->select("industry",$row["industry_id"]);
            $i=$ind->fetch_assoc();

            $lang=$con->select("language",$row["lang_id"]);
            $l=$lang->fetch_assoc();

            $gen=$con->select("genre",$row["genre_id"]);
            $g=$gen->fetch_assoc();
            $d=$row["duration"];

          
        }
    }

?>
            
            <section class="mt-5">
                   
                <div class="container">
                    <a href="nowshowing.php"> <button type="button" class="btn btn-info">View Showing</button></a>
                    <div class="row" style="margin-bottom:30px;">
                        <div class="col-md-5" >
                                    <h3 class=" mt-2" style="height:40px"><?php echo $n; ?></h3>
                                    <a href="viewdetail.php?id=<?php echo $id ?>"><img src="../<?php echo $b; ?>" alt="" style="width: 60%; height: 350px;"></a>
                                    
                        </div>
                            <div class="col-md-7">
                                <h5 class="text-center mt-2" style="color:#1974D3;">Choose Cinema</h5>

                                <div class="container">
 
                                <?php
                                if($resultCinema->num_rows>0)
                                {
                                    $i=1;
                                    while($row=$resultCinema->fetch_assoc())
                                    {
                                        
                                    ?>
                                        <div id="accordion">
                                            <div class="card">
                                                <div class="card-header">
                                                    <a class="card-link"
                                                        data-toggle="collapse"
                                                        href="#description<?php echo $i?>">
                                                                    <tr>                          
                                                                        <td><?php echo $row["id"]; ?></td>
                                                                        <td><?php echo $row["name"]; ?></td>
                                                                        <td><?php echo $row["location"]; ?></td>
                                                                        <td><?php echo $row["city"]; ?></td>

                                                                    </tr>
                                                    </a>
                                                </div>
                                                
                                                <div id="description<?php echo $i?>"
                                                    class="collapse"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        
                                                            <?php
                                                                $cinemaId=$row["id"];
                                                                $tbl="movie_ticket_booking.show";
                                                                $resultShow=$con->select_all($tbl);
                                                                if($resultShow->num_rows>0)
                                                                {
                                                                    while($row=$resultShow->fetch_assoc())
                                                                    {
                                                                        $time=$con->select("show_time",$row["show_time_id"]);
                                                                        $timerow=$time->fetch_assoc();

                                                                        $cinema=$con->select("cinema",$row["cinema_id"]);
                                                                        $cinemarow=$cinema->fetch_assoc();
                                                                        if($id==$row["movie_id"]&&$cinemaId==$cinemarow["id"])
                                                                        {    
                                                                        ?>
                                                                                <table class="table mt-5" border=1>
                                                                                <thead id="main_color">
                                                                                    <tr>
                                                                                        <td><b>Date</b></td>
                                                                                        <td><b>Time</b></td>
                                                                                        <td><b>Price</b></td>
                                                                                       
                                                                                        <td><b></b></td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>                          
                                                                                        <td><?php echo $row["show_date"]; ?></td>
                                                                                        <td><?php echo $timerow["time"]; ?></td>
                                                                                        <td><?php echo $row["ticket_price"]; ?></td>
                                                                                       
                                                                                        <td>
                                                                                            <a href="chooseseat.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Choose</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        <?php
                                                                        }
                                                                        else
                                                                        {
                                                                        
                                                                        }
                                                                    }
                                                                }
                                                            ?> 
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    <?php
                                    $i++;
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
                </div>

            </section>




<?php
    include("admin_footer.php");
}
?>