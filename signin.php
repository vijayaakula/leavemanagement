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
    
    
    <script language="javascript" type="text/javascript">
window.history.forward();

</script>
    <style type="text/css">


    /*#ui{
         border-radius: 5px;
        color: white;
        background-color: #ab6a03;
        padding: 10px;
        opacity: 0.9;
        box-shadow: 2px 2px 2px 2px #000;
        animation-delay: 2s;
        animation-duration: 2s;
        
    }
    h3{
      color:white;
    margin:auto; 
    }

#contact_showcase{
  margin-top: 70px;
}
/*#email, #name,#password ,#gender{
    background-color:blue;
}

}
#name text{
    color:#fff;
}*/
body{
          background-color:hsl(0,50%,32%);
         
         
          padding-top: 70px;
        }
 h3,b{
   color:white;
    margin:auto; 
    }
</style>
<?php 
include('db.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
 
  $email= $_POST["email"];
  $password = $_POST["password"];
  if(!empty($_POST['email']) && !empty($_POST['password'])){
    $query="SELECT * from registration where email= '$email' and password='$password'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_fetch_assoc($result);
   
    if($count>0){
   
        $_SESSION['status']=1;
 
    $_SESSION['admin']=$count['name'];
    $_SESSION['email']=$_POST['email'];

    header("Location:links.php");
    
    }
else{
    $st=1;
    $query="SELECT * FROM  employee where  status='$st' and email= '$email' and password='$password'";
   $result=mysqli_query($conn,$query);
    $count=mysqli_fetch_assoc($result);
   if($count>0)
    {
        $_SESSION['username']=$count['username'];
        $_SESSION['mail']=$_POST['email'];
    header("Location:employee.php");
    }else{
        echo "INVALID USER DETAILS";
    }

   } 
     
    }

 }



?>
</head>
<body>
<div class="container logincontainer "  >
 <div class="row">
  

<div class="col-lg-4"></div>
<div class="col-lg-8">
<div style="width:35%;" text-align="center;">
<div><h3 style="padding-top:100px;" style="text-align:center;">LOGIN HERE<?php echo " ","!" ?></h3> <br></div>
<form class="form-container" action="" method="post">


 <div>
 <b> Email</b><br><input type="email" name="email" id="email" ></div>
 <div>
 <b>Password</b><br><input type="password" name="password" id="password" ><br></div>
  <br>
  <button type="submit" class="btn btn-primary" style="width:100px;">Submit</button>
 
</div>
</form>
</div>
<div class="col-lg-4"></div>

</div>
</div>


</body>
  </html>