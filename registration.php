<!DOCTYPE html>
<html>
  <head>
  <title>bootstrap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" type="text/css"></script>
    <link rel="stylesheet" type="text/css" href="global.css">
    
    <style type="text/css">

h3{
      color:white;
    
    }
   
   /* #ui{
         border-radius: 5px;
        color: white;
        background-color: #ab6a03;
        padding: 10px;
        opacity: 0.9;
        box-shadow: 2px 2px 2px 2px #000;
        animation-delay: 2s;
        animation-duration: 2s;
        
    }*/
    h3,b{
      color:white;
    
    }

/*#contact_showcase{
  margin-top: 70px;
}*/
/*#email, #name,#password ,#gender{
    background-color:blue;
}

}
#name text{
    color:#fff;
}*/
body{
          background-color: hsl(0, 40%, 50%);
         
         
          padding-top: 70px;
        }
        h4{
   color:white;
   
    }
</style>
<?php 
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $username = $_POST["name"];
  $email= $_POST["email"];
  $password = $_POST["password"];
  $gender = $_POST["gender"];
  $mobile = $_POST["mobile"];
  if( !empty($username)&&!empty($email)&&!empty($password)&&!empty($gender)&&!empty($mobile)){
      $query = "INSERT into  registration(name,email,password,gender,mobile) 
      values( '$username','$email','$password','$gender','$mobile')";
      $con=mysqli_query($conn,$query);
      header("Location:signin.php");
  }

 }

if(isset($_POST['signin']))
{
  header("Location:signin.php");
}

?>
</head>
<body>
<div class="container logincontainer "  >
 <div class="row">
 <div class="col-md-4"></div>
<div class="col-md-8">
<div style="width:35%;" >


<div><h4 style="padding-top:50px;">REGISTRATION FORM</h4> <br></div>
<form class="form-container" action="" method="post">

<div>
 <b> Name</b><br> <input type="text" name="name" id="name" ><br>
</div>

 <div>
  <b>Email</b><br><input type="email" name="email" id="email" ></div>
 <div>
 <b>Password</b><br><input type="password" name="password" id="password" ><br></div>
  <div><b>Gender</b> <br><input type="gender" name="gender" id="gender"><br></div>
  <div><b>Mobile No.</b> <br><input type="text" name="mobile" id="mobile"><br></div><br>
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="submit" name="signin" class="btn btn-primary">Login</button>
</div>
</form>
</div>

<div class="col-md-4"></div>

</div>
</div>




</body>
  </html>