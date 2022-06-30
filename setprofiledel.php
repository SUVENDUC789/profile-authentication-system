<?php
session_start();

if(isset($_SESSION['register']) )
{
  $email=$_SESSION['email'];

}
else if(!isset($_SESSION['register']))
{
    header("location: register.php");
}



$ok=FALSE;
$not=FALSE;
$msg=FALSE;

include 'dbconnect.php';
$newName=FALSE;

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $FirstName=$_POST['FirstName'];
    $secondName=$_POST['secondName'];
    $bio=$_POST['bio'];
    $gender=$_POST['gender'];
    $hobbies=$_POST['hobbies'];

    $fullName="$FirstName $secondName";
    
    // $sql="SELECT * FROM `users` WHERE email='$email'";
    // $result=mysqli_query($conn,$sql);
    // if($result)
    // {

    // }
    if(isset($_FILES['image']))
    {
     
        $img_name=$_FILES['image']['name'];
        $oldName=$_FILES['image']['name'];
     
        $img_name=preg_replace("/\s+/","_",$img_name);
     
        $img_type=$_FILES['image']['type'];
        $img_tmp_name=$_FILES['image']['tmp_name'];
        $img_error=$_FILES['image']['error'];
        $img_size=$_FILES['image']['size'];
     
     
         $img_ext=pathinfo($img_name,PATHINFO_EXTENSION);
         $img_name=pathinfo($img_name,PATHINFO_FILENAME);
     
         $newName=$img_name.date("mjYHis").".".$img_ext;
     
        move_uploaded_file($img_tmp_name,"IMG/".$newName);
    }
    
    $sql="INSERT INTO `users` (`sl`, `FirstName`, `lastname`, `fullname`, `gender`, `bio`, `hobbies`, `email`, `profilephoto`, `dateRecentTime`) VALUES (NULL, '$FirstName', '$secondName', '$fullName', '$gender', '$bio', '$hobbies', '$email', '$newName', current_timestamp())";

    $result=mysqli_query($conn,$sql);

    if($result)
    {
        $ok=TRUE;
        $msg="Your profile page create successfull !";
    }
    else
    {
        $not=TRUE;
        $msg="Error : Something went to wrong | Please try again";
    }

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