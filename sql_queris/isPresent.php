<?php 
    $conn = mysqli_connect("localhost","root","","votingprocess") or die("Connection failed registration.php");
	$sql = "SELECT * FROM register";
	$result = 	mysqli_query($conn,$sql) or die("Query failed registration.php");
    $email = $_POST['email'];
    $email_present = false;
    
    if(mysqli_num_rows($result) > 0){
        while( $row = mysqli_fetch_assoc($result) ){
            if($email == $row['email']){
                $email_present = true;
                break;
                
            }
        }
        if($email_present){
            echo 1;
        }else{
            echo 0;
        }

    }
?>