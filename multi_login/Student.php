<?php 
  include('functions.php');
  
  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>School | Student </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<div class="mnavbar">
	<a href="index.php" target="_self">Home</a>
	<a href="Login.php" target="_self">Login</a>
  <a  href="SignUp.php" target="_self">SignUp</a>
  <a class="active"  href="#" target="_self">Student</a>
</div>
	<div class="header">
		<h2>Student Page</h2>
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
						<i >(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a  href="Student.php?logout='1'" class="redlogout">Logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>

  
            
<table id="grades-info">
<tr>
    <th colspan="9" >My Grades</th>
  </tr>
  <tr>
    <th>Name</th>
    <th>Surname</th>
    <th>English</th>
    <th>Polish</th>
    <th>Biology</th>
    <th>Art</th>
    <th>History</th>
   
  </tr>
  <tr>
    <td><?php echo $_SESSION['user']['First_Name'];?></td>
    <td><?php echo $_SESSION['user']['Last_Name'];?></td>
    <td><?php echo $_SESSION['user']['english'];?></td>
    <td><?php echo $_SESSION['user']['polish'];?></td>
    <td><?php echo $_SESSION['user']['biology'];?></td>
    <td><?php echo $_SESSION['user']['art'];?></td>
    <td><?php echo $_SESSION['user']['history'];?></td>
    
  </tr>

</table>


</body>
</html>