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
include "space_db_login.php";
$connect = mysqli_connect($server, $username, $password, $dbname);
if (mysqli_connect_errno())
	die ("Connection Failed:". $con-> connect_error);

$login = $row['login'];
$password = $row['password'];

$login = "SELECT username, password FROM 2020S_rha.login_data where username='$login' and password = '$password' ";
$result = mysqli_query($connect, $login);
$success = " ";

if (isset($_POST['login']) && isset($_POST['password']))
{
	while($row = mysqli_fetch_array($result))
	{
		if ($_POST['login'] == $login && $_POST['password'] == $password)
		{
			// After user susccesfully login show the video live stream with the information
			echo "<h5>hello world</h5>";
		}
		if ($_POST['login'] == $login && $_POST['password'] != $password)
			die("Username is in the Database, but the password is not!");
		if ($_POST['login'] != $login && $_POST['password'] == $password)
			die("Username is not in the Database, but the password is!");
		if ($success == "true")
			break;
	}
	if ($success == " ")
		die ("Login is not in the database!");
}
mysqli_close($connect);

?>
</body>
</html>



