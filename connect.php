<?php
$travelerName = $_POST['travelerName'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$nationality = $_POST['nationality'];
$travelPre = $_POST['travelPre'];

$conn = new mysqli('localhost','root','','test');
if ($conn->connect_error) {
    die('Connection Failed:'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(travelName,age,email,gender,nationality,travelPre)
    values(?,?,?,?,?,?)");
    $stmt->bind_param("sissss", $travelerName,$age,$gender,$email,$phone,$nationality,$travelPre);
    $stmt->execute();
    echo "Registration Successfully";
    $stmt->close();
    $stmt->close();
}
?>