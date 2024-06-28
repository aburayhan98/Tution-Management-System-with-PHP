<?php

$conn=mysqli_connect("localhost","root","","tutormanagement");

if(!$conn){
    die("Connection failed.".mysqli_connect_error());
}

?>


<!-- CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(20),
    email varchar(50) UNIQUE,
    phone varchar(13),
    password varchar(18),
    district varchar(20),
    salary varchar(20),
    week_day INT,
    preffered_subjects varchar(40),
    preffered_area varchar(40),
    imageURL varchar(140),
    last_degree varchar(40)
);
 -->

 <!-- 
    UPDATE table_name
SET name = 'name', email = 'email', phone = 'phone', password = 'password', district = 'district', salary = 'salary', week_day = 'week_day', preffered_subjects = 'preffered_subjects', preffered_area = 'preffered_area', imageURL = 'imageURL'
WHERE id = 'id';
  -->


  <!-- CREATE TABLE posts(
 id INT AUTO_INCREMENT PRIMARY KEY,
 name varchar(20),
 transaction_id varchar(30),
 email varchar(20),
 phone varchar(15),
 for_class varchar(20),
 gender varchar(6),
 district varchar(20),
 salary varchar(20),
 approved int    
 ); -->