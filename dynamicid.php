<!DOCTYPE html>
<html>
<head>
<?php
session_start();

include("db.php");

$sel="SELECT * from employee";
$query=mysqli_query($conn,$sel);
?>
</head>

<body>
<?php

    while($row=mysqli_fetch_array($query))
 {
 
 $id=$row['id'];
  $username = $row['username']; 
  ?>   
 <script>
 function myFunction() {
  var popup = document.getElementById("Modalp");
  popup.classList.toggle("hide");
  }</script> 

       <td align="center"> <div class="popup" onclick="myFunction()">
       <a href="#Modalp<?php echo $id; ?>"> Click me!</a>

  <span class="popuptext"  id="Modalp"> </span>
  <form>
  <input type="text" value="<?php echo $username ; ?>" >
  </div></td>

    </tr>

  <?php
 }
 ?>
 </body>
 </html>