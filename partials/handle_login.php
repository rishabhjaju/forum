<?php
  $showError="false";
  $showAlert=false;
  if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connection.php';
    $user_email=$_POST['loginEmail'];
    $user_pass=$_POST['loginPassword'];
    $query="select * from users where user_email='$user_email'";
    $result=mysqli_query($conn,$query);
    $num=mysqli_num_rows($result);
    if($num==1){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($user_pass, $row['user_pass'])){
            session_start();
            $_SESSION['user']=$user_email;
            $_SESSION['loggedin']=true;
            $_SESSION['id']=$row['sno'];
            header("Location: /forum/index.php?loginsuccess=true");
        }
        else{
            $showError="Passwords do not match.";
            header("Location: /forum/index.php?loginsuccess=false&error=$showError");
        }
    }
    else{
        $showError="User does not exist.";
        header("Location: /forum/index.php?loginsuccess=false&error=$showError");
    }
    
    
  }
?>