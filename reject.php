<?php
include('db.php');
session_start();
if(!empty($_SESSION['admin'])){
$id=$_REQUEST['id'];
//echo $id;
$query="UPDATE leaverequest SET status='leave request rejected' WHERE id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    echo "leave request rejected";

    header("Location:requestprocess.php");
}
}

?>


