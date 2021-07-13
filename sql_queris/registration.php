<?php 
	$email = $_POST['email'];
	function randomPassword() {
		$alphabet = 'abcdefghijmnpqrstuABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 6; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}// PASSWORD NOT ENCRIPTED
	$password = randomPassword();
	//sending password through email.
	$subject = "PASSWORD FROM MZML VOTING SYSTEM";
	$txt = "Your password is: ".$password;
	$headers = "From: youremail@gmail.com";
	if( mail($email,$subject,$txt,$headers) ){
		// echo '<script>alert("email sent");</script>';
		$conn = mysqli_connect("localhost","root","","votingprocess") or die("connection failed:(");
		$sql = "INSERT INTO register(email,password) VALUES ('{$email}','{$password}')";
		$result = mysqli_query($conn,$sql) or die("registration query failed:(");
		if($result){
			echo 1;
		}else{
			echo 0;
		}

    }else{
		echo 0;
	}
?>
