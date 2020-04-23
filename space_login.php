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
		
		opacity: 0;
		transition: opacity 3s;
		text-transform: uppercase;
		/* Background from https://uigradients.com/ */
		background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}
	a{
		border: none;
    	background: none;
    	text-transform: uppercase;
    	font-weight: 680;
		color: white;
    	letter-spacing: 1px;
    	font-size: inherit;
		transition: all 0.5s;  /* This gives the fading animation*/
		padding-top: 15px;
		padding-left:15px;
		padding-right:15px;
		padding-bottom:9px;

   		/* To work in most of the platform as possible */
    	-webkit-transition: all 0.5s;
    	-moz-transition: all 0.5;
		text-decoration: none;
		position: relative;
		top: 5px;
		}

		a:hover {
			color:black;
			background: white;
			text-decoration: none;
		}

	.options {
		background: black;
    	height: 35px;
    	text-align: right;
		}

	h1 {
		padding-left: 10px;
	}	

	img {
		width: 200px;
		height: 155px;
		opacity: 0.8;
		padding-top: 35px;
	}

	.columnFeatures {
  		display:table-cell;
  		width:440px;
  		padding-right:85px;
		padding-bottom:20px;
		padding-left: 50px;
		text-align: center;
		float:left; 
		background-color: white;
		margin: auto;
		padding-bottom:220px;
	}

	.columnPeople {
	text-align: center;
  	display:table-cell;
	width:870px;
	height: 500px;
	padding-top: 16px;
	padding-left:150px;
	padding-bottom: 100px;
  	line-height:25px;
 	font-size:12px;

	.fontSubtle {
  		color:lightslategrey;
	}

	.fontBold {
  	font-weight:200;
	}
}

</style>
</head>

<body onload="document.body.style.opacity='1'">


<?php
////////////////////////////// BEGANING OF THE PROJECT ////////////////////////////////////

// Database's information
include "space_db_login.php";

// Connecting SQL to database
$connection = mysqli_connect($server, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    die("Connection Failed:" . $connect->connect_error);
}

// Connecting loging from Capstone_Login.html, Setting up information for the log in
$login = $_POST['login'];
$password = $_POST['password'];

// Connecting SQL to check for authentication
$query = "SELECT * FROM login_data WHERE username='$login' and password= '$password' ";

$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
$count_row = mysqli_num_rows($result);

// Checking for login and password to be correct
if (($row['username'] == $login) && ($row['password'] == $password)) {
    session_start();
	$username = $row["first_name"];

	// Logout option
echo "
  <div class='options'>
   	 <a href='Capstone_Front.html'> Logout </a>
    </div> ";

	// Right column, and video
	echo "
	<div class='columnFeatures'>
	<br> 
	<br>
	<br>
		<div>
		<img src='spacevulture.png'>

		<h3> Who we are? </h3>
		<p class='fontSubtle' ><strong>Space volture</strong> seeks to create tools capable of providing valuable analytics in order to help students, faculty, and
		  campus officials to solve the constant parking ailments on campus, by using the team members’ skills in several languages and computer science disciplines.</p>

	  <div>
	   		<h3> Collaborators: </h3>
	    	<div class='fontSubtle'>
		  		<span class='fontBold'>Liam J Allen: </span> Back-end<br>
		  		<span class='fontBold'> Robert Hernandez: </span> Front & Back-end<br>
				<span class='fontBold'> Seth Russell: </span> Back-end<br><span >
			</div>
	 	</div>
    </div>
</div>

<div class='columnPeople'>
<br>
	<h1>Welcome $username </h1>
	<br>
	<br>
	<div class='embed-responsive embed-responsive-16by9'>
  <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/zpOULjyy-n8?rel=0' allowfullscreen></iframe>
</div>
</div>
";
  
}

// if not matches occur, send message.
else {
    echo "
			 <div <body style='padding-top: 20px; text-align:center;'>
			 	<h4> Sorry username or password do not match to our records!</h4>
				<h4> Usernane: $login ---- Password: $password</h4>
				<h4> Click <a href='Capstone_Login.html'> Here <a> to login again.</h4>
			 </div>
	  ";
}
?>

</body>
</html>



