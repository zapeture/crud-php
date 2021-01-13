<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title> School | SignUp</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="mnavbar">
	<a href="index.php" target="_self">Home</a>
	<a href="login.php" target="_self">Login</a>
  <a class="active" href="#" target="_self">SignUp</a>
</div>

<div class="centralize">

<div class="container1">
      <div class="form-wrap">
        <h1>Sign Up</h1>
        <p>This is for a first time </p>
				<form method="POST" action="SignUp.php">
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
          <button type="submit" name="register_btn" class="btn">Sign Up</button>
         
          

        </form>
      </div>
    </div>

    </div>


</form>
</body>
</html>