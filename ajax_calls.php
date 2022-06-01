<?php
include('db.php');
if(isset($_POST['action'])&&($_POST['action']=='edit_grp_name'))
{
    $id_num=$_POST['id'];
    $sel="SELECT *from employee where id=$id_num";
    $que=mysqli_query($conn,$sel);
    $rows=mysqli_fetch_assoc($que);
    $data['id']=$rows['id'];
    $data['username']=$rows['username'];
    $data['email']=$rows['email'];
    $data['password']=$rows['password'];
    $data['gender']=$rows['gender'];
    $data['mobile']=$rows['mobile'];
    $data['status']=$rows['status'];
    
    echo json_encode($data);
   
}
if(isset($_POST['action'])&&($_POST['action']=='save_grp_data'))
{
   $id=$_POST['id'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $mobile=$_POST['mobile'];
    $status=$_POST['status'];
  $arr['id']=$id;
  $arr['username']=$username;
  $arr['email']=$email;
  $arr['password']=$password;
  $arr['gender']=$gender;
  $arr['mobile']=$mobile;
  $arr['status']=$status;

    $query="UPDATE employee SET username='$username' , email='$email' , password='$password',gender='$gender' , mobile='$mobile' ,status='$status' where id='$id' ";
    $result=mysqli_query($conn, $query);
    echo json_encode($arr);
}
?>

