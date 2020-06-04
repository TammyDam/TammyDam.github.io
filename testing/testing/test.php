<?php
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];


if(!empty($username) || !empty($passworrd) || !empty($gender)|| !empty($email){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "password";
    $dbname = "testing";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {
    $INSERT = "INSERT Into register (username, password, gender, email) values(?, ?, ?, ?)";

    $stmt = $conn->prepare($SELECT);;
    $stmt->bind_para("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt-> num_rows;
    
    if ($rnum==0){
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_para("ssss", $username, $password, $gender, $email);
        $stmt->execute();
        echo "New record inserted successfully";
    } else {
        echo "ERROR. Record was not inserted."
    }
    $stmt-> close();
    $conn -> close();
}
} else {
    echo "All fields are required";
    die();
}
?>
