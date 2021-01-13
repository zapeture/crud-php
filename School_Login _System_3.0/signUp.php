<?php include('backend\backend.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> The School | SignUp</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style\style.css">
</head>
<body>
  
   

<div class="mnavbar">
  <a href="index.php" target="_self">Home</a>
  <a class="active" href="student.php" target="_self">SignUp</a>
  <a href="teacher.php" target="_self">Login</a>
</div>

<div class="centralize">

<div class="container1">
      <div class="form-wrap">
        <h1>Sign Up</h1>
        <p>This is for a first time </p>
        <form method="POST" action="signUp.php">

          <?php if(count($errors)>0): ?>
        <div class="alert alert-danger">
          <?php foreach ($errors as $error): ?>
             <li> <?php echo $error; ?> </li>
           <?php endforeach; ?>
        </div>
          <?php endif;  ?>

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
  

</body>
</html>