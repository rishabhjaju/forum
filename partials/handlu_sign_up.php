<?php

  $showError="false";
  $showAlert=false;
  if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connection.php';
    $user_name=$_POST['signupname'];
    $user_email=$_POST['signupEmail'];
    $user_pass=$_POST['signupPassword'];
    $user_cpass=$_POST['signupcPassword'];
    $query="select * from users where user_email='$user_email'";
    $result=mysqli_query($conn,$query);
    $num=mysqli_num_rows($result);
    if($num==1){
        $showError="User already exists.";
      /*echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
             <h4 class="alert-heading">User already exists</h4>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
           </div>';*/
    }
    else{
      if($user_pass==$user_cpass){
        $hash=password_hash($user_pass, PASSWORD_DEFAULT);
        $query="INSERT INTO `users` (`user_name`,`user_email`, `user_pass`) VALUES ('$user_name','$user_email', '$hash')";
        $result=mysqli_query($conn,$query);
        if($result){
            $showAlert=true;
            header("Location: /forum/index.php?signupsuccess=true");
            exit();
        }
        else{
            $showError="Password do not match.";
        }
      }
      
    }
    header("Location: /forum/index.php?signupsuccess=false&error=$showError");
  }
?>