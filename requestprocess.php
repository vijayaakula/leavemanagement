
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
error_reporting(0);
session_start();
include('db.php');

?>
<meta charset="utf-8">
<title>View Records</title>
<style>
/* table,td,th,tr{
background-color:lightblue;
padding: 10px;
border:3px solid green;
margin:auto;
text-align:center;
} */

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
    text-decoration:none;
}


</style>

<?php
$que="SELECT * from leaverequest ";
$res=mysqli_query($conn,$que);
  if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    header("Location:links.php");
}
?>

</head>
<body>
<?php
if(!empty($_SESSION['admin']))
{
    ?>
<div>
        
        <div class="row adefault header">
              <div class="name">  
              <a href="links.php" type="submit" name="submit" >Home</a>
             <a href="view2.php" type="submit" name="submit" >Employee Details</a>
             <a href="holidaylist.php" type="submit" name="submit" >Public Holidays</a>
             <a href="requestprocess.php" type="submit" name="submit" >Leave Requests</a>
             <a href="manualleaves.php" type="submit" name="submit" >Manual leaves</a>
              <a href="logout.php" type="submit" name="submit" >Log-out</a>
             </div>
               </div>
<br><br>
               <b><h2 style="text-align:center; width:20%; margin:auto; background-color:lightblue;">LEAVE REQUESTS</h2></b>
               
               <div class="container">          
     <div class="row">          
     <div class="col-12">          
<table class="table table-bordered" >
<tr>
<h3><th>ID</th><h3>


<h3><th>EMAIL</th></h3>
<h3><th>accept</th></h3>
<h3><th>reject</th></h3>
<h3><th>status</th></h3>

</tr>
<tr>
<?php
while($rows=mysqli_fetch_assoc($res) ){​​​​​​​​
    
?>

<tr>
<td><?php echo $rows["id"] ?></td>

<td><?php echo $rows["email"] ?></td>




<h4><td><a href="accept.php?id=<?php echo $rows['id']; ?>"><button type="button" class="btn btn-success">accept</button></a></td></h4>

<h4><td><a href="reject.php?id=<?php echo $rows["id"]; ?>"><input type="submit" value="reject" class="btn btn-danger"></a></td></h4>
<td><?php echo $rows["status"] ?></td>

</tr>
<?php } ?>
</table>
</div>
</div>
</div>
</body>
<?php } 
else{
    header("Location:signin.php");
}
?>
</html>
