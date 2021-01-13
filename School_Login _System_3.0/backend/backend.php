<?php 
session_start();
// includes files to connect to data base
require 'db.php';
//varable decleration
$errors = array();
$firstName = "";
$lastName = "";
$middleName = "";
$homeAddress = "";
$email = "";
$postalCode = "";
$position = "";

// call the signup() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
  // call these variables with the global keyword to make them available in function
  
  global $conn,$errors,$firstName,$firstName,$lastName,$middleName,$homeAddress,$email,$postalCode,$position;

  // receive all input values from the form. Call the e() function
  // defined below to escape form values
  
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $middleName = $_POST['middleName'];
  $homeAddress = $_POST['homeAddress'];
  $email = $_POST['email'];
  $postalCode = $_POST['postalCode'];
  $position = $_POST['position'];
  $password = $_POST['password'];
  $password_Auth = $_POST['password_Auth'];

  // form validation: ensure that the form is correctly filled
  if (empty($firstName))
    {$errors['firstName'] = "First Name Required";}

    if (empty($lastName))
    {$errors['lastName'] = "Last Name Required";}

    if (empty($homeAddress))
    {$errors['homeAddress'] = "Home Address Required";}

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {$errors['email'] = "Email Address is invalid";}

    if (empty($email))
    {$errors['email'] = "Email Address Required";}

    if (empty($postalCode))
    {$errors['postalCode'] = "Postal Code Required";}

    if (empty($password))
    {$errors['password'] = "Password Required";}

    if ($password !== $password_Auth)
    {$errors['password'] = "The Two Passwords dont Match ";}
     
    $emailQuery = "SELECT * FROM personal_information WHERE Email_Address=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0)
        {
          $errors['email'] = "Email Already Exists";
        }

    // register user if there are no errors in the form
    if (count($errors) === 0 )
      $password = password_hash($password,PASSWORD_DEFAULT);
      $token = bin2hex(random_bytes(50));
      $verified = false;

    {

    if (isset($_POST['position'])) {
      $position = ($_POST['position']);
      $sql = "INSERT INTO personal_information (First_Name , Last_Name , Middle_Name , Email_Address , Home_Address ,	Postal_Code , position , password , token,	verified) VALUES (?,?,?,?,?,?,?,?,?,?) ";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('sssssssssb',$firstName,$lastName,$middleName,$email,$homeAddress,$postalCode,$position,$password,$token, $verified);
      
      if ($stmt->execute())
          {
          //login user
          $user_id = $conn->insert_id;
          $_SESSION['id'] = $user_id;
          $_SESSION['firstName'] = $firstName;
          $_SESSION['position'] = $position['position'];
          $_SESSION['email'] = $email;
          $_SESSION['verified'] = $verified;
          //flash message
          $_SESSION['message'] = "You Are Now Logged In";
          $_SESSION['alert-class'] = "alert-success";
          header('location:Teacher.php');
          exit();
          }

          else
          {
            $position = ($_POST['position']);
            $sql = "INSERT INTO personal_information (First_Name , Last_Name , Middle_Name , Email_Address , Home_Address ,	Postal_Code , position , password , token,	verified) VALUES (?,?,?,?,?,?,?,?,?,?) ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssssssssb',$firstName,$lastName,$middleName,$email,$homeAddress,$postalCode,'student',$password,$token, $verified);
            
            if ($stmt->execute())
                {
                //login user
                $user_id = $conn->insert_id;
                $_SESSION['id'] = $user_id;
                $_SESSION['firstName'] = $firstName;
                $_SESSION['position'] = $position['position'];
                $_SESSION['email'] = $email;
                $_SESSION['verified'] = $verified;
                //flash message
                $_SESSION['message'] = "You Are Now Logged In";
                $_SESSION['alert-class'] = "alert-success";
                header('location:student.php');
                exit();
                }
            }
      
          }
        //  else{
        //  $errors['db_error'] = "Database error: failed to register";
		    //  }
  }
}

//

