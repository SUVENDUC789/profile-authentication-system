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

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile | SC</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <div class="m_top_card"></div>
    <section class="wrapper">
        <div class="container-fluid">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">

                <form class="rounded bg-white shadow p-5" action="setprofiledel.php" method="post"
                    enctype="multipart/form-data">
                    <h3 class="text-dark fw-bolder fs-4 mb-1">Your details</h3>
                    <?php
                            if($not==TRUE)
                            {
                              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  <strong>'.$msg.'</strong>
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                            if($ok==TRUE)
                            {
                              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>'.$msg.'</strong>
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                              unset($_SESSION['register']);
                              header("location: welcome.php");
                            }

                    ?>

                    <div class="form-floating mb-2">
                        <input type="FirstName" class="form-control" id="FirstName" name="FirstName"
                            placeholder="Enter first name" required>
                        <label for="FirstName">Enter first name</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="secondName" class="form-control" id="secondName" name="secondName"
                            placeholder="Enter last name" required>
                        <label for="secondName">Enter last name</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="bio" class="form-control" id="bio" name="bio" placeholder="Your bio" required>
                        <label for="bio">Your bio</label>
                    </div>
                    <div id="myid" class="form-control mb-2">

                        Gender: <input type="hidden" name="gender" value="None">
                        <input type="radio" name="gender" id="radio" value="Male"> Male
                        <input type="radio" name="gender" id="radio" value="Female"> Female
                    </div>

                    <div class="form-floating mb-2">
                        <textarea class="form-control" placeholder="Leave a comment here" name="hobbies"
                            id="floatingTextarea2" style="height: 100px" required></textarea>
                        <label for="floatingTextarea2">Yours hobbies</label>
                    </div>

                    <div class="mb-2">
                        <label for="formFile" class="form-label">Chose your profile pic</label>
                        <input class="form-control" type="file" name="image" id="formFile" required>
                    </div>

                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4">Save</button>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile | SC</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>


    <div class="m_top_card"></div>
    <section class="wrapper">
        <div class="container-fluid">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">

                <div class="rounded bg-white shadow p-5">
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Edit Profile</h3>

              
                    <div class="form-floating mb-3">
                    <img src="IMG/<?php $fullname=$_SESSION['profilephoto']; echo "$fullname"; ?>" class="card-img-top" alt="Error loading Img.">
                      </div>
                    <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="<?php $fullname=$_SESSION['fullname']; echo "$fullname"; ?>" name="fullname" placeholder="<?php $fullname=$_SESSION['fullname']; echo "$fullname"; ?>" value="<?php $fullname=$_SESSION['fullname']; echo "$fullname"; ?>">
                          <label for="<?php $fullname=$_SESSION['fullname']; echo "$fullname"; ?>">Full Name</label>
                      </div>

                    <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="<?php $fullname=$_SESSION['bio']; echo "$fullname"; ?>" name="fullname" placeholder="<?php $fullname=$_SESSION['bio']; echo "$fullname"; ?>" value="<?php $fullname=$_SESSION['bio']; echo "$fullname"; ?>">
                          <label for="<?php $fullname=$_SESSION['bio']; echo "$fullname"; ?>">Bio</label>
                      </div>

                    <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="<?php $fullname=$_SESSION['hobbies']; echo "$fullname"; ?>" name="fullname" placeholder="<?php $fullname=$_SESSION['hobbies']; echo "$fullname"; ?>" value="<?php $fullname=$_SESSION['hobbies']; echo "$fullname"; ?>">
                          <label for="<?php $fullname=$_SESSION['hobbies']; echo "$fullname"; ?>">hobbies</label>
                      </div>


                      <a href="welcome.php"><button  class="btn btn-primary submit_btn w-100 my-1">Home</button></a>
                      <a href="edit.php"><button  class="btn btn-success submit_btn w-100 my-1">Edit Profile</button></a>


            
                    
                </div>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>