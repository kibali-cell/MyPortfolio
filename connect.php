<?php
  $firstName = $_POST['firstName'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

//Database connection
$conn = new mysqli('localhost', 'root', '', 'portfolio');
if($conn->connect_error){
    die('Connection Failed : ' .$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into contact(firstName, email, subject, message)
    values(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstName, $email, $subject, $message);
    $stmt->execute();
    echo "Registration Successfully...";
    $stmt->close();
    $conn->close();
}

?>