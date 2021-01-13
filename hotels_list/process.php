<?php

session_start();

$mysqli = new mysqli('localhost','root','','hotels_project2020-2021') or die(mysqli_error($mysqli));
$id = 0;
$update = false;
$hotel_Name = '';
$id = '';
$email = '';
$city = '';
$country = '';
$rating = '';

if(isset($_POST['save'])){

  $id = $_POST['id'];
  $hotel_Name = $_POST['hotel_Name'];
  $email = $_POST['email'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $rating = $_POST['rating'];
  
  $mysqli->query("INSERT INTO hotel_list(id , hotel_Name , email , city, country , rating ) VALUES ('$id','$hotel_Name',' $email','$city','$country','$rating')") or die($mysqli->error);
  
  $_SESSION['message'] = "Record Has Been Created" ;
  $_SESSION['msg_type'] = "success" ;

      header("location: index.php");
}

if(isset($_GET['delete']))
{
  $id = $_GET['delete'];

  $mysqli->query("DELETE FROM hotel_list WHERE id=$id") or die($mysqli->error);

  $_SESSION['message'] = "Record Has Been Deleted" ;
  $_SESSION['msg_type'] = "danger" ;

  header("location: index.php");
}

if(isset($_GET['edit']))
{$id = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM hotel_list WHERE id=$id") or die($mysqli->error);

  if($result->num_rows){
    $row = $result->fetch_array();
    $id = $row['id'];
    $hotel_Name = $row['hotel_Name'];
    $email = $row['email'];
    $city = $row['city'];
    $country = $row['country'];
    $rating = $row['rating'];

  }

}

if (isset($_POST['update'])){
  $id = $_POST['id'];
  $hotel_Name = $_POST['hotel_Name'];
  $email = $_POST['email'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $rating = $_POST['rating'];

  $mysqli->query("UPDATE hotel_list SET hotel_Name ='$hotel_Name',email ='$email',city = '$city',country='$country',rating='$rating ' WHERE id=$id") or die($mysqli->error);

  $_SESSION['message'] = "Record Has Been Updated" ;
  $_SESSION['msg_type'] = "warning" ;

  header("location: index.php");
}
