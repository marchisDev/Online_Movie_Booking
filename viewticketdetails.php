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

$con=new connec();

$customer_name="";
$booking_date="";
$movie_name="";
$date="";
$show_time="";
$cinema="";
$seat_number="";
$price="";
$seat_detail_id="";



if(isset($_GET["id"]))
{   
    $id=$_GET["id"];
    $con=new connec();
    $tbl="booking";
    $result=$con->select($tbl,$id);
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();

            $customer_result=$con->select("customer",$row["cust_id"]);
            $customer_resultrow=$customer_result->fetch_assoc();
            
            
            $customer_name= $customer_resultrow["fullname"];
            $booking_date=$row["booking_date"];

            $show_id=$con->select("movie_ticket_booking.show",$row["show_id"]);
            $show_idrow=$show_id->fetch_assoc();

            $movie_id=$con->select("movie",$show_idrow["movie_id"]);
            $movie_idrow=$movie_id->fetch_assoc();

            $movie_name=$movie_idrow["name"];
            $date=$show_idrow["show_date"];

            $time_id=$con->select("show_time",$show_idrow["show_time_id"]);
            $showtime_idrow=$time_id->fetch_assoc();

            $show_time=$showtime_idrow["time"];

            $cinema_id=$con->select("cinema",$show_idrow["cinema_id"]);
            $cinema_idrow=$cinema_id->fetch_assoc();

            $cinema=$cinema_idrow["name"];
            $price=$show_idrow["ticket_price"];

            $resultSeatShow=$con->select_reserved_show("seat_reserved",$row["show_id"]); 

            $seat_detail_id=$row["seat_dt_id"];
        }
}

?>
       
            
       <section style="background-color:white;">
                   
                   <div class="container">
                   <div class="row">
                    <?php
                       
                    if($resultSeatShow->num_rows>0)
                    {
                        while($resultSeatShowrow=$resultSeatShow->fetch_assoc())
                        {   
                            $seat_number=$resultSeatShowrow["seat_number"];
                            ?>
                                
                                    <div class="col-md-4 mt-5" id="film_tag">
                                                    <a class="btn">Movie Ticket</a>
                                                    <h4 style="color:#000181"><b style="color:#1974D3;">Customer name   : </b><?php echo $customer_name;?></h4>
                                                    <h4 style="color:#000181"><b style="color:#1974D3;">Booking date    : </b><?php echo $booking_date;?></h4>
                                                    <h4 style="color:#000181"><b style="color:#1974D3;">Movie name      : </b><?php echo $movie_name;?></h4>
                                                    <h4 style="color:#000181"><b style="color:#1974D3;">Date            : </b><?php echo $date;?></h4>
                                                    <h4 style="color:#000181"><b style="color:#1974D3;">Show_time       : </b><?php echo $show_time;?></h4>
                                                    <h4 style="color:#000181"><b style="color:#1974D3;">Cinema          : </b><?php echo $cinema;?></h4>
                                                    <h4 style="color:#000181"><b style="color:#1974D3;">Seat number     : </b> <?php echo $seat_number;?></h4>
                                                    <h4 style="color:#000181"><b style="color:#1974D3;">Price           : </b><?php echo $price;?> Đồng</h4>
                                    </div>
                            <?php
                        }
                    }
                    ?>
                    </div>
                       
                       
   
                   
               </section>

           
            
                    
    <?php
    include("footer.php");