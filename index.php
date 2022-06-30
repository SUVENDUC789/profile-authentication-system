<?php

session_start();
if(isset($_SESSION['email']) )
{
  header("location: welcome.php");

}

$ok=FALSE;
$msg=FALSE;
$not=FALSE;

include 'dbconnect.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM `member` WHERE email='$email' AND Password='$password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num!=0)
    {
      $ok=TRUE;
      $msg="Login successfull !";
      // echo "Yes";
    }
    else
    {
      $not=TRUE;
      $msg="Enter correct Email and Password !";
      // echo "Not";

    }


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | SC</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="m_top_card"></div>
    <section class="wrapper">
        <div class="container-fluid">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">

                <form class="rounded bg-white shadow p-5" action="index.php" method="post">
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Log in to Website</h3>
                    <!-- <div class="fw-normal text-muted mb-4">
                        New Here? <a href="register.php" class="text-primary fw-bold text-decoration-none">Create an
                            Account</a>
                    </div> -->
                    <?php
                    if($ok==TRUE)
                    {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>'. $msg .'</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

                      $_SESSION['email']=$email;
                      $_SESSION['login']='login';
                      header("location: welcome.php");


                    }
                    if($not==TRUE)
                    {
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>'. $msg .'</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

                    }
                    ?>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <!-- <div class="mt-2 text-end">
                        <a href="" class="text-primary fw-bold text-decoration-none">Forget Password?</a>
                    </div> -->
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-2">Login</button>
                    <a href="register.php" class="btn btn-success submit_btn w-100 my-1">Create 
                        Account</a>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>