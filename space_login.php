<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> Main Screen </title>
	
	<!-- Adding Bootsrap for better looks -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Adding Font from Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">

	<!-- Styling section -->
	<style>
	body {
		font-family: 'Barlow', sans-serif;
		text-align: center;
		/* Background from https://uigradients.com/ */
		background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}
	</style>
</head>
<body>
<?php
////////////////////////////// BEGANING OF THE PROJECT ////////////////////////////////////
    
// Database's information
include "space_db_login.php";

// Connecting SQL to database
$connection = mysqli_connect($server, $username, $password, $dbname);
if (mysqli_connect_errno())
die ("Connection Failed:". $connect-> connect_error);

// Connecting loging from Capstone_Login.html, Setting up information for the log in
$login = $_POST['login'];
$password = $_POST['password'];

// Connecting SQL to check for authentication
$query = "SELECT * FROM login_data WHERE username='$login' and password= '$password' ";

$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
$count_row=mysqli_num_rows($result); 

if (($row['username']== $login) && ($row['password']== $password))
  {
	session_start();
	echo "<h1>Hello World</h1>";
	$username = $row["first_name"];
	echo "<h1>Welcome user $username </h1>";
  }

  else {
	  echo "conection failed";
  }
?>
</body>
</html>



