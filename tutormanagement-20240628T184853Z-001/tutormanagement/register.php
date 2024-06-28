<?php
session_start();
require 'dbconn.php';
if(isset($_POST['register_user']))
{
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $district=$_POST['district'];
    
    $query="INSERT INTO users(name,password,email,phone,district) VALUES('$name','$password','$email','$phone','$district')";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['message']="User Added Successfully";
        header("Location: /tutormanagement/login.php");
        exit(0);
    }
    else{
        $_SESSION['message']="User Failed to Add";
        header("Location: /tutormanagement/register.php");
        exit(0);
    }

}
?>
<?php
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="text-center my-4 card p-4">
    <h3 class="text-info">Register Yourself</h3>
    </div>
    
<div class="container my-4">
        <div class="row my-4">
            <div class="col-md-6 my-4">
                <div class="card p-3">
                    <form action="/tutormanagement/register.php" method="post">
                
                
                    <div class="mb-3 row">
                     <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                        <input name="name" type="text" class="form-control" id="email">
                    </div>
                    </div>

                    <div class="mb-3 row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                        <input name="email" type="text" class="form-control" id="email">
                    </div>
                    </div>

                    <div class="mb-3 row">
                     <label class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                        <input name="phone" type="number" class="form-control" id="email">
                    </div>
                    </div>



  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-9">
      <input type="password" name="password" class="form-control" id="inputPassword">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-3 col-form-label">District</label>
    <div class="col-sm-9">
    <select name="district" class="form-select" aria-label="Default select example">
            <option value="Dhaka">Dhaka</option>
            <option value="Mymensingh">Mymensingh</option>
            <option value="Cumilla">Cumilla</option>
            <option value="Rangpur">Rangpur</option>
</select>
    </div>
  </div>
  
  
  <div class="text-center">
    
  <button name="register_user" class="btn btn-success">Register</button>
  </form>
  </div>
                </div>
            </div>
            <div class="col-md-6 my-4">
                <div class="card p-4 mx-2">
                    <h6 class="text-danger">Getting error in register?</h6>
                    <hr>
                    <p>Ans: Please check your email and password.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>