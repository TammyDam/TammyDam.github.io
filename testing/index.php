<?php
$Status = $_POST['Status'];
$charge_code = $_POST['charge_code'];
$end_cust = $_POST['end_cust'];



if(!empty($Status) || !empty($charge_code) || !empty($end_cust){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "testing";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {
    $INSERT = "INSERT Into register (Status, charge_code, end_cust) values(?, ?, ?)";

    $stmt = $conn->prepare($SELECT);;
    $stmt->execute();
    $stmt->store_result();
    $rnum = $stmt-> num_rows;
    
    if ($rnum==0){
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_para("sss", $Status, $charge_code, $end_cust);
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
