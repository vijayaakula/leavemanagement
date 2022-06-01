
<?php
session_start();
include('db.php');
if($_SESSION['admin']){
$id=$_REQUEST['id'];
//echo $id;
$query="DELETE FROM employee WHERE id='$id'";
$result=mysqli_query($conn,$query);
header("Location: view2.php"); 
if($result)
{
    echo "record deleted succesfully";

}
else
{
    echo "failed";
}
}
?>


