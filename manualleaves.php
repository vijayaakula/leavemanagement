<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
  
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"> </script>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness"></link>
<script>
$(document).ready(function(){
    $("#date").datepicker({dateFormat:'yy-mm-dd'});
    $("#date").datepicker();
  
});
</script>
<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST["email"];
    $date = $_POST["date"];
    
    if( !empty($email)){
        $query = "insert into manualleaves(email,date) values('$email','$date')";
        mysqli_query($conn , $query);  
 header("Location:manualleaves.php");
    }
    else{
        $error="enter all details";
    }
}
?>
 <style> 
 table,td,tr{
background-color:lightblue;
padding: 5px;
border:3px solid green;
margin:auto;
text-align:center;
}

a{
    padding-right:50px;
   

}
.header{
    width:110vw;
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

.ui-datepicker {
background-color: white;
}

.ui-datepicker-header {
background-color: #616fff;
}

.ui-datepicker-title {
color: white;
}

.ui-widget-content .ui-state-default {
border: 0px;
text-align: center;
}
</style>



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

<br>
<div style="float:right; width:200px;">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
Insert
</button></div>
<b><h3 style="text-align:center; width:30%; margin:auto; background-color:lightblue;">MANUAL LEAVES ASSIGNMENT</h3></b>


<br>
<div>
<table  width="40%"  border="1" style="border-collapse:collapse;"  >
<tr>
<td><b>ID</b></td>
<td><b>email</b></td>
<td><b>DATE</b></td>
<td><b>update</b></td>
<td><b>delete</b></td>

</tr>
<?php
$sel="SELECT * from manualleaves";
$query=mysqli_query($conn,$sel);
while($rows=mysqli_fetch_assoc($query)){
?>
<tr>
<td><?php echo $rows['id']; ?></td>

<td><?php echo $rows['email']; ?></td>
<td><?php echo $rows['date']; ?></td>
<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#example" id="<?php echo $rows['id']; ?>">edit</button></td>
<td><a href="manualdelete.php ?id=<?php echo $rows["id"]; ?>" ><input type="submit"  value="delete " name="delete" class="btn btn-danger"></td>
</tr>
<?php
}
?>



</table>
</div>
<!--edit-->



<div class="modal fade" id="example" tabihrefndex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
     
        
      </div>
      <div class="modal-body">
      <?php 
        
       include("manualupdate.php");
      ?>
</div>
      </div>
    </div>
  </div>
</div>


<!--insert-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 style="text-align: center;">Add New Leave</h5>
      <form method="post" class="container-fluid">

  <div class="form-group">
    <label>email</label>
    <input type="email" class="form-control" name="email">
  </div>
  
  <div class="form-group"> 
    <label>Date</label>
    <input type="text" class="form-control" autocomplete="off" name="date" id="date">
    
  
  </div>
      <button type="submit" class="btn btn-primary" name="Insert" value="Insert" >Insert</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<br>
<br>

</form>


</body>
<?php }
else{
  header("Location:signin.php");
} ?>
</html>