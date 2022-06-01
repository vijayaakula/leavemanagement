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

?>
<style>

table,td,th{
    margin:auto;
background-color:lightblue;
padding: 6px;
border:3px solid green;
width:30%;
text-align:center;
}
div{
    text-align:center;
    margin:auto;
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
  margin:0;
}
.name a{
    color:white;
}
</style>
</head>
<body>


  <div>
        
        <div class="row adefault header" >
              <div class="name">  
             <a href="employee.php" type="submit" name="submit" >HOME</a>
             <a href="empholidays.php" type="submit" name="submit" >Public holidays</a>
             <a href="request2.php" type="submit" name="submit" >Request Leave</a>
             <a href="statuscheck2.php" type="submit" name="submit" >Leave Status</a>
             <a href="cancelleave.php" type="submit" name="submit" >Cancel Leave</a>
              <a href="manualassigned.php" type="submit" name="submit" >Manual Leaves</a>
              <a href="signin.php" type="submit" name="submit" >Log-out</a>
             </div>
               </div>
               <?php

$st=$_SESSION['mail'];
$sel="select * from leaverequest where email='$st'";
$que=mysqli_query($conn,$sel); 
if(mysqli_fetch_assoc($que)>0){
?>
<br>
<h2 style="text-align:center; background-color:lightblue; margin:auto; width:15%;">Leave  Status</h2>
<br>
<table border="1" style="border-collapse:collapse;">
<tr>
<th>id</th>

<th>date</th>
<th>status</th>
</tr>
<?php

$sel="select * from leaverequest where email='$st'";
$que=mysqli_query($conn,$sel);


while($rows=mysqli_fetch_assoc($que)){
    
    
?>
<tr>
<td><?php echo $rows['id'] ?></td>

<td><?php echo $rows['date']?></td>

<td><?php echo $rows['status']?></td>
</tr>
<?php
 }


?>
</table>

<?php }

else{
    echo "you haven't applied for any leaves yet";
}
?>
</body>
</head>
</html>