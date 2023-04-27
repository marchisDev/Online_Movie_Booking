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
                                <h5 class="text-center mt-2" style="color:#1974D3;">Booking Details</h5>
                           
                          
                           <table class="table mt-5" border=1>
                           <thead id="main_color">
                               <tr>    
                                   <th>Name of Movie</th>
                                   <th>No Ticket</th>
                                   <th>Booking Date</th>
                                   <th>Show ID</th>  
                                   <th>Total</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php
                                   $result1=$con->select_all("booking");
                                   if($result1->num_rows>0)
                                   {
                                       while($row=$result1->fetch_assoc())
                                       {
                                           $show_id=$con->select("movie_ticket_booking.show",$row["show_id"]);
                                           $show_idrow=$show_id->fetch_assoc();

                                           $movie_id=$con->select("movie",$show_idrow["movie_id"]);
                                           $movie_idrow=$movie_id->fetch_assoc();
                                           ?>
                                               <tr>                             
                                                   <td><?php echo $movie_idrow["name"]; ?></td>
                                                   <td><?php echo $row["no_ticket"]; ?></td>
                                                   <td><?php echo $row["booking_date"]; ?></td>
                                                   <td><?php echo $row["show_id"]; ?></td>   
                                                   <td><?php echo $row["total_amount"]; ?> Đồng</td>
                                                   <td>
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
               </div>
               </div>
           </section>
                    
    <?php
    include("admin_footer.php");
}