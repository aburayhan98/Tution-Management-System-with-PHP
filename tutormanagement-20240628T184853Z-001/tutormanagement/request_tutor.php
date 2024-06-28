<?php
session_start();
require 'dbconn.php';
$error="";
$color="";
if(isset($_POST['post_btn']))
{
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $phone=mysqli_real_escape_string($conn,$_POST['phone']);
  $salary=mysqli_real_escape_string($conn,$_POST['salary']);
  $gender=mysqli_real_escape_string($conn,$_POST['gender']);
  $district=mysqli_real_escape_string($conn,$_POST['district']);
  $for_class=mysqli_real_escape_string($conn,$_POST['for_class']);
  $transaction_id=mysqli_real_escape_string($conn,$_POST['transaction_id']);
  if (empty($email) ||empty($name) || empty($phone) || empty($salary) || empty($gender)||empty($transaction_id)  || empty($for_class)) {
    $error="Please Fill all the fields.";
    $color="danger";
  }
  else{
    $query="INSERT INTO posts (name, transaction_id, email, phone, for_class, gender, district, salary, approved) 
    VALUES ('$name', '$transaction_id', '$email', '$phone', '$for_class', '$gender', '$district', '$salary', 0);
    ";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $error="POST SUBMITTED SSUCCESSFULLY";
        $color="success";
    }
  }
}
?>
<?php 
include "navbar.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Tutor</title>
    <h4 class="text-center text-<?php echo $color;?>"><?php echo $error; ?></h4>
</head>
<body>
    <h3 class="text-center bg-light p-2 my-2">Request Tutor</h3>
    <br>
<marquee behavior="" direction="">
    <p class="text-primary"><b> You need to pay 50tk to 01703049596 and add your transaction id here. After verifying your transaction id your post will be approved.</b></p>
</marquee>
    <div class="card">
    <div class="container">
<form action="/tutormanagement/request_tutor.php" method='post'>
  
<div class="form-group row my-2">
    <label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input name='name' type="text" class="form-control"/>
    </div>
  </div>


<div class="form-group my-2 row">
    <label htmlFor="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input name='email' type="text" class="form-control">      
    </div>
  </div>

  <div class="form-group row my-2">
    <label class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input name='phone' type="text" class="form-control"/>
    </div>
  </div>
  

  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">For class</label>
    <div class="col-sm-10">
      <input type="text" name='for_class' class="form-control" >
    </div>
  </div>

  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">Salary</label>
    <div class="col-sm-10">
      <input type="text" name='salary' class="form-control"  >
    </div>
  </div>

  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-10">
      <select class='form-control' name="gender" id="">
      <option value="Any">Any</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
  </div>

  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">Transaction Id</label>
    <div class="col-sm-10">
    
      <input type="text" name='transaction_id' class="form-control">
    </div>
  </div>
  
  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">District</label>
    <div class="col-sm-10">
      <select name="district" class='form-control'>
        <option value="">Select District</option>
        <option value="Dhaka">Dhaka</option>
        <option value="Mymensingh">Mymensingh</option>
        <option value="Cumilla">Cumilla</option>
        <option value="Rangpur">Rangpur</option>
      </select>
    </div>
  </div>


  


  <div class="text-center">
  <button name="post_btn" class="btn btn-success">Submit Post</button>
  </div>
  </form>
    </div>
    </div>
</body>
</html>