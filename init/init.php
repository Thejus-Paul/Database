<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Database 0.3</title>
	<link rel="stylesheet" href="init.css"/>
</head>
<body>
	<br><br>
<center>
  <a href="init.php?xampp=true"> XAMPP Webserver </a><!-- Quick Link for XAMPP users  -->
  <a href="init.php?usbwebserver=true"> USB Webserver </a><br><br><!-- Quick Link for USBWebServer users  -->
</center>
<!-- Form to input username,password and host address for other MySQL Servers -->
<div class="wrapper">
  <form method="get" name="other_webservers"><br><!-- Direct Method for other mysql webservers  -->
			<input type="text" name="username" placeholder="Username"/><br><br><!-- Username for MySQL Database  -->
    	<input type="password" name="password" placeholder="Password"/><br><br><!--  Password for MySQL Database -->
    	<input type="text" name="host" placeholder="Host Address"/><br><br><!-- Host Address for MySQL Database eg: localhost  -->
    	<button type="submit"> Proceed </button>
  </form>
</div>
<!-- From Here the rest is PHP  -->
<div id="continue">
<?php
	$myfile = fopen("init.txt","w");/* Creating a text file named "logindetails" to write the username,password and host address */
	@$xampp = $_GET['xampp'];/* When XAMPP Link is clicked, this variable will have value = true.  */
	@$usbwebserver = $_GET['usbwebserver'];/*  When usbwebserver Link is clicked, this variable will have value = true. */
	if($xampp){/* If $xampp is true, then this if statement will be executed.  */
			fwrite($myfile,"root\n");/* Writing 'root\n' into logindetails.txt, This is the default username for XAMPP MySQL Server. '\n' will write the next entry in a new line  */
			fwrite($myfile,"\n");/* Since there is no password for XAMPP MySQL Server as default. We will go to next line  */
			fwrite($myfile,"localhost\n");/* Writing 'localhost' as the default host address.  */
			echo "<center><br><a href='../index.php'> Continue </a></center>";
	}
	elseif ($usbwebserver){/* If $usbwebserver is true, then this elseif statement will be executed.  */
		fwrite($myfile,"root\n");/* 'root' as the default username for Usb Web Server.*/
		fwrite($myfile,"usbw\n");/* 'usbw' as the default password for Usb Web Server.*/
		fwrite($myfile,"localhost\n");/* 'localhost' as the default host address for Usb Web Server.*/
		echo "<center><br><a href='../index.php'> Continue </a></center>";
		}
	else{/*This statement will be executed when we press the 'submit' button  */
		@$username = $_GET['username']."\n";/* Username for your MySQL Server. This and below are taken from the form using GET method.*/
		@$password = $_GET['password']."\n";/* Password for your MySQL Server.*/
		@$host = $_GET['host']."\n";/* Host Address for your MySQL Server.*/
		fwrite($myfile,$username);/* Writing the username to the file.*/
		fwrite($myfile,$password);/* Writing the password to the file.*/
		fwrite($myfile,$host);/* Writing the host address to the file.*/
		echo "<center><br><a href='../index.php'> Continue </a></center>";
	}
	fclose($myfile);// Closing the file as to prevent file corruption.
?>
</div>
</body>
</html>
