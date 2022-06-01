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
    $("#date").datepicker( );
  /*$('#date').click(function(){
      $('#date').datepicker('show');
    });*/
});


</script>
<?php
include('db.php');
session_start();
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$id = $_POST["id"];
    $date= $_POST["date"];
  
    if( !empty($date)){
        $query = "insert into holidayslist(date) values('$date')";
        mysqli_query($conn , $query);  
 header("Location:holidaylist.php");
    }
    else{
        $error="enter date";
    }
}


?>
 <style> 
 table,td,tr{
background-color:lightblue;
padding: 3px;
border:2px solid green;
margin:auto;
text-align:center;
}

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
.ui-datepicker {
background-color: #fff;

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
        
        <div class="row adefault header">
              <div class="name">  
              <a href="links.php" type="submit" name="submit" >Home</a>
             <a href="view2.php" type="submit" name="submit" >Employee Details</a>
             <a href="holidaylist.php" type="submit" name="submit" >Public Holidays</a>
             <a href="requestprocess.php" type="submit" name="submit" >Leave Requests</a>
             <a href="manualleaves.php" type="submit" name="submit" >Manual leaves</a>
             <a href="logout.php" type="submit" name="submit" >logout</a>
             </div>
               </div>

    <br>
<div style="float:right; width:200px;">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Backdrop">Insert</button><br></div>
    <br><br>
<b><h3 style="text-align:center; width:20%; margin:auto; background-color:lightblue;">HOLIDAYS LIST</h3></b>

<br>
<div>
<table  width="40%"  border="1" style="border-collapse:collapse;"  >
<tr>
<td><b>ID</b></td>
<td><b>DATE ('Y-M-D')</b></td>
<td><b>EDIT</b></td>
<td><b>DELETE</b></td>
</tr>
<?php
$sel="SELECT * from holidayslist";
$query=mysqli_query($conn,$sel);
while($rows=mysqli_fetch_assoc($query)){
?>
<tr>
<td><?php echo $rows['id']; ?></td>

<td><?php echo $rows['date']; ?></td>
<td><a   href="holidayedit.php ?id=<?php echo $rows["id"]; ?>"><input type="submit"  class="btn btn-warning" value="edit" name="edit"></td>
<td><a href="holidaydelete.php ?id=<?php echo $rows["id"]; ?>"><input type="submit"  class="btn btn-danger" value="delete " name="delete"></td>
</tr>
<?php
}
?>
</table>
</div>



<!--insert-->

<div class="modal fade" id="Backdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 style="text-align: center;">Add New Date</h5>
      <form method="post" class="container-fluid">


  
  <div class="form-group">
    <label>Date</label>
    <input type="text" class="form-control" autocomplete="off" name="date" id="date">
    
  </div>

      <button type="submit" class="btn btn-primary" name="submit" value="Submit" >Submit</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<br>
<br>

</form>

</body>
<?php } 

else{
    header("Location:signin.php");
}
?>
</html>