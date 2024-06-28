<?php
session_start();
require 'dbconn.php';
$captha_error="";
if(isset($_POST['login_btn']))
{
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);
  $captha=mysqli_real_escape_string($conn,$_POST['captha']);
  if($captha!=$_SESSION['captha']){
    $captha_error="INVALID SUM.";
  }
  else{
    if($email=='admin' && $password=='admin'){
      $_SESSION['logged_in']=true;
      $_SESSION['email']=$email;
      header("Location: /tutormanagement/admin.php");
    }
    else{
      $query = "SELECT * FROM users WHERE email='$email' and password='$password'";
      $result = $conn->query($query);
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $_SESSION['name']=$row["name"];
          $_SESSION['id']=$row["id"];
          $_SESSION['logged_in']=true;
          $_SESSION['email']=$row["email"];
          header("Location: /tutormanagement/");
          // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
        }
      } else {
        echo "0 results";
      }}
    }
  }
  

$num1=mt_rand(1, 20);
$num2=mt_rand(1, 20);
$ans=$num1+$num2;
$_SESSION['captha']=$ans;
  
   

    // $query="SELECT * FROM users WHERE ;
    // $query_run=mysqli_query($conn,$query);
    // if($query_run){
    //     $_SESSION['message']="User Added Successfully";
    //     header("Location: /lab8/login.php");
    //     exit(0);
    // }
    // else{
    //     $_SESSION['message']="User Failed to Add";
    //     header("Location: /lab8/register.php");
    //     exit(0);
    // }

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
    <title>Login</title>
</head>
<body>
    <div class="my-4 text-center card p-4">
        <h3 class="text-success">LOGIN TO ACCESS MORE</h3>
    </div>
    <div class="container my-4">
        <div class="row my-4">
            <div class="col-md-6 my-4">
                <div class="card p-3">
                    <form action="/tutormanagement/login.php" method="post">
                <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
      <input name="email" type="text" class="form-control" id="email">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-9">
      <input type="password" name="password" class="form-control" id="inputPassword">
    </div>
  </div>
  
  <div class="text-center">
    <p class="text-danger"><b><?php echo $captha_error; ?></b></p>
    <?php echo $num1 ?> + <?php echo $num2 ?> = ? <input name="captha" type="text"> <br> <br>
  <button name="login_btn" class="btn btn-success">Login</button>
  </form>
  </div>
                </div>
            </div>
            <div class="col-md-6 my-4">
                <div class="card p-4 mx-2">
                    <h6 class="text-danger">Getting error in login?</h6>
                    <hr>
                    <p>Ans: Please check your email and password.</p>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>