<?php include('backend\backend.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School |Student</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style\style.css">
<link rel="stylesheet" href="style\style2.css">
</head>
<body>

 

<div class="mnavbar">
  <a href="index.php" target="_self">Home</a>
  <a class="active" href="student.php" target="_self">Student</a>
  <a href="teacher.php" target="_self">Teacher</a>
</div>

<div class="container4">
      <div class="row">
        <div class="col-md-4 form-div login" >
        <?php if(isset($_SESSION['message'])): ?>
          <div class="alert alert-success">
             <?php echo $_SESSION['message'];
                  unset($_SESSION['message']);
                  unset($_SESSION['alert-class']);
             ?>

            
           </div>

           <?php endif; ?>
           <h3>Welcome, <?php  echo $_SESSION['username']; ?></h3>
            <div class="logoutbtn">
            <a class="logout" href="index.php?logout=1">Logout</a>
            </div>
             <?php if(!$_SESSION['verified']): ?>
            <div class="verification">
              <p>You need to verify your Account   Signin to your email 
                account and click the verification link</p> 
              <strong> <?php echo $_SESSION['Email_Address'];?></strong>
            </div>
            <?php endif; ?>
            
            <?php if($_SESSION['verified']): ?>
              <button class="btn btn-block btn-lg btn-primary ">I am verified</button>
              <?php endif; ?>

        </div>
      </div>
    </div>


</body>
</html>