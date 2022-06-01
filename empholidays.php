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
 table,td,tr,th{
background-color:lightblue;
padding: 5px;
border:3px solid green;
margin:auto;
text-align:center;
justify-content:center;
}

.head{
    width:110vw;
    background-color:blue;
  margin:0;
}

.cls{
  margin: 0;
    width: 100vw;
}

.cls a{
    color:white;
    padding:20px;
    margin-left:0;
}


</style>


</head>
<body>
<?php
if(!empty($_SESSION['mail']))
{
    ?>
<div class="row adefault head" >
              <div class="cls">  
             <a href="employee.php" type="submit" name="submit" >HOME</a>
             <a href="empholidays.php" type="submit" name="submit" >Public holidays</a>
             <a href="request2.php" type="submit" name="submit" >Request Leave</a>
             <a href="statuscheck2.php" type="submit" name="submit" >Leave Status</a>
             <a href="cancelleave.php" type="submit" name="submit" >Cancel Leave Request</a>
              <a href="manualassigned.php" type="submit" name="submit" >Manual Leaves</a>
              <a href="logout.php" type="submit" name="submit" >Log-out</a>
             </div>
               </div>
               
<br>
<b><h3 style="text-align:center; width:15%; margin:auto; background-color:lightblue;">HOLIDAYS LIST</h3></b>
<br><br>
<table  width="20%"  border="1" style="border-collapse:collapse;" >
<tr>
<td><b>ID</b></td>
<td><b>DATE</b></td>

</tr>
<?php
$sel="SELECT * from holidayslist";
$query=mysqli_query($conn,$sel);
while($rows=mysqli_fetch_assoc($query)){
?>
<tr>
<td><?php echo $rows['id']; ?></td>

<td><?php echo $rows['date']; ?></td>

</tr>
<?php
}


?>

</table>

<br><br>

</body>
<?php }
else
{
    header("Location:signin.php");
} ?>
</html>