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
$sql="SELECT seat_detail.id, customer.fullname, seat_detail.seat_no, movie_ticket_booking.show.id AS 'show_id', movie.name FROM seat_detail, customer, movie_ticket_booking.show
join movie
where 
seat_detail.cust_id=customer.id AND 
seat_detail.show_id=movie_ticket_booking.show.id AND 
movie.id=movie_ticket_booking.show.movie_id;";
$result=$con->select_by_query($sql);
?>
       
            
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" id="main_color">
                            <?php include('admin_sidenavbar.php'); ?>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-center mt-2" style="color:#1974D3;">Seat Details</h5>
                            <a href="addseat_details.php">Add Seat Details</a>

                            <table class="table mt-5" border=1>
                            <thead id="main_color">
                                <tr>
                                    <th>Id</th>
                                    <th>Customer Name</th>
                                    <th>Seat No.</th>
                                    <th>Movie Name</th>
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
                                                    <td><?php echo $row["fullname"]; ?></td>
                                                    <td><?php echo $row["seat_no"]; ?></td>
                                                    <td><?php echo $row["name"]; ?></td>
                                                    <td>
                                                        <a href="editseat_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Edit</a>
                                                        <a href="deleteseat_deatils.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
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