<div id="vote_box">
		<div id="vote_form">
			<h2>Vote Candidate</h2>
			<form id="vote_candidate">
				<div>
					<label>Candidate</label>
					<select id="id_name" class="lab">
					<option selected disabled>Select Candidate</option>
					<?php 
						$connection  = mysqli_connect("localhost","root","","votingprocess") or die("connection failed");
						$sql = "SELECT * FROM votes";
						$result = mysqli_query($connection,$sql) or die("Query didn't happen");

						while ($row = mysqli_fetch_assoc($result)) { ?>   

							<option value=" <?php echo $row['sno']; ?> "> <?php echo $row['sno'].": ".$row['name']; ?> </option>	
						<?php }mysqli_close($connection);  ?>
					</select>
				</div>
                <div>
					<label >Email</label>
					<input type="email" id="registered_email" class="lab" required placeholder="Enter your regestered email"/>
				</div>
                <div>
					<label >Password</label>
					<input type="text" id="registered_password" class="lab" required placeholder="Enter your regestered password"/>
				</div>
				<input type="submit" value="Vote" id="vote"/>
        	</form>
			<p>Not Registered ?</p><a href="#" id="href">Register here</a>
			<div id="close-btn4">x</div>
		</div>
	</div>
</body>
</html>