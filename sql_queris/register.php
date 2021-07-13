<?php 
    $password = $_POST['PASS'];
    $email = $_POST['EMAIL'];
    $conn = mysqli_connect("localhost","root","","votingprocess") or die("connection failed:(");
    $sql = "INSERT INTO register(email,password) VALUES ('{$email}','{$password}')";
    $result = mysqli_query($conn,$sql) or die("registration query failed:(");
    if($result){
        echo 1;
    }else{
        echo 0;
    }
?>