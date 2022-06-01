<!DOCTYPE html>
<html>
<head>
<?php
include('db.php');
session_start();
?>
<?php
$id=$_GET['id'];
$res=mysqli_query($conn, "SELECT * FROM holidayslist where id=$id");
while($arr=mysqli_fetch_array($res))
{
    $date=$arr['date'];
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $date=$_POST['date'];
  
    $query="UPDATE holidayslist SET date='$date' where id='$id'";
    $result=mysqli_query($conn, $query);
    if($result)
    {
        header("Location:holidaylist.php");
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
 
 div{
  margin:auto;
  text-align:center;
}
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
<?php
if(!empty($_SESSION['admin']))
{
    ?>
<div>
<form action="" method="post">
<b> <h2>Enter New Date</h2></b>
<br>

<b>ID</b><br>
<input type="text" name="id" value="<?php echo $id; ?>"><br><br>

<b>DATE</b><br>
<input type="text" id="date" name="date" value="<?php echo $date; ?>" ><br><br><br>
<input type="submit" name="submit">
</form>
</div>
<?php
}

?>
</body>

</html>