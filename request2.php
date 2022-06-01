<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
include('db.php');
session_start();
$nm="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $date=$_POST['date'];
    $t=$_SESSION['mail'];
           
  /*$sel="SELECT date from leaverequest where month(date)=(select month('$date') as data) and username='$t'";
  $result=mysqli_query($conn, $sel);
  $rows=mysqli_num_rows($result);
  
  if($rows<2)
{*/
    $sel="SELECT date from leaverequest where month(date)=(select month('$date') as data) and email='$t'";
    $result=mysqli_query($conn, $sel);
   // $rows=mysqli_num_rows($result);
//echo $rows;
    $today_date=date('y-m-d');
  
    $td=strtotime($today_date);
    $dt=strtotime($date);
   if(mysqli_num_rows($result)<2)
   {
    if(($dt<$td))
    {
   $nm="you can't apply leave for past dates";
       // echo "you can't apply leave for past dates ";

    }
    else{
    $day = date("D", strtotime($date));
    if( $day == 'Sun'){
        $nm="you can't apply leave on sundays";
       // echo "you can't apply leave on sundays";
    }

    else{

        $sel="select * from holidayslist where  date='$date'";
        $que=mysqli_query($conn,$sel);
        $rows=mysqli_num_rows($que);
        if($rows>0)
        {
            $nm="you can't apply leave on public holiday ";
            //echo "you can't apply leave on public holiday ";
        }
        else{

            $sel="select * from leaverequest where email='$t' and date='$date'";
            $que=mysqli_query($conn,$sel);
            $rows=mysqli_num_rows($que);
            if($rows>0)
            {
                $nm= "Already applied leave for the same date ";
               // echo "Already applied leave for the same date ";
            }
            else{
                $query="insert into leaverequest(email,date) values( '$t','$date') ";
    $result=mysqli_query($conn, $query);
    if($result){
        $nm="request sent";
         // echo "request sent";
    }
}
}
        }
    }
   
}
else{
    $nm="already applied for two leaves in this month";

   // echo "already applied for two leaves in this month";
}
}


?>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"> </script>

<script>
$(document).ready(function(){

    $("#date").datepicker({dateFormat:'yy-mm-dd'});
   $("#date").datepicker();
 
});

</script>

<style>
 
body {
padding: 10px;
font-family:Arial;

}

.ui-datepicker {
background-color: #fff;
}

.ui-datepicker-header {
    margin:5px;
background-color: #616eff;
}

.ui-datepicker-title {
color: black;

}

.ui-widget-content .ui-state-default {
border: 0;
text-align: center;
}

a{
    padding-right:50px;
   

}
.header{
    width:110vw;
    background-color:blue;
   
}

.name{
 
    padding:20px;

}
.name a{
    color:white;
    text-decoration:none;
    
}
</style>
   
 
</head>

<body>
<?php
if(!empty($_SESSION['mail']))
{
    ?>

        
  <div>
        
        <div class="row adefault header" >
              <div class="name">  
             <a href="employee.php" type="submit" name="submit" >HOME</a>
             <a href="empholidays.php" type="submit" name="submit" >Public holidays</a>
             <a href="request2.php" type="submit" name="submit" >Request Leave</a>
             <a href="statuscheck2.php" type="submit" name="submit" >Leave Status</a>
             <a href="cancelleave.php" type="submit" name="submit" >Cancel Leave</a>
              <a href="manualassigned.php" type="submit" name="submit" >Manual Leaves</a>
              <a href="logout.php" type="submit" name="submit" >Log-out</a>
             </div>
               </div>
<br>
<form method="post" action="" >
<h2 style="text-align:center; background-color:lightblue; width:15%; margin:auto;">Apply Leave</h2>

<div style="justify-content:center; margin:auto; text-align:center;"><br>
DATE<br><input type="text" name="date" id="date" autocomplete="off"><br><br>


<br><input type="submit" name="submit" id="date" value="submit" autocomplete="off" class="btn btn-success"><br><br>
</div>
</form>

</div>
<?php echo $nm;
?>
</body>
<?php }
else
{
    header("Location:signin.php");
} ?>
</html>