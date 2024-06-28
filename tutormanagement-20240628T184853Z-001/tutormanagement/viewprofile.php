<?php
session_start();
require 'dbconn.php';
$id=$_GET['id'];
$query = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($query);      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
?>
<?php include "navbar.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
</head>
<body>
    <h4 class="text-center bg-light">Profile of <?php echo $row['name'] ?></h4>
    <div class="container">
        <div class="card p-2 my-2">
            <div class="row">
                <div class="col-md-4">
                    <img width="250px" height="200px" src="<?php echo $row['imageURL'] ?>" alt="">
                </div>
                <div class="col-md-8 mx-2">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Name: </td>
                                <td><?php echo $row['name']?></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><?php echo $row['email']?></td>
                            </tr>
                            <tr>
                                <td>Phone: </td>
                                <td><?php echo $row['phone']?></td>
                            </tr>
                            <tr>
                                <td>Preffered Subjects: </td>
                                <td><?php echo $row['preffered_subjects']?></td>
                            </tr>
                            <tr>
                                <td>Preffered Area: </td>
                                <td><?php echo $row['preffered_area']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <?php }}?>
    
</body>
</html>