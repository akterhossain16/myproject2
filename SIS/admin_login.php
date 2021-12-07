<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/font-awesome.min.css" rel ="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
  	
</head>
<body>
	<center><br><br>
		<h3>Admin LogIn Page</h3><br>
		<form action="" method="post">
			Email ID: <input type="text" name="email" required><br><br>
			Password: <input type="password" name="password" required><br><br>
			<input type="submit" name="submit" class="btn btn-primary pull-center"value="LogIn">
		</form><br>
		
		<?php

		     session_start();
			if(isset($_POST['submit'])){
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"admin");
				$query = "select * from login where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) {
					if($row['email'] == $_POST['email']){
						if($row['password'] == $_POST['password']){
							$_SESSION['name'] =  $row['name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: admin_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
					}
				}
				
			}
		?>
	</center>
</body>
</html>