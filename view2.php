

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

<?php
error_reporting(0);
session_start();
include('db.php');
if (isset($_POST['Insert'])) {
   
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $gender = $_POST["gender"];
  $mobile= $_POST["mobile"];
  $status= $_POST["status"];
  if( !empty($password)){
      $query = "INSERT into employee(username,email,password ,gender ,mobile,status) values('$username','$email','$password' ,'$gender','$mobile','$status')";
      mysqli_query($conn , $query);  
header("Location:view2.php");
  }
  else{
      $error="enter all details";
  }
}



$st=1;
if($st){
    $sel_query="Select * from employee where status='$st'"; 
     
$result = mysqli_query($conn, $sel_query); 
}
$t=0;
{
$sel="Select * from employee where status='$t'"; 

$res = mysqli_query($conn, $sel); 
}

//echo mysqli_num_rows($result);




?>

<title>View Records</title>
<style>
table,td,th{
background-color:lightblue;
padding: 6px;
border:3px solid green;
width:50%;
margin:auto;
text-align:center;
}

a{
    padding-right:50px;
   

}
.header{
    width:110vw;
    background-color:blue;
   
}

.name{
 
    padding:20px;

}
.name a{
    color:white;
    text-decoration:none;
}


</style>




</head>
<body >

<div>
        
        <div class="row adefault header">
              <div class="name">  
              <a href="links.php" type="submit" name="submit" >Home</a>
             <a href="view2.php" type="submit" name="submit" >Employee Details</a>
             <a href="holidaylist.php" type="submit" name="submit" >Public Holidays</a>
             <a href="requestprocess.php" type="submit" name="submit" >Leave Requests</a>
             <a href="manualleaves.php" type="submit" name="submit" >Manual leaves</a>
              <a href="logout.php" type="submit" name="submit" >Log-out</a>
             </div>
               </div>
<br>
<!--view-->
<div style="float:right; width:200px;">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
Insert
</button>
</div>
<br>
<b><h3  style="text-align:center; width:30%; margin:auto; background-color:lightblue;"> ACTIVE EMPLOYEE DETAILS</h3></b>

<table width="50%" border="1" style="border-collapse:collapse;">
<tr>
<h3><th>ID</th><h3>
<h3><th>USERNAME</th></h3>

<h3><th>EMAIL</th></h3>
<h3><th>PASSWORD</th></h3>
<h3><th>GENDER</th></h3>
<h3><th>MOBILE</th></h3>
<h3><th>status</th></h3>
<h3><th>EDIT</th></h3>
<h3><th>DELETE</th></h3>
</tr>

<?php
while($rows=mysqli_fetch_assoc($result) ){​​​​​​​​
    
?>
<tr  id='<?php echo 'replace_'.$rows["id"]; ?>'>

<td><?php echo $rows["id"] ?></td>

<td><?php echo $rows["username"] ?></td>
<td><?php echo $rows["email"] ?></td>


<td><?php echo $rows["password"] ?></td>
<td><?php echo $rows["gender"] ?></td>
<td><?php echo $rows["mobile"] ?></td>
<td><?php echo $rows["status"] ?></td>


<td><button type="button"  id=<?php echo $rows["id"]; ?> class="btn_edit btn-warning"  data-toggle="modal" data-toggle="modal" data-target="#Modalp">update</a></button><br></td>


<h4><td><a href="employeedelete.php?id=<?php echo $rows["id"]; ?>"><input type="submit" value="delete" class="btn btn-danger"></a></td></h4>


</tr>
<?php } ?>
<br>
</table>





<br><br>

<b><h3 style="text-align:center; width:30%; margin:auto; background-color:lightblue;"> INACTIVE EMPLOYEE DETAILS</h3></b>
<table width="50%" border="1" style="border-collapse:collapse;" >
<tr>
<h3><th>ID</th><h3>
<h3><th>USERNAME</th></h3>

<h3><th>EMAIL</th></h3>
<h3><th>PASSWORD</th></h3>
<h3><th>GENDER</th></h3>
<h3><th>MOBILE</th></h3>
<h3><th>status</th></h3>
<h3><th>EDIT</th></h3>
<h3><th>DELETE</th></h3>
</tr>

<?php

while($rows=mysqli_fetch_assoc($res) ){​​​​​​​​
    
?>
<tbody id="bidders">
<tr  id="<?php echo 'rep_'.$rows["id"]; ?>" >
<td ><?php echo $rows["id"] ?></td>
<td ><?php echo $rows["username"] ?></td>
<td><?php echo $rows["email"] ?></td>


<td><?php echo $rows["password"] ?></td>
<td><?php echo $rows["gender"] ?></td>
<td><?php echo $rows["mobile"] ?></td>
<td><?php echo $rows["status"] ?></td>
<td><button type="button"  id=<?php echo $rows["id"]; ?> class="btn_edit btn-warning"  data-toggle="modal" data-toggle="modal" data-target="#Modalp" >update</button><br></td>

<h4><td><a href="employeedelete.php?id=<?php echo $rows["id"]; ?>"><input type="submit" value="delete" class="btn btn-danger"></a></td></h4>


</tr>
</tbody>
<?php

}
?>
<br>

</table>


<!-- Modal -->
<!-- Button trigger modal -->
<!--edit-->


<div class="modal fade" id="Modalp" tabihrefndex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
     
        
      </div>
      <div class="modal-body">
      <form method="post"  class="container-fluid">
  <div class="form-group">
<div>
<b>ID</b><br><input type="text" name="id" id="id_number"><br><br>
<b>username</b><br><input type="text" id="edit_username" name="username" ><br><br>
<b>email</b><br><input type="text" name="email" id="edit_email"><br><br>
<b>password</b><br><input type="text" name="password" id="edit_password"><br><br>
<b>gender</b><br><input type="text" name="gender"  id="edit_gender"><br><br>
<b>mobile No</b><br><input type="text" name="mobile" id="edit_mobile"><br><br>
status<select name="status" id="edit_status">
<option>0</option>
<option>1</option>
</select>
<br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="update_data" >Update</button>
     </div>
</form>
</div>
      </div>
    </div>
  </div>
</div>


<!-- Button trigger modal -->



<!--inser-->
<!-- Button trigger modal -->


<!-- Modal -->

<!--insert-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 style="text-align: center;">Add Employee</h5>
      <form method="post" class="container-fluid">
  <div class="form-group">
    <label>username</label>
    <input type="text" class="form-control" name="username">

  </div>
  <div class="form-group">
    <label>email</label>
    <input type="email" class="form-control" name="email">
  </div>
  
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password">
    
  </div>
  
  <div class="form-group">
    <label>gender</label>
    <input type="text" class="form-control" name="gender">
    
  </div>
  <div class="form-group">
    <label>mobile</label>
    <input type="text" class="form-control" name="mobile">
    
  </div>
  <div class="form-group">
    <label>status</label>
    <select name="status" value="status">
    <option>0</option>
    <option>1</option>
    </select>
  </div>
      <button type="submit" class="btn btn-primary" name="Insert" value="Insert" >Insert</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<br>
<br>

</form>

 <script>
$(document).ready(function(){
  $(".btn_edit").click(function(){
    var emp_id=$(this).attr('id');
   
   $.ajax({
     url:'ajax_calls.php',
     type:'post',
     dataType:'json',
     data:{'action':'edit_grp_name', "id":emp_id},
     
     success:function(respo){
       //console.log(resp.id);
      $("#id_number").val(respo.id);
      $("#edit_username").val(respo.username);
      
      $("#edit_email").val(respo.email);
      $("#edit_password").val(respo.password);
  
     
     $("#edit_gender").val(respo.gender);
      $("#edit_mobile").val(respo.mobile);
      $("#edit_status").val(respo.status);
     var respo=respo.status;
console.log(respo.status);
        }                  
         });

  });
 
});
$(document).ready(function(){
  $(".update_data").click(function(){
    var respo= respo.status;
   // console.log(respo);
    var $row = $(this).closest('tr')
    $.ajax({
      url:"ajax_calls.php",
      type:'post',
     dataType:'json',
      data:{'action':'save_grp_data',
         "id": $('#id_number').val(),
				"username": $('#edit_username').val(),
				"email": $('#edit_email').val(),
        "password": $('#edit_password').val(),
        "gender": $('#edit_gender').val(),
				"mobile": $('#edit_mobile').val(),
		  	"status": $('#edit_status').val(),
      },
        success:function(resp){
         // var returnstatus=resp.status;
          var html = '<tr>';
          html+='<td>'+resp.id+'</td>'
          html+='<td>' +resp.username +'</td>';
         html+= '<td>' +resp.email+'</td>';
         html+= '<td>' +resp.password+'</td>';
         html+=  '<td>' +resp.gender+'</td>';
         html+= '<td>' +resp.mobile+'</td>';
         html+= '<td>' +resp.status+'</td>';
         html+='<td><button type="button"  id="<?php echo $rows["id"]; ?>" class="btn_edit"  data-toggle="modal" data-toggle="modal" data-target="#Modalp" >update</button></td>';
         html+="<td><a  href='employeedelete.php?id=<?php echo $rows["id"]; ?>'>Delete</a></td>";
         html+="</tr>"
    
        // console.log(respo);
         //console.log(resp.status);
       // echo  '$resp.status';
       if(resp.status==1)
       {
        if((resp.status==respo))
        {
       
         $('#replace_'+resp.id ).replaceWith(html);
        }
       
        else{
     
          $('#bidders').append(html); 
         // console.log('.new');
          $('#replace_'+resp.id ).hide();
         

        
       }
       }
        
       
        if(resp.status==0)
       {
        if((resp.status==respo))
        {
        
         $('#rep_'+resp.id ).replaceWith(html);
        }
       }




        }
    });
  });
});

</script> 

</body>

</html>


