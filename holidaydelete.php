
<?php
include('db.php');
$id=$_REQUEST['id'];
//echo $id;
$query="DELETE FROM holidayslist WHERE id='$id'";
$result=mysqli_query($conn,$query);
header("Location: holidaylist.php"); 
if($result)
{
    echo "record deleted succesfully";

}
else
{
    echo "failed";
}
?>


