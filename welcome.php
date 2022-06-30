<?php

session_start();
if(isset($_SESSION['email']))
{
    $email=$_SESSION['email'];
    include 'dbconnect.php';
    $sql="SELECT * FROM `users` WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $_SESSION['fullname']=$row['fullname'];
    $_SESSION['FirstName']=$row['FirstName'];
    $_SESSION['lastname']=$row['lastname'];
    $_SESSION['bio']=$row['bio'];
    $_SESSION['hobbies']=$row['hobbies'];
    $_SESSION['profilephoto']=$row['profilephoto'];
}
else if(!isset($_SESSION['email']))
{
    header("location: index.php");
}





?>

<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome - <?php echo $_SESSION['fullname'];?> </title>
  </head>
  <body>
    <?php
    include 'navbar.php';
    ?>


    <div class="container my-5">
        <h3 class="text-center">Welcome to our site</h3>

        <div class="row">

            <?php
                include 'dbconnect.php';
                $sql="SELECT * FROM `users` ORDER BY `sl` DESC";
                $result=mysqli_query($conn,$sql);
                $num=mysqli_num_rows($result);
                for($i=0;$i<$num;$i++)
                {
                    $row=mysqli_fetch_assoc($result);
                    if($_SESSION['profilephoto']!=$row['profilephoto'])
                    {
                        echo '<div class="col-md-4 my-3">
                        <div class="card" style="width: 18rem;">
                            <img src="IMG/'. $row['profilephoto'] .'" class="card-img-top" alt="Error loading Img.">
                            <div class="card-body">
                                <h5 class="card-title">'. $row['fullname'] .'</h5>
                                <p class="card-text"><strong>Bio : </strong>'. $row['bio'] .'</p>
                                <p class="card-text"><strong>hobbies : </strong>'. $row['hobbies'] .'</p>
                                <hr>
                            </div>
                        </div>
                    </div>';

                    }


                }


            ?>

        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>