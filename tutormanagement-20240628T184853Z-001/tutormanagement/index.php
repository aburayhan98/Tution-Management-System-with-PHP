<?php
session_start();
require 'dbconn.php';
if(isset($_POST['search_btn']))
{
    $city=mysqli_real_escape_string($conn,$_POST['city']);
    if(empty($city)){
        $sql = "SELECT * FROM users";
    }
    else{
        $sql = "SELECT * FROM users WHERE district='$city'";
    }
    
    $result = $conn->query($sql);
    //echo $city;
}
else{
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
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
    <title>Ontutor</title>
</head>
<body>
    <div class="row">
        <div class="col-md-6">
            <div class="card p-4 my-3 mx-2">
                <form action="/tutormanagement/" method='post'>
                <select class="form-control my-3" name="city" id="">
                    <option value="">All Districts</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Cumilla">Cumilla</option>
                    <option value="Rangpur">Rangpur</option>
                </select>
                <button name="search_btn" class="btn btn-block btn-primary">Search Tutor</button>
                </form>
            </div>
        </div>
        <div class="col-md-5 mx-3">
            <img width="90%" height="350px" src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/school-tutoring-service-flyer-template-design-14ab1f521ebdc6627e877a308ef5c2be_screen.jpg?ts=1569231238" alt="">
        </div>
    </div>
    <div class="user">
        <div class="row">
            <?php 
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
                
            ?>
            <a href="/tutormanagement/viewprofile.php/?id=<?php echo $row['id'] ?>" class="col-md-3  mx-2">
                <div class="card bg-light text-center p-3">
                <div class="text-center">
                <img width="150px" height="140px" src="<?php echo $row["imageURL"] ?>" alt="">
                </div>    
                
                    <h6><?php echo $row["name"] ?></h6>
                    <p>Salary: <?php echo $row["salary"] ?>/month</p>
                    <p>Area: <?php echo $row["district"] ?></p>
                </div>
                </a>
            <?php 
            }
        }
            ?>
        </div>
    </div>
</body>
</html>