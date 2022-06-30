

<?php

session_start();
// if(isset($_SESSION['email']) )
// {
//   header("location: welcome.php");

// }


$emailExits=FALSE;
$insert=FALSE;
$passnotmatch=FALSE;
$msg=FALSE;

include 'dbconnect.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    $sql="SELECT * FROM `member` WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    // echo $num;
    if($num==0)
    {
      if($password==$cpassword)
      {
          $sql="INSERT INTO `member` (`sl`, `email`, `Password`, `date_and_time`) VALUES (NULL, '$email', '$password', current_timestamp());";
          $result=mysqli_query($conn,$sql);
          if($result)
          {
            $insert=TRUE;
            $msg="Data insert successfull ";
          }
      }
      else
      {
        $passnotmatch=TRUE;
        $msg="Password and confirm password are not match !";
      }

    }
    else
    {
      $emailExits=TRUE;
      $msg="Email already exits !";
    }

}

?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | SC</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="m_top_card"></div>
    <section class="wrapper">
        <div class="container-fluid">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">

                <form class="rounded bg-white shadow p-5" action="register.php" method="post">
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Create an Account</h3>
            
                    <?php
                    if($insert==TRUE)
                    {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>'.$msg.'</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

                      $_SESSION['email']=$email;
                      $_SESSION['register']='register';
                      header("location: setprofiledel.php");
                    }
                    if($passnotmatch==TRUE)
                    {
                      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>'.$msg.'</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    if($emailExits==TRUE)
                    {
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>'.$msg.'</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    ?>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                        <label for="cpassword">Confirm Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-2">Create Account</button>
        
                        <a href="index.php" class="btn btn-success submit_btn w-100 my-1">Log in here</a>
                    
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>