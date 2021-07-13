<div id="del_box">
		<div id="del_form">
			<h2>Delete Candidate</h2>
			<form id="del_candidate">
				<div >
					<label>Candidate</label>
					<select id="ID" class="lab">
					<option  selected disabled>Select Candidate</option>
					<?php 
						// DYNAMICALLY UPDATING OPTIONS
						$connection  = mysqli_connect("localhost","root","","votingprocess") or die("connection failed");
						$sql = "SELECT * FROM votes";
						$result = mysqli_query($connection,$sql) or die("Query didn't happen");

						while ($row = mysqli_fetch_assoc($result)) { ?>   

							<option value=" <?php echo $row['sno']; ?> "> <?php echo $row['sno'].": ".$row['name']; ?> </option>	
						<?php }mysqli_close($connection);  ?>
					</select>
				</div>
				<div>
					<label>Password</label>
					<input type="text" id="password" class="lab" required placeholder="Enter password"/>
				</div>
				<input type="submit" value="Delete" id="del"/>
        	</form>
			<div id="close-btn2">x</div>
		</div>
	</div>
</body> 
</html>