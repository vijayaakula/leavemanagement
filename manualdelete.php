
<?php
include('db.php');
$id=$_REQUEST['id'];
//echo $id;
$query="DELETE FROM manualleaves WHERE id='$id'";
$result=mysqli_query($conn,$query);
header("Location: manualleaves.php"); 
if($result)
{
    echo "record deleted succesfully";

}
else
{
    echo "failed";
}
?>


