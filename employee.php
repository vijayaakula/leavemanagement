<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php 
session_start();
error_reporting(0);
include("db.php");


?>
<style>
a{
    padding-right:50px;
   

}
.header{
    width:100vw;
    background-color:blue;
  
}

.name{
 
    padding:20px;
  
}
.name a{
    color:white;
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
<h1 style="text-align:center; margin:auto; padding-top:100px;">welcome <?php echo $_SESSION['username'],"","!"; ?></h1>


</body>
<?php }
else
{
    header("Location:signin.php");
} ?>
</html>
