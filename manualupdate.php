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
include('db.php');
error_reporting(0);
session_start();
?>
<?php
$id=$_GET['id'];
$res=mysqli_query($conn,"SELECT * FROM manualleaves where id=$id");
while($arr=mysqli_fetch_array($res))
{
    $email=$arr['email'];
    $date=$arr['date'];
   
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email=$_POST['email'];
    $date=$_POST['date'];
    $query="UPDATE manualleaves SET email='$email' , date='$date' where id='$id' ";
    $result=mysqli_query($conn, $query);
    if($result)
    {
        //<script>alert("updated");</script>
        header("Location:manualleaves.php");
    }
    else
    {
        echo "failed";
    }
}
?>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"> </script>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness"></link>

<script>
$(document).ready(function(){
    $("#date").datepicker({dateFormat:'yy-mm-dd'});
    $("#date").datepicker();
  
});
</script>

<style>
 <style>
body {
padding: 5px;
font-family:Arial;
}

.ui-datepicker {
background-color: #fff;
}

.ui-datepicker-header {
background-color: #616eff;
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


<form method="post"  class="container-fluid">
  <div class="form-group">


<b>ID</b><br><input type="text" name="id" value="<?php echo $id; ?>"><br><br>
<b>email</b><br><input type="text" name="email" value="<?php echo $email; ?>"><br><br>

<b>date</b><br><input type="text" autocomplete="off" id="date"name="date" value="<?php echo $date; ?>"><br><br><br>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
     </div>


</div>
</form>

</body>
</html>