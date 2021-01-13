<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
<div class="mnavbar">
	<a href="index.php" target="_self">Home</a>
	<a class="active" href="#" target="_self">Login</a>
</div>


<div class="container2">
      <div class="form-wrap">
        <h1>Login</h1>
        <p>You must already Have an Account</p>
        
        <form method="POST" action="Login.php">

        
        <?php echo display_error(); ?>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
          </div>
          <button type="submit" name="login" class="btn">Login</button>
          
          <footer>
           <p>Are you a New Student ? <a href="SignUp.php">SignUp Here</a></p>
         </footer>

        </form>
      </div>
      
    </div>


</body>
</html>