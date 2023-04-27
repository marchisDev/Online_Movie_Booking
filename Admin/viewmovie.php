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
$sql="SELECT movie.id, movie.name, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.lang_name, movie.duration FROM movie, genre, industry, movie_ticket_booking.language 
where 
movie.industry_id=industry.id 
AND movie.genre_id=genre.id 
AND movie.lang_id=language.id;";
$result=$con->select_by_query($sql);
?>
       
            
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" id="main_color">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-center mt-2" style="color:#1974D3;">Movie Details</h5>
                            <a href="addmovie.php">Add Movie</a>

                            <table class="table mt-5" border=1>
                            <thead id="main_color">
                                <tr>
                                    <th>Banner</th>
                                    <th>Name</th>
                                    <th>Release Date</th>
                                    <th>Industry</th>
                                    <th>Genre</th>
                                    <th>Language</th>
                                    <th>Movie Duration</th>
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
                                                    <td><img src="../<?php echo $row["movie_banner"]; ?>" style="height:100px;width:150px;"></td>
                                                    <td><?php echo $row["name"]; ?></td>
                                                    <td><?php echo $row["rel_date"]; ?></td>
                                                    <td><?php echo $row["industry_name"]; ?></td>
                                                    <td><?php echo $row["genre_name"]; ?></td>
                                                    <td><?php echo $row["lang_name"]; ?></td>    
                                                    <td><?php echo $row["duration"]; ?></td>
                                                    <td>
                                                        <a href="editmovie.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Edit</a>
                                                        <a href="deletemovie.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
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