<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Discussion Forum</title>
    <style>
      #ques{
        min-height: 430px;
      }
    </style>
</head>

<body>
    <?php 
        include 'partials/connection.php';
        require 'partials/header.php';
       
    ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" id="ques">
    <div class="carousel-item active">
      <img class="d-block w-100 " src="https://source.unsplash.com/3200x900?html,forum" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 " src="https://source.unsplash.com/3200x900?javascript,forum" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 " src="https://source.unsplash.com/3200x900?angular,forum" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <div class="container text-center my-4">
        <h1 >Forum-categories</h1>
        <div class="row">
        <?php 
            $query="Select * from category";
            $result=mysqli_query($conn,$query);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $c_id=$row['category_id'];
                    $c_name=$row['category_name'];
                    $c_desc=$row["category_desc"];
                    $src=$row['category_img'];
                    echo '<div class="col-md-4 my-3">
                    <div class="card" style="width: 18rem; ">
          <img class="card-img-top" src="'.$src.'" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><a href="thread_list.php?cid='.$c_id.'">'.$c_name.'</a></h5>
            <p class="card-text text-justify">'.substr($c_desc,0,105).'....</p>
            <a href="thread_list.php?cid='.$c_id.'" class="btn btn-primary ">View Threads</a>
          </div>
        </div>
                    
                </div>';
                }
            }
            else{
                echo 'Query not executed due to '.mysqli_error($conn);
            }
            ?>
        </div>
    </div>
    <?php 
        require 'partials/footer.php';
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>