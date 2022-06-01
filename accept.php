<?php
session_start();
include('db.php');
if(!empty($_SESSION['admin']))
{
$id=$_REQUEST['id'];

$query="UPDATE leaverequest SET status='leave request accepted' where id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    echo "leave request accepted";
    header("Location:requestprocess.php");
}
}
?>