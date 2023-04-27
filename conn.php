
<?php

class connec
{
    public $username="root";
    public $password="";
    public $server_name="localhost";
    public $db_name="movie_ticket_booking";

    public $conn;


    function __construct()
    {
        $this->conn=new mysqli($this->server_name,$this->username,$this->password,$this->db_name);
        if($this->conn->connect_error)
        {
            die("Connection Failed");
        }
        // else
        // {
        //     echo "Connection Success";
        // }
    }

    function select_all($table_name)
    {      
        $sql = "SELECT * FROM $table_name";
        $result=$this->conn->query($sql);
        return $result;
    }

    function select_show_dt()
    {      
        $sql="SELECT movie_ticket_booking.show.id, movie_ticket_booking.show.show_date, movie_ticket_booking.show.ticket_price, movie_ticket_booking.show.no_seat,movie_ticket_booking.show.movie_id, movie.name AS 'movie_name', show_time.time, cinema.name FROM movie_ticket_booking.show, movie,show_time, cinema where movie_ticket_booking.show.movie_id=movie.id AND movie_ticket_booking.show.show_time_id =show_time.id AND movie_ticket_booking.show.cinema_id=cinema.id;";
        $result=$this->conn->query($sql);
       
        
        return $result;
    }

    function select_show_dt_by_Movie_Id($id)
    {      
        $sql="SELECT movie_ticket_booking.show.id, movie_ticket_booking.show.show_date, movie_ticket_booking.show.ticket_price, movie_ticket_booking.show.no_seat,movie_ticket_booking.show.movie_id, movie.name AS 'movie_name', show_time.time, cinema.name FROM movie_ticket_booking.show, movie,show_time, cinema where movie_ticket_booking.show.movie_id=$id AND movie_ticket_booking.show.show_time_id =show_time.id AND movie_ticket_booking.show.cinema_id=cinema.id;";
        $result=$this->conn->query($sql);
       
        
        return $result;
    }


    function select_movie($table_name, $date)
    {      
        if($date =="commingsoon")
        {
            $sql = "SELECT * FROM $table_name where rel_date > now()";
            $result=$this->conn->query($sql);
            return  $result;
        }
        else
        {
            $sql = "SELECT * FROM $table_name where rel_date < now()";
            $result=$this->conn->query($sql);
            return  $result;
        }
    }


    function select_by_query($query)
    {
        $result=$this->conn->query($query);
        return $result;
    }


    function select($table_name,$id)
    {      
        $sql = "SELECT * FROM $table_name where id=$id";
        $result=$this->conn->query($sql);
        return  $result;
    }

    function select_reserved($table_name,$seat_number,$show_id)
    {      
        $sql = "SELECT * FROM $table_name where seat_number=$seat_number and show_id=$show_id";
        $result=$this->conn->query($sql);
        return  $result;
    }

    function select_reserved_show($table_name,$id)
    {      
        $sql = "SELECT * FROM $table_name where show_id=$id";
        $result=$this->conn->query($sql);
        return  $result;
    }

    
    function select_login($table_name,$email)
    {      
        $sql = "SELECT * FROM $table_name where email='$email' ";
        $result=$this->conn->query($sql);
        return  $result;
    }
  

  
    function insert($query,$msg)
    { 
        if($this->conn->query($query)===TRUE)
        {
             echo '<script> alert("'.$msg.'");</script>' ;
        }
        else
        {
             echo '<script> alert("'.$this->conn->error.'");</script>' ;
          
        }
    }

    
    function insert_lastid($query)
    {
        if($this->conn->query($query)===TRUE)
        {
            $last_id=$this->conn->insert_id;
        }
        else
        {
             echo '<script> alert("'.$this->conn->error.'");</script>' ;  
        }
        return $last_id;
    }


    function update($query,$msg)
    { 
        if($this->conn->query($query)===TRUE)
        {
             echo '<script> alert("'.$msg.'");</script>' ;
        }
        else
        {
             echo '<script> alert("'.$this->conn->error.'");</script>' ;
        }
    }

    function delete($table_name,$id)
    { 

        $query="Delete from $table_name WHERE id =$id";
        if($this->conn->query($query)===TRUE)
        {
             echo '<script> alert("Record Deleted");</script>' ;
        }
        else
        {
             echo '<script> alert("'.$this->conn->error.'");</script>' ;
        }
    }

    function delete_select($table_name,$id1,$id2)
    { 

        $query="Delete from $table_name WHERE show_id =$id1 and cust_id=$id2";
        if($this->conn->query($query)===TRUE)
        {
             echo '<script> alert("Record Deleted");</script>' ;
        }
        else
        {
             echo '<script> alert("'.$this->conn->error.'");</script>' ;
        }
    }
}  


?>