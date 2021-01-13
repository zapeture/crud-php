<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Teacher | Create Student</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="mnavbar">
	<a href="index.php" target="_self">Home</a>
	<a href="Login.php" target="_self">Login</a>
	<a  href="SignUp.php" target="_self">SignUp</a>
	<a  href="Teacher.php" target="_self">Teacher</a>
  <a class="active"  href="#" target="_self">Teacher | Create Student </a>
  <a href="Student.php" target="_self">Student</a>
</div>

	
	<div class="container1">
      <div class="form-wrap">
        <h1>Create a New User</h1>
        <p>As A Teacher You Have Elevated Permissions</p>
        <form method="POST" action="create_user.php">

				<?php echo display_error(); ?>

        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" value="<?php echo $firstName; ?>" name="firstName" id="first-name" />
          </div>
          <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" value="<?php echo $lastName; ?>" name="lastName" id="last-name" />
          </div>
          <div class="form-group">
            <label for="middleName">Middle Name</label>
            <input type="text" value="<?php echo $middleName; ?>" name="middleName" id="middle-name" />
					</div>
					<div class="form-group">
            <label for="username">Username</label>
            <input type="text" value="<?php echo $username; ?>" name="username" id="username" />
          </div>
          <div class="form-group">
            <label for="homeAddress">Home Address</label>
            <input type="text" value="<?php echo $homeAddress; ?>" name="homeAddress" id="home-address" />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" value="<?php echo $email; ?>"  name="email" id="email" />
          </div>
          <div class="form-group">
            <label for="position">Position</label>
            <select id="position" name="user_type" id="user_type">
            <option  selected>Please Select Position !!</option>
            <option value="user" >Student</option>
             <option value="admin">Teacher</option>
             </select>

          </div>
          <div class="form-group">
            <label for="postalCode">Postal Code</label>
            <input type="text" value="<?php echo $postalCode; ?>" name="postalCode" id="postal-Code" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
          </div>
          <div class="form-group">
            <label for="password_Auth">Confirm Password</label>
            <input type="password" name="password_Auth" id="password_Auth" />
          </div>
          <button type="submit" class="btn" name="register_btn"> + Create user</button>
         
        </form>
      </div>
    </div>



</body>
</html>