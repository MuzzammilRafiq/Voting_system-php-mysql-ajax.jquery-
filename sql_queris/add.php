<?php 
    $name = $_POST['Name'];
    $party = $_POST['Party'];
    $conn = mysqli_connect("localhost","root","","votingprocess") or die("connection failed:(");
    $sql = "INSERT INTO `votes`(`name`, `party`) VALUES ('{$name}','{$party}')";
    $result = mysqli_query($conn,$sql) or die("query didn't happen:(");
    if($result){
        echo 1;
    }else{
        echo 0;
    }
?>