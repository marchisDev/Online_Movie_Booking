<?php
session_start();
if(empty($_SESSION["username"]))
{
    header("Location:index.php");
}

else
{
    include("header.php");


$con=new connec();
$tbl="customer";
$result=$con->select($tbl,$_SESSION["cust_id"]);
?>
       
            
            <section>
               
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10" style="margin:auto">
                            <h5 class="text-center mt-5" style="color:#1974D3;">View Your Ticket</h5>
                            <div class="col-md-10" style="margin:auto">
                            
                           
                            <table class="table mt-5" border=1>
                            <thead id="main_color">
                                <tr>    
                                    <th>Name of Movie</th>
                                    <th>No Ticket</th>
                                    <th>Booking Date</th>
                                    <th>Show ID</th>  
                                    <th>Total</th>
                                    <th></th>
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
                                                        <a href="viewticketdetails.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">View Details</a>
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
    include("footer.php");
}