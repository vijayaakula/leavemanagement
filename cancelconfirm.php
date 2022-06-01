<?php
include('db.php');
session_start();
//$id=$_REQUEST['id'];
//echo $id;
$id=$_REQUEST['id'];
//$st=$_SESSION['username'];

$query="DELETE FROM leaverequest WHERE id='$id'";
$result=mysqli_query($conn,$query);
//header("Location: view2.php"); 
if($result)
{
    echo "Leave request cancelled";
header("Location:cancelleave.php");
}
else
{
    echo "failed";
}

?>


