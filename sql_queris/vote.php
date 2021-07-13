<?php
	$conn = mysqli_connect("localhost","root","","votingprocess") or die("Connection failed :(");
	$sql = "SELECT * FROM register";
	$resultt = 	mysqli_query($conn,$sql) or die("Query failed:(");

		$email = $_POST['email'];
		$password = $_POST['password'];
        $cid = $_POST['ID'];
		$email_present = false;
        $curr_password = "";
        if(mysqli_num_rows($resultt) > 0){
           	while( $row = mysqli_fetch_assoc($resultt) ){
                if($email == $row['email']){
                    $curr_password = $row['password'];
                    $email_present = true;
                    break;
                }
			}
		}

			if($password == $curr_password){
                    $sql2 = "SELECT * FROM `votes` WHERE sno = $cid";
                    $result2 = mysqli_query($conn,$sql2);
                    $row = mysqli_fetch_assoc($result2);
                    $curr = $row['total_votes'] + 1;
                    $sql2 = "UPDATE votes SET total_votes = '{$curr}' WHERE sno = '{$cid}' ";
                    $result2 = mysqli_query($conn,$sql2) or die("Query 2 didn't happen");

                    $sql3 = "INSERT INTO voted(email) VALUES ('{$email}')";
                    $result3 = mysqli_query($conn,$sql3) or die("Query 3 didn't happen.");
                    mysqli_close($conn);
                    echo 1;
            }else{
                    echo 0;
            }
?>
