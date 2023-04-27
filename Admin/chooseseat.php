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


$id="";
$movie_id="";
$show_date="";
$show_time_id="";
$no_seat="";
$cinema_id="";
$ticket_price="";



if(isset($_GET["id"]))
{   
    $tbl="movie_ticket_booking.show";
    $resultShow=$con->select_all($tbl);
    

    $id=$_GET["id"];
    $con=new connec();
    $tbl="movie_ticket_booking.show";
    $result=$con->select($tbl,$id);
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();

            
            $id=$row["id"];
            $movie_id=$row["movie_id"];
            $show_date=$row["show_date"];
            $show_time_id=$row["show_time_id"];
            $no_seat=$row["no_seat"];
            $cinema_id=$row["cinema_id"];
            $ticket_price=$row["ticket_price"];
            
        }
}




if(isset($_POST["btn_booking"]))
{
    $con=new connec();

    $cust_id=$_POST[0];
    $show_id=$id;
    $no_tikt=$_POST["no_ticket"];
    $total_amnt=($ticket_price * $no_tikt);

   
    $seat_number=$_POST["seat_dt"];
    $seat_arr=explode(", ",$seat_number);

    foreach($seat_arr as $item)
    {
        $sql="insert into seat_reserved values(0,$id,$cust_id,'$item','true')";
        $abc= $con->insert_lastid($sql);
    }

    $sql="insert into seat_detail values(0,$cust_id,$id,$no_tikt)";
    $seat_dt_id=$con->insert_lastid($sql);


    $sql="insert into booking values(0,$cust_id,$id,$no_tikt,$seat_dt_id,now(),$total_amnt)";
    $con->insert($sql,"Buy Ticket Successfully");

   
}



?>

<script>
    // $(document).ready(function()
    // {
    //     for(i=1;i<=4;i++)
    //     {
    //     for(j=1;j<=10;j++)
    //     {
    //         $('#seat_chart').append('<div class="seat seat-selected col-md-2 mt-2 mb-2 ml-2 mr-2 text-center" style="background-color:grey;color:white"><input type="checkbox" id="seat" value="R'+(i+'S'+j)+'" name="seat_chart[]" class="mr-2  col-md-2 mb-2" onclick="checkboxtotal();" >R'+(i+'S'+j)+'</div>')
    //     }

    //     }
    // });
    

    function change_option(mvalue)
    {

        sessionStorage.setItem("movie_id_of_option", mvalue.value);
        // alert(sessionStorage.getItem('movie_id_of_option'));

    
    }


    function checkboxtotal()
    {
        var seat=[];
        
        $('input[name="seat_chart[]"]:checked').each(function(){
            seat.push($(this).val());
        });

        var st=seat.length;
        document.getElementById('no_ticket').value=st;
        var total=(st*60000)+ "Đồng";
        $('#price_details').text(total);

        // $('#seat_details').text(seat.join(", "));
        $('#seat_dt').val(seat.join(", "));
    }
</script>

<section class="mt-5">

    <div class="container">
        <h3 class="text-center mt-5">Assign Seat</h3>
        <a href="chooseseat.php?id=<?php echo $row["id"]; ?>"> <button type="button" class="btn btn-danger">Cancel</button></a>
        <a href="booking.php?id=<?php echo $movie_id; ?>"> <button type="button" class="btn btn-primary">Re-Assign Cinema</button></a>
        <a href="nowshowing.php"> <button type="button" class="btn btn-info">View Showing</button></a>
        <a href="staffdashboard.php"><button type="button" class="btn btn-warning">Return</button></a>
       
        <hr>
        <div class="row">
            
            <div class="col-md-6">
                <div id="seat-map" id="seatCharts">
                    <div class="row">
                        <label class="text-center" style="width:100%;background-color:#1974D3;color:white;padding:2%">
                            SCREEN
                        </label>
                    </div>
                    <?php 
                    
                    for($i=1;$i<=8;$i++)
                    {
                        ?>
                            <div class="row" id="seat_chart">
                        <?php
                        for($j=1;$j<=5;$j++)
                        {   
                            $resultSeatShow=$con->select_reserved_show("seat_reserved",$id);
                            
                            if($resultSeatShow->num_rows>0)
                            {
                                $resultSeatReserved=$con->select_reserved("seat_reserved","$i$j","$id");
                                if($resultSeatReserved->num_rows>0)
                                {
                                    ?>
                                        <div class="seat seat-selected col-md-2 mt-2 mb-2 ml-2 mr-2 text-center" style="background-color:red;color:white"><?php echo $i;?><?php echo $j;?></div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                        <div class="seat seat-selected col-md-2 mt-2 mb-2 ml-2 mr-2 text-center" style="background-color:orange;color:white"><input type="checkbox" id="seat" value="<?php echo $i;?><?php echo $j;?>" name="seat_chart[]" class="mr-2  col-md-2 mb-2" onclick="checkboxtotal();"><?php echo $i;?><?php echo $j;?></div>
                                    <?php
                                }
                                    
                                  
                            }
                            else
                            { 
                                echo '<div class="seat seat-selected col-md-2 mt-2 mb-2 ml-2 mr-2 text-center" style="background-color:orange;color:white"><input type="checkbox" id="seat" value="'.$i.''.$j.'" name="seat_chart[]" class="mr-2  col-md-2 mb-2" onclick="checkboxtotal();" >'.$i.''.$j.'</div>';
                            }
                            
                        }
                        ?>
                            </div>
                        <?php
                    }
                    ?>
                   

                </div>

                <h6 class="mt-3" style="color:#1974D3;">Total Ticket Price</h6>
                <p class="mt-1" id="price_details"></p>
                

            </div>
            <div class="col-md-6">
                <form method="post" class="mt-5">
                    <div class="container">


                        <label for="psw"><b>No. of Tickets</b></label>
                        <input type="number" id="no_ticket" name="no_ticket" required>

                        <label for="psw-repeat"><b>Seat Details</b></label>
                        <input type="text" name="seat_dt" id="seat_dt" required>

                        <div class="form-group">
                          <select class="form-control"  name="show_id"  id="show_id" style="border-radius:30px;" onChange="change_option(this)">
                            <option>Payment Type</option>
                                <option value="cash">Cash</option>
                                <option value="bank_card">Bank Card</option>
                                <option value="momo">Momo</option>

                          </select>
                        </div>
                        
                        <button type="submit" name="btn_booking" class="registerbtn">Buy Ticket</button>
                    </div>       
                </form>
            </div>
        </div>
    </div>

</section>


<?php
    include("admin_footer.php");
}
?>