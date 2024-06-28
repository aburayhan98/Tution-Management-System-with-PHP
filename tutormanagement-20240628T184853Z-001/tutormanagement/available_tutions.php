<?php
session_start();
require 'dbconn.php';
$error="";
$color="";


if(isset($_POST['search_btn']))
{
    $city=mysqli_real_escape_string($conn,$_POST['city']);
    if(empty($city)){
        $query = "SELECT * FROM posts WHERE approved=1";
    }
    else{
        $query = "SELECT * FROM posts WHERE approved=1 and district='$city'";
    }
    
    $result = $conn->query($query);
}
else{
    $query = "SELECT * FROM posts WHERE approved=1";
    $result = $conn->query($query);
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
    <title>Available Tutions</title>
</head>
<body>
    <h3 class="text-center text-primary bg-light p-2 my-2">Available Tutions</h3>
<br>
<form class="container p-2 " action="/tutormanagement/available_tutions.php" method='post'>
                <select class="form-control my-3" name="city" id="">
                    <option value="">All Districts</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Cumilla">Cumilla</option>
                    <option value="Rangpur">Rangpur</option>
                </select>
                <div class="text-center">
                <button name="search_btn" class="btn btn-block btn-success">Search Tution</button>
                </div>
                
                </form>
    <div class="container">
    <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    
                
                    ?>
        <div class="card my-1 p-2">
            <h6 class="text-center text-success">For <?php echo $row['for_class'] ?></h6>
            <table class="table table-striped">
                <tbody>
                    <tr>
                    <td>Name: </td>
                    <td><?php echo $row['name'] ?></td>
                    </tr>
                    
                    <tr>
                    <td>Phone: </td>
                    <td><?php echo $row['phone'] ?></td>
                    </tr>

                    <tr>
                    <td>Salary </td>
                    <td><?php echo $row['salary'] ?> tk/month</td>
                    </tr>

                    <tr>
                    <td>Tutor: </td>
                    <td><?php echo $row['gender'] ?></td>
                    </tr>
                    <tr>
                    <td>District: </td>
                    <td><?php echo $row['district'] ?></td>
                    </tr>
                    
                </tbody>
            </table>

        </div>
        <?php }}?>
    </div>
</body>
</html>