<?php 
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: Login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: Login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>School | Teacher</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<div class="mnavbar">
	<a href="index.php" target="_self">Home</a>
	<a href="Login.php" target="_self">Login</a>
  <a  href="SignUp.php" target="_self">SignUp</a>
  <a class="active"  href="#" target="_self">Teacher</a>
</div>

	<div class="header">
		<h2>School |Teacher</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  >(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" class="redlogout">Logout</a>
											 <a style="color:white" href="create_user.php" class="redlogout">Add Student/Teacher</a>
											 <a href="gradeEditor.php" class="redlogout">Edit Student Grades</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>

	<?php 
            $db = mysqli_connect('localhost', 'root', '', 'school_login_system_2021');
            $query = "SELECT * FROM personal_information";
            $results = mysqli_query($db, $query);
            //pre_r($results);
            ?>

	<table class="teachers-info">
	<tr>
    <th colspan="9" >Student Score Sheet</th>
  </tr>
  <tr>
	<th>ID</th>
    <th>Name</th>
    <th>Surname</th>
    <th>English</th>
    <th>Polish</th>
    <th>Biology</th>
    <th>Art</th>
    <th>History</th>
   
  </tr>
  <?php while ($row = $results->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['First_Name']?></td>
    <td><?php echo $row['Last_Name']?></td>
    <td><?php echo $row['english']?></td>
    <td><?php echo $row['polish']?></td>
    <td><?php echo $row['biology']?></td>
    <td><?php echo $row['art']?></td>
    <td><?php echo $row['history']?></td>
    
  </tr>
  <?php endwhile; ?>
 
</table>
<?php 
           function pre_r($array)
            {
              echo '<pre>';
              print_r($array);
              echo '</pre>';
            }
            ?>
	
</body>
</html>