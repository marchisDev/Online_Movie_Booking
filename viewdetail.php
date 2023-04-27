<?php
session_start();
if(empty($_SESSION["username"]))
{
    header("Location:index.php");
}
else
{
    include("header.php");
}

$b="";
$n="";
$r="";
$i="";
$g="";
$l="";
$d="";
$desc="";



    if(isset($_GET["id"]))
    {   
        $resultCinema=$con->select_all("cinema");

        $id=$_GET["id"];
        $con=new connec();
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
            $desc=$row["movie_desc"];

          
        }
    }

?>
            
            <section class="mt-5">
                   
                <div class="container">
                    <div class="row">
                        <div class="col-md-3" id="film_tag">
                                    <h4 class=" mt-2" style="height:40px"><?php echo $n; ?></h4>
                                    <img src="<?php echo $b; ?>" alt="" style="width: 100%; height: 350px;">
                                    <a href="booking.php?id=<?php echo $id; ?>" class="btn">Now Book Ticket</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10" id="film_tag">
                                        <h5><b>Release Date : </b><?php echo $r; ?></h5>
                                        <h5><b>Industry     : </b><?php echo $i["industry_name"]; ?></h5>
                                        <h5><b>Language     : </b><?php echo $l["lang_name"]; ?></h5>
                                        <h5><b>Genre        : </b><?php echo $g["genre_name"]; ?></h5>
                                        <h5><b>Duration     : </b><?php echo  $d; ?></h5>
                                        <h5><b>Description  : </b><?php echo  $desc; ?></h5>
                        </div>
                    </div>
                    </div>
                    

                </div>
                </div>

            </section>

            

            
                    
<?php
include("footer.php");
