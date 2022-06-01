
<?php
include('db.php');
session_start();
//$id=$_REQUEST['id'];
//echo $id;
$id=$_REQUEST['id'];
//$st=$_SESSION['username'];
$query="select * FROM leaverequest WHERE id='$id'";
$result=mysqli_query($conn,$query);
//header("Location: view2.php"); 
while($rows=mysqli_fetch_assoc($result))
{
    echo $rows['status'];
}
?>

<td> <a href="check.php?id=<?php echo $rows['id']; ?> "><input type="submit" name="checkstatus" value="check status"></a></td>

