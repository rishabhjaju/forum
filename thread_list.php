<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Discussion Forum</title>
    <style>
    #ques {
        min-height: 430px;
    }
    </style>
</head>

<body>
    <?php 
        include 'partials/connection.php';
        require 'partials/header.php';
        

        $id=$_GET['cid'];
        $query="Select * From category where category_id='$id'";
        $result=mysqli_query($conn, $query);
        if($result){
          while($row=mysqli_fetch_assoc($result)){
            $cat_name=$row['category_name'];
            $cat_desc=$row['category_desc'];
          }
        }
        else{
          echo "Query not executed due to ".mysqli_error($conn);
        }
    ?>
    <?php
      $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
          $th_title=$_POST['p_title'];
          $th_desc=$_POST['p_desc'];
          $sno=$_POST['sno'];
          $query="INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_user_id`, `thread_cat_id`) VALUES ('$th_title','$th_desc', '$sno', '$id')";
          $result=mysqli_query($conn, $query);
          if($result){
             echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
             <h4 class="alert-heading">Well done!</h4>
             <p> Sucessfully added the problem</p>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

           </div>';
          }
          else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Not done!</h4>
            <p>Problem occured while adding : '.mysqli_error($conn).'</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

          </div>';
          }
        }
    ?>
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4 my-3"><?php echo "$cat_name";?> Forum</h1>
            <p class="lead"><?php echo "$cat_desc";?></p>
            <hr class="my-3">
            <ul>
                <li>This is a peer to peer forum for sharing knowledge with each other.</li>
                <li>Be respectful, even when there's a disagreement.</li>
                <li>No foul language or discriminatory comments.</li>
                <li>No spam or self-promotion.</li>
                <li>No links to external websites or companies.</li>
                <li>No NSFW (not safe for work) content.</li>
            </ul>

            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
    <?php
    
      echo '<div class="container">
    <h1 class="mt-0 mb-4">Start a Discussion!!!</h1>
        <form action="'.$_SERVER["REQUEST_URI"] .'" method="post" >
            <div class="form-group">
                <label for="p_title">Problem Title</label>
                <input type="text" class="form-control" id="p_title" name="p_title" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Make sure to have a short and crisp title</small>
            </div>
            <div class="form-group">
                <label for="p_desc">Desciption</label>
                <textarea class="form-control" id="p_desc" name="p_desc" rows="3"></textarea>
                
            </div>';
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
              echo '<input type="hidden" name="sno" value="'.$_SESSION["id"].'">
              <button type="submit" class="btn btn-success">Submit</button>';
            }
            else{
              echo '<button type="submit" class="btn btn-success" title="Login to start a discussion" disabled>Submit</button>';
            }
        echo '</form>
    </div>';
    ?>
    <div class="container py-3 " id="ques">
        <h1 class="mt-0 mb-5">Browse Questions</h1>
        <?php 
        $id=$_GET['cid'];
        $query="Select * From thread where thread_cat_id=$id";
        $result=mysqli_query($conn, $query);
        $noResult=true;
        if($result){
          while($row=mysqli_fetch_assoc($result)){
            $noResult=false;
            $t_id=$row['thread_id'];
            $t_title=$row['thread_title'];
            $t_desc=$row['thread_desc'];
            echo '<div class="media my-3">
            <img src="images\user_default.jpg" width="50px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0"><a href="thread.php?tid='.$t_id.'" class="text-dark">'.$t_title.'</a></h5>
                <p>'.$t_desc.'</p>
            </div>
        </div>';
          }
          if ($noResult){
            echo '<div class="jumbotron jumbotron-fluid ">
            <div class="container">
              <p class="display-4 ">No Results found</p>
              <p class="lead">Be the first person to ask a question...</p>
            </div>
          </div>';
          }
        }
        else{
          echo "Query not executed due to ".mysqli_error($conn);
        }
    ?>

    </div>







    <?php 
        require 'partials/footer.php';
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>