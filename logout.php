<!DOCTYPE html>
<html>
<head>
<?php
session_start();
include('db.php');
session_destroy();
header("Location:signin.php");


?>
</head>

</html>