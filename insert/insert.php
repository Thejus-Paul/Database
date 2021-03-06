<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8">
	<title>Adding New - Database v0.3</title>
	<link rel="stylesheet" href="insert.css">
</head>
<body>

<!-- Getting the Details of New Movie,Anime or TV series -->
<div class="insertion_form">
	<form method="get" name="form">
		Name:<input type="text" name="name"><br><br><br> <!-- Name Insertion -->
		Type:
		<select name="type_of_file"><!-- Selecting the Type of file -->
			<option onClick="check_series()">movies</option><!-- onClick calls the function to check if it is series or not-->
			<option onClick="check_series()">television</option>
			<option onClick="check_series()">anime</option>
		</select><br><br><br>
		Number of Episodes:<input type="Number" name="no_of_ep" id="no_of_ep" disabled><br><br><br><!-- Inserting Number of Episodes(I will be adding a JavaScript Function to check if the selected type is series or not.For movies this feature will be disabled) -->
		Date of Release:<input type="Date" name="date_of_release"><br><br><br><!-- Date of Release in order to search for the latest Added -->
		Language:<input type="text" name="language" id="language"><br><br><br><!-- Language of the video (Now only applicable to Movies.If you want this for Television or Anime then add a new column in mysql and edit '$sql' in PHP) -->
		Format of the File:<input type="text" name="format"><br><br><br><!-- Format of the file,Example: mp4,mkv. -->
		Image :<input type="file" name="image_input"></input><br><br><br>
		<button onClick="check_series()">Insert</button><!-- Submit Button -->
	</form>
</div>

<script type="text/JavaScript">
/* Function to check whether the options in 'type_of_file' are series type or not.If not, then the 'no_of_ep' will be disabled. */
function check_series(){
	selected_type = document.form.type_of_file.selectedIndex;//takes the number corresponding to the dropdown box in 'type_of_file'.
	no_of_ep = document.form.no_of_ep;//Selecting the tag of 'no_of_ep'.
	language = document.form.language;//Selecting the tag of 'language'.
	if(selected_type===1||selected_type===2){
		no_of_ep.disabled = false;
		language.disabled = true;
	}//checking whether the given option is TV series or Anime. If true, then 'no_of_ep' will be enabled and 'language' will be disabled.
	else{
		no_of_ep.disabled = true;
		language.disabled = false;
	}//If false, then 'no_of_ep' will remain disabled and also language will be enabled.
}
</script>


<?php
/* Getting all the typed through GET function and storing it in PHP variables.(same name is used for better understanding.) */
@$name = $_GET['name'];// @ is used to remove the initial error occured when there is no value for it.
@$type_of_file = $_GET['type_of_file'];// @ - same as above
@$no_of_ep = $_GET['no_of_ep'];// @ - same as above
@$date_of_release = $_GET['date_of_release'];// @ - same as above
@$format = $_GET['format'];// @ - same as above
@$language = $_GET['language'];// @ - same as above

$file_open = fopen("../init/init.txt","r");// Opening the file for MySQLi login.

if($file_open){
	$user = trim(fgets($file_open),"\n");// Taking the text from the line and removing the '\n'. This takes the username.
	$pass = trim(fgets($file_open),"\n");// Taking the text from the line and removing the '\n'. This takes the password.
	$server = trim(fgets($file_open),"\n");// Taking the text from the line and removing the '\n'. This takes the host address.
	}
$db = 'videos';// Database of MySQL server

$conn = mysqli_connect($server,$user,$pass);// Connecting to MySQL server.

if(!$conn){echo 'Error: MySQL connection Failed!';}// If any error in connecting to MySQl, then this code will be executed.

$sel_db = mysqli_select_db($conn,$db);// Selecting the Required Database from MySQL.
if(!$sel_db){echo '\nError:Database connection Failed!';}// If any error in connecting to MySQl Database, then this code will be executed.

if($type_of_file == "movies"){// Checks if type of file is movies and then sends the sql query to MySQL server.
	$sql = "INSERT INTO `videos`.`".$type_of_file."` (`id`, `name`, `date`, `lang`, `format`, `type`) VALUES (NULL, '".$name."', '".$date_of_release."', '".$language."', '".$format."', '".$type_of_file."')";
	$query = mysqli_query($conn,$sql);// Sending the above query to MySQL server.
}
else{// This if and else statements are implemented since anime and television have episodes which movies doesn't.
	$sql = "INSERT INTO `videos`.`".$type_of_file."` (`id`, `name`, `episode`, `date`, `format`, `type`) VALUES (NULL, '".$name."', '".$no_of_ep."', '".$date_of_release."', '".$format."', '".$type_of_file."')";
	$query = mysqli_query($conn,$sql);// Sending the above query to MySQL server.
}

?>
</body>
</html>
