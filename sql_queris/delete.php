<?php 
    $sno = $_POST['ID'];
    $conn = mysqli_connect("localhost","root","","votingprocess");
    $sql = "DELETE FROM `votes` WHERE sno = '{$sno}'";
    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo 0;
    }	
    // header("Refresh:0");
    mysqli_close($conn);
?>    