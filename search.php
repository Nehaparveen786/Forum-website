<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
           #maincontainer{
             min-height: 80vh;
      }
      </style>
    <title> Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
   <?php include 'partials/_dbconnect.php'; ?>
   <?php include 'partials/_header.php'; ?>
   
  
    <!-- Search Results -->
     <div class="container my-3" id="maincontainer">
        <h1 class="py-2">Search results for <em>"<?php echo $_GET['search']?>"</em></h1>

        <?php
        $noResult=true;
        $query = $_GET["search"];
        $sql = "SELECT * FROM `threads` where match(thread_title, thread_desc) against('$query')";
        ; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            $url = "thread.php?threadid=".$thread_id;
            $noResult =false;
    
          // Display the search result
          echo '<div class="result">
                    <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
                    <p> '. $desc .'</p>
               </div>';
      }
      if($noResult){
         echo '<div class="jumbotron jumbotron-fluid">
                 <div class="container">
                     <p class="display-4">No Results Found</p>
                     <p class="lead"> Suggestions:
                     <ul>
                        <li>Make sure that all words are splled correctly</li>
                        <li>Try different keywords</li>
                        <li>Try more general keywords.</li>
                     </ul>
                     </p>
                 </div>
              </div> ';
      }
   ?>
       
     
    <?php include 'partials/_footer.php'; ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>