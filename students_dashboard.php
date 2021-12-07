
<!DOCTYPE html>
<html>
<head>
	<title>student Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
   <link href="css/font-awesome.min.css" rel ="stylesheet"/>
     <style type="text/css">
		#header{
			height: 10%;
			width: 100%;
			top: 2%;
			background-color: black;
			position: fixed;
			color: white;
		}
		#left_side{
			height: 100%;
			width: 15%;
			top: 10%;
			position: fixed;
			background-color: black;
		}
		 #right_side{
			height: 75%;
			width: 80%;
			background-color:orange;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 1px black;
		}
		#top_span{
			top: 15%;
			width: 100%;
			left: 17%;
			color:white;
			font-size: 20px;
			position: fixed;
			background-color: blue;
		}
			#td{
			border: 1px solid black;
			padding-left: 2px;
			text-align: left;
			width: 200px;
		}
	</style>
	
	

	<?php
		session_start();
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"admin");
	?>
</head>
<body>
	<div id="header"><br>
		<center>Student Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<?php echo $_SESSION['name'];?> 
		<a href="logout.php">Logout</a>
		</center>
	</div>
	<span id="top_span"><marquee>Note:- This portal is open till 20 october 2021...Plz edit your information, if wrong.</marquee></span>
	<div id="left_side">
		<br><br><br>
		<form action="" method="post">
		
			<table>
				<tr>
					<td>
						<input type="submit" name="edit_detail" value="edit Detail"class="btn btn-primary">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="show_detail" value="show_detail"class="btn btn-primary">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="show teacher" value="show teacher"class="btn btn-primary">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="student_marks" value="student_marks"class="btn btn-primary">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="right_side"><br><br>
		<div id="demo">
			<?php
			if(isset($_POST['show_detail']))
			{
				$query = "select * from student where email = '$_SESSION[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
			?>
				<table>
				     <tr>
							<td>
								<b>Roll No:</b>
							</td> 
							<td>
								<input type="text" name="Roll_no" value="<?php echo $row['Roll_no']?>"disabled>
							</td>
						</tr>
					<tr>
						<td>
							<b>Name:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['name']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Father's Name:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['father_name']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Class:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['class']?>" disabled>
						</td>
					</tr>
					<tr>
								<td>
									<b>CGPA:</b>
								</td> 
								<td>
									<input type="text" name="CGPA" value="<?php echo $row['CGPA'];?>"disabled>
								</td>
							</tr>
					
					<tr>
						<td>
							<b>Mobile:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['mobile']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Email:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['email']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Password:</b>
						</td> 
						<td>
							<input type="password" value="<?php echo $row['password']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Remark:</b>
						</td> 
						<td>
							<textarea rows="3" cols="40" disabled><?php echo $row['remark']?></textarea>
						</td>
					</tr>
				</table>
				<?php
				}	
			}
			?>

			<?php
			if(isset($_POST['edit_detail']))
			{
				$query = "select * from student where email = '$_SESSION[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					?>
					<form action="edit_student.php" method="post">
						<table>
						<tr>
							<td>
								<b>Roll No:</b>
							</td> 
							<td>
								<input type="text" name="roll_no" value="<?php echo $row['Roll_no'];?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" value="<?php echo $row['name'];?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name:</b>
							</td> 
							<td>
								<input type="text" name="father_name" value="<?php echo $row['father_name'];?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Class:</b>
							</td> 
							<td>
								<input type="text" name="class" value="<?php echo $row['class'];?>">
							</td>
						</tr>
						<tr>
								<td>
									<b>CGPA:</b>
								</td> 
								<td>
									<input type="text" name="CGPA" value="<?php echo $row['CGPA'];?>">
								</td>
							</tr>
						<tr>
							<td>
								<b>Mobile:</b>
							</td> 
							<td>
								<input type="text" name="mobile" value="<?php echo $row['mobile'];?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" value="<?php echo $row['email'];?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" value="<?php echo $row['password'];?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark:</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" name="remark"><?php echo $row['remark'];?></textarea>
							</td>
						</tr><br>
						<tr>
							<td></td>
							<td>
								<input type="submit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			}
			?>
		</div>
		<?php
				if(isset($_POST['show_teacher']))
				{
					?>
					<center>
						<h5>Teacher's Details</h5>
						<table>
							<tr>
								<td id="td"><b>ID</b></td>
								<td id="td"><b>Name</b></td>
								<td id="td"><b>Mobile</b></td>
								<td id="td"><b>Courses</b></td>
								<td id="td"><b>View Detail</b></td>
							</tr>
						</table>
					</center>
					<?php
					$query = "select * from teacher";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
							?>
						<center>
						<table style="border-collapse: collapse;border: 1px solid black;">
							<tr>
								<td id="td"><?php echo $row['id']?></td>
								<td id="td"><?php echo $row['name']?></td>
								<td id="td"><?php echo $row['mobile']?></td>
								<td id="td"><?php echo $row['course']?></td>
								<td id="td"><a href="#">View</a></td>
							</tr>
						</table>
						</center>
						<?php
					}
				}
			?>

			<?php
				if(isset($_POST['student_marks']))
				{
					?>
					<center>
						<h5>student's marks</h5>
						<table>
							<tr>
									<td id="td"><b>Roll_no</b></td>
								<td id="td"><b>Bangla</b></td>
								<td id="td"><b>English</b></td>
								<td id="td"><b>Math</b></td>
								<td id="td"><b>Science</b></td>

								<td id="td"><b>Social_science</b></td>

								<td id="td"><b>Islam</b></td>
							</tr>
						</table>
					</center>
					<?php
					$query = "select * from student_marks";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
							?>
						<center>
						<table style="border-collapse: collapse;border: 1px solid black;">
							<tr>
								<td id="td"><?php echo $row['Roll_no']?></td>
								<td id="td"><?php echo $row['Bangla']?></td>
								<td id="td"><?php echo $row['English']?></td>
								<td id="td"><?php echo $row['Math']?></td>
								<td id="td"><?php echo $row['Science']?></td>
									<td id="td"><?php echo $row['Social_science']?></td>
								<td id="td"><?php echo $row['Islam']?></td>
							
						</table>
						</center>
						<?php
					}
				}
			?>
			</div>
	</div>
</body>
</html>