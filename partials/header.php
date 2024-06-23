<?php 
    session_start();
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">RAKSForum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Top Categories
                </a>
                <div class="dropdown-menu">';
                $query="SELECT * FROM `category`";
                $result=mysqli_query($conn,$query);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        echo '<a class="dropdown-item" href="/forum/thread_list.php?cid='.$row["category_id"].'">'.$row["category_name"].'</a>';
                    }
                }
                echo '</div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>
        <div class="row mx-2">';
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
            echo '<form class="form-inline my-2 my-lg-0" action="search.php"  method="get">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                <p class="text-light my-0 mx-2">'. $_SESSION['user'] .' </p>
            </form>
            <a href="partials\logout.php" class="btn btn-outline-success ml-2 "  >Logout</a>';
        }
        else {
            echo '<form class="form-inline my-2 my-lg-0" action="search.php" method="get">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <button class="btn btn-outline-success ml-2 " type="submit" data-toggle="modal" data-target="#loginmodal">Login</button>
            <button class="btn btn-outline-success mx-2 " type="submit" data-toggle="modal" data-target="#signupModal">Signup</button>';
        }
        echo '</div>
    </div>
</nav>';
 include 'login_modal.php';
 include 'signup_modal.php';
 if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=='true'){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <h4 class="alert-heading">New User added successfully</h4>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
  </div>';
 }
 if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=='false'){

    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
             <h4 class="alert-heading">New User not added </h4> due to '.$_GET["error"].'
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
           </div>';
 }
//  $(function() {
//     /* Or you can invoke the 'show' method programmatically */
//     //$(".modal").modal("show");
//   });
?>