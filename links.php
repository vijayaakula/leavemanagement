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
    margin:0;
  
}

.name{
 
    padding:20px;
  
}
.name a{
    color:white;
}

form{
    float:right;
    
    
}
</style>
</head>

<body>
<?php 
if(!empty($_SESSION['admin']))
{
    ?>

        <div>
        
  <div class="row adefault header" >
        <div class="name">  
       <a href="links.php" type="submit" name="submit" >HOME</a>
       <a href="view2.php" type="submit" name="submit" >Employee Details</a>
       <a href="holidaylist.php" type="submit" name="submit" >Public holidays</a>
       <a href="requestprocess.php" type="submit" name="submit" >Leave Requests</a>
       <a href="manualleaves.php" type="submit" name="submit" >Manual leaves </a>
       <a href="logout.php" type="submit" name="submit" >logout</a>
     </div>
         </div>
<h1 style="text-align:center; padding-top:100px;">Welcome <?php echo $_SESSION['admin'],"","!"; ?></h1>
<?php 
} 
else{
    header("Location:signin.php");
} 
?>

</body>
</html>
