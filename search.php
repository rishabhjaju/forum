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
      #maincontainer{
        min-height: 100vh;
      }
    </style>
</head>

<body>
    <?php 
        include 'partials/connection.php';
        require 'partials/header.php';
        
    ?>
    
    <div class="container" id="maincontainer">
        <h1 class="my-4">Search results for "<b><?php echo $_GET['search'];?></b>"</h1>
        
        <?php 
            $s=$_GET['search'];
            $query="select * FROM thread where MATCH(thread_title, thread_desc) against ('$s')";
            $result=mysqli_query($conn,$query);
            $num=mysqli_num_rows($result);
            if($num>0){
                echo '<div class="container my-2">';
                while($row=mysqli_fetch_assoc($result)){
                    $title=$row['thread_title'];
                    $desc=$row['thread_desc'];
                    $t_id=$row['thread_id'];
                    echo '<div class="result " >
                    <h4><a href="thread.php?tid='.$t_id.'" class="text-dark">'.$title.'</a></h4>
                    <p>'.$desc.'</p>
            
                </div><hr>';
                }
                echo '</div';
            }
            else{
                echo '<div class="jumbotron jumbotron-fluid my-4">
            <div class="container">
              <p class="display-4 ">No Results found</p>
              <p? class="lead">Your search "'.$s.'" did not match any documents.</p?
              <p><br><br><b>Suggestions:</b><ul>
              <li>Make sure that all words are spelled correctly.</li>
              <li>Try different keywords.</li>
              <li>Try more general keywords.</li></ul></p>
            </div>
          </div>';
            }
        ?>
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