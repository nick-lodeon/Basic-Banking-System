<?php 
session_start();



?>
<html>
<head>
   <title>viewUser</title>
   <link rel="stylesheet" href="button.css">
   
	<style>
		body{
			text-align:center;
		}
		.flat-table-1 {
			background: #00008b;
		}
		.flat-table-1 tr:hover {
			background: rgba(0,0,0,0.19);
		}
		h1{
			font-family: Arial, Times, serif;
		}
		table{
			text-align:center;
			margin-left: auto;
			margin-right: auto;
			border:4px solid gray;
			border-collapse:collapse;
			}
		th{
			color:violet;
			font-size:24px;
			padding:16px;
		}
		
		td{
			text-align:center;
			font-size:22px;
			color: #92c6df;
			padding: 0px 20px 0px 20px;
		}
		tr{
			transition: background 0.3s, box-shadow 0.3s;
		}
		th,td{
			border-collapse:collapse;
			border:2px groove gray;
			text-shadow: 1px 1px black;
		}
		.css-button{
			margin-left:auto;
			margin-right:auto;
		}
		.button1{
			background-color:lime;
			text-align:center;
			padding-top:2px;
		}
		
		.button1:hover{
			background-color:blues;
		}
		.view{
			top:50%;
			padding-top:20px;
			text-align:center;
		}
		.ho{
			padding-top:50px;
			padding-bottom:100px;
		}
		body{
		background-image:url("images/bgbank8.jpg");
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
	</style>
	
</head>
	
<body>
	<h1 style="color:#FFA500;text-shadow: 2px 2px black;">User Information</h1>
    <table class="table table-hover table-striped table-condensed table-bordered">
		<thead>
			<th>NO</th>
			<th>Name</th>
			<th>Email</th>
			<th>Credit</th>
			<th></th>
		</thead>
		<tbody>
		<?php  
				$user = 'root';
				$password = ''; 
				$database = 'banking_system';
				$servername='localhost:3306';
				$mysqli = new mysqli($servername, $user, 
								$password, $database);
				
								// Checking for connections
				if ($mysqli->connect_error) 
					{
						die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
					}
					$sql = "SELECT * FROM users";
					$result = $mysqli->query($sql);
			while($rows=$result->fetch_assoc())
                { 

?>
					<tr>
			
			<td> <?php echo  $rows["no"]; ?> </td>
			<td><?php echo  $rows["name"]; ?></td>
			<td><?php echo  $rows["email"]; ?></td>
			<td><?php echo  $rows["amount"]; ?></td>
			<td>
				<form action="user.php" method="post"  class="view">
					<button class="button1" type="submit" name="name" value=<?php echo  $rows["name"]; ?>>View</button>
				</form>
			</td>
		</tr>
<?php
				}
				?>		

	</tbody>
	</table><br><br>

<div class="buttons">
	<a href="index.php">
    <button class="glow-on-hover">HOME</button>
	</a>
</div>
</body>
</html>
