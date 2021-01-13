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
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<?php 

if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php 
echo $_SESSION['message'];
unset( $_SESSION['message']);
?>
</div>
<?php endif ?>
<div class="mnavbar">
	<a href="index.php" target="_self">Home</a>
	<a href="Login.php" target="_self">Login</a>
  <a  href="SignUp.php" target="_self">SignUp</a>
  <a class="active"  href="Teacher.php" target="_self">Teacher</a>
  <a class="active"  href="#" target="_self">Grade Editor</a>
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
			      <a href="create_user.php" class="redlogout">Add Student or Teacher</a>
											 
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
    <th colspan="3" >Action</th>
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
    <td><a href="gradeEditor.php?edit=<?php echo $row['id']?>" class="redlogout">Edit</a>
    <a href="functions.php?delete=<?php echo $row['id']?>" class="redlogout">Delete</a>
  </td>
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
<div class="container6">
      <div class="form-wrap">
        <h1>Edit</h1>
        <p>Change Student Scores Here</p>

        <form method="POST" action="gradeEditor.php">

        <input type="hidden"  name="id"  value="<?php echo $id; ?>"/>

          <div class="form-group">
            <label for="english">English</label>
            <input type="text" value="<?php echo $english; ?>" name="english" id="english" />
          </div>
          
          <div class="form-group">
            <label for="polish">Polish</label>
            <input type="text" value="<?php echo $polish; ?>" name="polish" id="polish" />
          </div>
        
          <div class="form-group">
            <label for="biology">Biology</label>
            <input type="text" value="<?php echo $biology; ?>" name="biology" id="biology" />
          </div>

          <div class="form-group">
            <label for="art">Art</label>
            <input type="text" value="<?php echo $art; ?>" name="art" id="art" />
          </div>

          <div class="form-group">
            <label for="history">History</label>
            <input type="text" name="history" value="<?php echo $history; ?>" id="history" />
          </div>

          <div class="form-group">
          <?php
            if ($update == true):
          ?>
           <button type="submit" name="update" class="btn btn-warning">Update</button>
            <?php else: ?>
          <button type="submit" name="" class="btn btn-success">Save</button>
            <?php endif; ?>
            </div>
          
        </form>
      </div>
      
    </div>

</body>
</html>