<?php
session_start();
require 'dbconn.php';
$error="";
$color="";

if(isset($_POST['approve_btn']))
{
    $url = $_SERVER['REQUEST_URI'];
    $url_segments = explode('/', $url);
    $segment_1 = $url_segments[1];
    $segment_2 = $url_segments[2];
    $id= explode('=',explode('?', $segment_2)[1])[1];
    $query = "UPDATE posts SET approved = 1 WHERE id = '$id'";
    $result = $conn->query($query);
    header("Location: /tutormanagement/admin.php");
    
}
else if(isset($_POST['delete_btn']))
{
    $url = $_SERVER['REQUEST_URI'];
    $url_segments = explode('/', $url);
    $segment_1 = $url_segments[1];
    $segment_2 = $url_segments[2];
    $id= explode('=',explode('?', $segment_2)[1])[1];
    $query = "DELETE FROM posts WHERE id = '$id'";
    $result = $conn->query($query);
    header("Location: /tutormanagement/admin.php");
}
else if(isset($_POST['refuse_btn']))
{
    $url = $_SERVER['REQUEST_URI'];
    $url_segments = explode('/', $url);
    $segment_1 = $url_segments[1];
    $segment_2 = $url_segments[2];
    $id= explode('=',explode('?', $segment_2)[1])[1];
    $query = "UPDATE posts SET approved = 0 WHERE id = '$id'";
    $result = $conn->query($query);
    header("Location: /tutormanagement/admin.php");
}


    $query = "SELECT * FROM posts WHERE approved=0";
    $result = $conn->query($query);

    $query = "SELECT * FROM posts WHERE approved=1";
    $result2 = $conn->query($query);
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
    <title>Admin</title>
</head>
<body>
    <h3 class="alert alert-info text-center">Admin Panel</h3>
    <br>
    <div class="row">
        <div onclick="col1Pressed()" class="col-md-6 text-center" id="col1">
            <button class="btn btn-info">Pending Requests</button>
        </div>
        <div onclick="col2Pressed()" class="col-md-6 text-center" id="col2">
        <button class="btn btn-warning">Approved Requests</button>
        </div>
    </div>
    <br><br>
    <div class="container" id="data1">
        <table class="table">
            <tbody>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Transaction Id</th>
                    <th>Action</th>
                </tr>
                 <?php 
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    
                
                    ?>
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['transaction_id'] ?></td>
                    <td>
                        
                    <form class="btn btn-success" action="/tutormanagement/admin.php?id=<?php echo $row['id'];?>" method="post"><button class="btn text-white" name="approve_btn">Approve</button></form>
                        
                    <form class="btn btn-danger" action="/tutormanagement/admin.php?id=<?php echo $row['id'];?>" method="post"><button name="delete_btn" class="btn text-white">Delete</button></form>
                    </td>
                </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>


    <div class="container" id="data2">
        <table class="table">
            <tbody>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Transaction Id</th>
                    <th>Action</th>
                </tr>
                 <?php 
            if ($result2->num_rows > 0) {
                // output data of each row
                while($row = $result2->fetch_assoc()) {
                    
                
                    ?>
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['transaction_id'] ?></td>
                    <td>
                        
                    <form class="btn btn-warning" action="/tutormanagement/admin.php?id=<?php echo $row['id'];?>" method="post"><button class="btn text-white" name="refuse_btn">Refuse</button></form>
                        
                    <form class="btn btn-danger" action="/tutormanagement/admin.php?id=<?php echo $row['id'];?>" method="post"><button name="delete_btn" class="btn text-white">Delete</button></form>
                    </td>
                </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>
</body>

<script>
    var col1=document.getElementById("col1");
    var col2=document.getElementById("col2");
    var data1=document.getElementById("data1");
    var data2=document.getElementById("data2");
    data2.style.display='none'
    function col1Pressed(){
    data2.style.display='none'
    data1.style.display='block'
    }
    function col2Pressed(){
        data1.style.display='none'
        data2.style.display='block'
    }
</script>
</html>
