<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>School | Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
<div class="mnavbar">
	<a class="active" href="index.php" target="_self">Home</a>
  
</div>

<div class="card" style="width: 18rem;">
  <img src="images\pexels-christina-morillo-1181398.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Teachers</h5>
    <p class="card-text">Ability to Edit and Update Students Grades.</p>
    <a href="teacher.php" class="btn btn-secondary">Login</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <img src="images\pexels-oladimeji-ajegbile-3118214.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Students</h5>
    <p class="card-text">View Your Test Scores .</p>
    <a href="student.php" class="btn btn-secondary">Login</a>
  </div>
</div>


</body>
</html>