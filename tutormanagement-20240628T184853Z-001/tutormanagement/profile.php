<?php
session_start();
require 'dbconn.php';
$error="";
$color="";
if(isset($_POST['update_btn']))
{
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $phone=mysqli_real_escape_string($conn,$_POST['phone']);
  $salary=mysqli_real_escape_string($conn,$_POST['salary']);
  $gender=mysqli_real_escape_string($conn,$_POST['gender']);
  $district=mysqli_real_escape_string($conn,$_POST['district']);
  $last_degree=mysqli_real_escape_string($conn,$_POST['last_degree']);
  $week_day=mysqli_real_escape_string($conn,$_POST['week_day']);
  $preffered_area=mysqli_real_escape_string($conn,$_POST['preffered_area']);
  $preffered_subjects=mysqli_real_escape_string($conn,$_POST['preffered_subjects']);
  $imageURL=mysqli_real_escape_string($conn,$_POST['imageURL']);

  // $preffered_subjects=mysqli_real_escape_string($conn,$_POST['preffered_subjects']);

  if (empty($email) || empty($phone) || empty($salary) || empty($gender)||empty($last_degree) || empty($week_day) || empty($preffered_area) || empty($gender)) {
    $error="Please Fill all the fields.";
    $color="danger";
  }
  else{
    $id=$_SESSION['id'];
    $query="UPDATE users
    SET email = '$email', phone = '$phone', district = '$district', salary = '$salary', week_day = '$week_day', preffered_subjects = '$preffered_subjects', preffered_area = '$preffered_area', imageURL = '$imageURL', last_degree = '$last_degree'
    WHERE id = '$id';
    ";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $error="Profile Updated Successfully";
        $color="success";
    }
  }
}

    $id=$_SESSION['id'];
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($query);

    $row = $result->fetch_assoc();
    if(array_key_exists("email",$row)){
    
    }else{
    echo "The 'email' field is not present in the query result.";
    }

    // // Get the number of fields in the result
    // $num_fields = $result->field_count;
    
    // $field_present = false;
    // // Loop through the fields
    // for ($i = 0; $i < $num_fields; $i++) {
    //     $field = mysqli_fetch_field_direct($result, $i);
    //     if ($field->name == "gender") {
    //         $field_present = true;
    //         break;
    //     }
    // }
    
    // if ($field_present) {
    //     echo "The 'email' field is present in the query result.";
    // } else {
    //     echo "The 'email' field is not present in the query result.";
    // }
    
    // if ($result->num_rows > 0) {
    //     // output data of each row
    //     while($row = $result->fetch_assoc()) {
    //       echo $row["name"];
    //       echo $row["id"];
    //       if($row["gender"]){
    //         echo "ache";
    //       }
    //       else{
    //         echo "naai";
    //       }
          
    //       // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
    //     }
    //   } else {
    //     echo "0 results";
    //   }

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
    <title>Profile</title>
</head>
<body>
    <div class="alert alert-info text-center">
        <h3><?php echo $_SESSION['name']?> </h3>
    </div>
    <div class="container">
      <h4 class="text-center text-<?php echo $color;?>"><?php echo $error; ?></h4>
<form action="/tutormanagement/profile.php" method='post'>
    <div class="form-group my-2 row">
    <label htmlFor="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <?php if(array_key_exists("email",$row)){?>
    <!-- echo "Email: ".$row["email"]; -->
      <input name='email' type="text" class="form-control" value=<?php echo $row["email"];}?> >
      
    </div>
  </div>

  <div class="form-group row my-2">
    <label class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
    <?php if(array_key_exists("phone",$row)){?>
      <input name='phone' type="text" class="form-control" value=<?php echo $row["phone"];}?> />
    </div>
  </div>
  
  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">Salary (Per Month)</label>
    <div class="col-sm-10">
    <?php if(array_key_exists("salary",$row)){?>
      <input type="text" name='salary' class="form-control" value=<?php echo $row["salary"];}?> >
    </div>
  </div>

  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">Enter Image URL</label>
    <div class="col-sm-10">
    <?php if(array_key_exists("imageURL",$row)){?>
      <input type="text" name='imageURL' class="form-control"  value=<?php echo $row["imageURL"];}?> >
    </div>
  </div>

  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-10">
      <select class='form-control' name="gender" id="">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
  </div>

  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">Your Last Degree</label>
    <div class="col-sm-10">
    <?php if(array_key_exists("last_degree",$row)){?>
      <input type="text" name='last_degree' class="form-control" value=<?php echo $row["last_degree"];}?>   >
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

  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">Days</label>
    <div class="col-sm-10">
    <?php if(array_key_exists("week_day",$row)){?>
      <input type="text" name='week_day' class="bg-light form-control"  placeholder="3/4" value=<?php echo $row["week_day"];}?> >
    </div>
  </div>

  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">Preffered Area</label>
    <div class="col-sm-10">
    <?php if(array_key_exists("preffered_area",$row)){?>
      <textarea name="preffered_area" id="" class="form-control" cols="50" rows="3"><?php echo $row["preffered_area"];}?> </textarea>
    </div>
  </div>

  <div class="form-group row my-2 mb-2">
    <label class="col-sm-2 col-form-label">Preffered Subjects</label>
    <div class="col-sm-10">
    <?php if(array_key_exists("preffered_subjects",$row)){?>
      <textarea name="preffered_subjects" id="" class="form-control" cols="50" rows="3"> <?php echo $row["preffered_subjects"];}?> </textarea>
    </div>
  </div>

  <div class="text-center">
  <button name="update_btn" class="btn btn-success">Update Profile</button>
  </div>
  </form>
    </div>
</body>
</html>
