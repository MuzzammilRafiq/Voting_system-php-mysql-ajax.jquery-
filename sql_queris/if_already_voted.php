<?php 
    $email = $_POST['email'];
    $conn = mysqli_connect("localhost","root","","votingprocess") or die("conn failed :(");
    $sql = "SELECT * FROM `voted`";
    $email_voted = false;
    $result = mysqli_query($conn,$sql) or die("query failed :(");
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($row['email'] == $email){
                $email_voted = true;
                break;
            }
        }
        if($email_voted){
            echo 1;
        }else{
            echo 0;
        }
    }
?>