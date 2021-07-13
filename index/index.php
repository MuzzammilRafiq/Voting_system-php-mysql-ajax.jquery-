<style> <?php 
	include '../css/index.css';
	include '../css/table.css';
?> </style>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Voting_System_Home</title>
</head>
 <body>
	<div class="table-wrapper">
		<h1 style="color: white; text-align:center;">VOTING SYSTEM</h1>
		<table class="fl-table" id="data-table"></table>
		<div id="errmess"></div>
		<div id="sucmess"></div>
		
		<?php 
			include 'reghtml.php';//REGISTERFOR VOTE CANDIDATE UI FILE
			include 'votehtml.php';//VOTE CANDIDATE UI FILE
			include 'addhtml.php';//ADD CANDIDATE UI FILE
			include 'deletehtml.php';//DELETE CANDIDATE UI FILE
		?>

		<div class="button-area-line">
			<button id="regebutton">REGISTER</button>
			<button id="votebutton" >VOTE</button>
			<button id="addbutton">ADD CANDIDATE</button>
			<button id="delbutton">DELETE CANDIDATE</button>
		</div>
	</div> 
	<script src="../javascript/jquery.js"></script>
	<script src="../javascript/index.js"></script>
	<script src="../javascript/add.js"></script>
	<script src="../javascript/del.js"></script>
	<script src="../javascript/reg.js"></script>
	<script src="../javascript/vote.js"></script>
</body>
</html>