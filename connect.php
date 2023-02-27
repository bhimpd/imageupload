<?php
session_start();
//database connection
$con = mysqli_connect("localhost", "root");
mysqli_select_db($con, 'assignment1');

if (isset($_POST['submit'])){

//getting name from html file
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$number = $_POST['number'];
$gender = $_POST['gender'];
$image = $_FILES['image'];

//to get image details->name,error and location
$filename = $image['name'];
$fileerror = $image['error'];
$filetmp = $image['tmp_name'];

//to get extension of the image...
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));


//types of images stored...
$filestored = array('jpg', 'jpeg', 'png');

//to check image extension...
if (in_array($filecheck, $filestored)) {
    //location for image to be stored...
    $destinationfolder = 'pictures/'.$filename;
    move_uploaded_file($filetmp, $destinationfolder);


    $query = "INSERT INTO form1 (name, address, email, number, gender, image)
    VALUES ('$name', '$address', '$email', '$number', '$gender','$destinationfolder')";


$query = mysqli_query($con, $query);
echo "registerd successfully...";

// $displayquery = "SELECT * FROM `form1`";
// $querydisplay = mysqli_query($con, $displayquery);
// $row = mysqli_num_rows($querydisplay);
// while ($result = mysqli_fetch_array($querydisplay)){

// }
}



}

?>