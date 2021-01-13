<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'school_login_system_2021');

// variable declaration
$username = "";
$email    = "";
$firstName = "";
$lastName = "";
$middleName = "";
$postalCode = "";
$homeAddress = "";
$english ="";
$polish ="";
$history ="";
$art ="";
$id = "";
$biology ="";
$update = false;
$errors   = array(); 

//call the delete function
if (isset($_GET['delete']))
{
	 delete();
}
//delete grades
function delete(){

	global $db, $errors,$id,$username, $email,$firstName,$lastName,$middleName,$postalCode,$homeAddress;

	$id = $_GET['delete'];
	$query ="DELETE FROM personal_information WHERE id=$id";
 
  mysqli_query($db, $query);

	$_SESSION['message'] = "Record Has Been Deleted";
	$_SESSION['msg_type'] = "danger";
  header("location: gradeEditor.php");
}


//call the SAVE function
if (isset($_GET['edit']))
{
	 edit();
}
//edit grades
function edit(){
	
	global $db,$english,$polish,$art,$biology,$history,$id,$update;

	$id = $_GET['edit'];
	$update = true;
	$query = ("SELECT * FROM personal_information WHERE id=$id");
	$result = mysqli_query($db, $query);
	
	if($result->num_rows)
	{
		 $row = $result->fetch_array();
     $english = $row['english'];
	   $polish = $row['polish'];
     $art = $row['art'];
	   $biology = $row['biology'];
	   $history = $row['history'];
	}

}


// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email,$firstName,$lastName,$middleName,$postalCode,$homeAddress;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username  =  e($_POST['username']);
	$email =  e($_POST['email']);
  $firstName = e($_POST['firstName']);
  $lastName = e($_POST['lastName']);
  $middleName = e($_POST['middleName']);
  $homeAddress = e($_POST['homeAddress']);
  $postalCode = e($_POST['postalCode']);
	$password  =  e($_POST['password']);
	$password_Auth  =  e($_POST['password_Auth']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($firstName)) { 
		array_push($errors, "First Name is required"); 
	}
	if (empty($lastName)) { 
		array_push($errors, "Last Name is required"); 
	}
	if (empty($homeAddress)) { 
		array_push($errors, "Home Address is required"); 
	}
	if (empty($middleName)) { 
		array_push($errors, "Middle Name is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($postalCode)) { 
		array_push($errors, "Postal Code is required"); 
	}
	if (empty($password)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password != $password_Auth) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO personal_information (username, email, user_type, password,First_name, Last_Name,Middle_Name,Postal_code,Home_Address) 
					  VALUES('$username', '$email', '$user_type', '$password','$firstName','$lastName','$middleName','$postalCode','$homeAddress')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: Teacher.php');
		}

   

		else{
			$query = "INSERT INTO personal_information (username, email, user_type, password,First_name, Last_Name,Middle_Name,Postal_code,Home_Address) 
					  VALUES('$username', '$email', 'user', '$password','$firstName','$lastName','$middleName','$postalCode','$homeAddress')";
			      mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: Student.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM personal_information WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}



// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: Login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM personal_information WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: Teacher.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: Student.php');
			}	
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

if (isset($_POST['update'])){
  $id = $_POST['id'];
	$english = $_POST['english'];
	$polish = $_POST['polish'];
	$art = $_POST['art'];
	$biology = $_POST['biology'];
	$history = $_POST['history'];

  $query = " UPDATE personal_information SET english ='$english', polish ='$polish',art = '$art',biology='$biology',history='$history' WHERE id=$id";

	mysqli_query($db, $query);

  $_SESSION['message'] = "Record Has Been Updated" ;
  $_SESSION['msg_type'] = "warning" ;

  header("location: gradeEditor.php");
}
