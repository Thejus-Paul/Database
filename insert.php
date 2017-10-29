<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8">
	<title>Adding New - Database v0.2</title>
	<link rel="stylesheet" href="insert.css">
</head>
<body>

<!-- Getting the Details of New Movie,Anime or TV series -->
<form method="get" name="form">
	Name:<input type="text" name="name"><br><br> <!-- Name Insertion -->
	Type:
	<select name="type_of_file"><!-- Selecting the Type of file -->
		<option onClick="check_series()">movies</option><!-- onClick calls the function to check if it is series or not-->
		<option onClick="check_series()">television</option>
		<option onClick="check_series()">anime</option>
	</select><br><br>
	Number of Episodes:<input type="Number" name="no_of_ep" disabled><br><br><!-- Inserting Number of Episodes(I will be adding a JavaScript Function to check if the selected type is series or not.For movies this feature will be disabled) -->
	Date of Release:<input type="Date" name="date_of_release"><br><br><!-- Date of Release in order to search for the latest Added -->
	Language:<input type="text" name="language"><br><br><!-- Language of the video (Now only applicable to Movies.If you want this for Television or Anime then add a new column in mysql and edit '$sql' in PHP) -->
	Format of the File<input type="text" name="format"><br><br><!-- Format of the file,Example: mp4,mkv. -->
	<input type="submit" name="insert_submit" value="Add/Insert" onClick="check_series()"><!-- Submit Button -->
</form>

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

$user = 'root';// Username of MySQL server
$pass = 'usbw';// Password of MySQL server
$host = 'localhost';// Server Name of MySQL server
$db = 'videos';// Database of MySQL server

$conn = mysql_connect($host,$user,$pass);// Connecting to MySQL server.

if(!$conn){echo 'Error: MySQL connection Failed!';}// If any error in connecting to MySQl, then this code will be executed.

$sel_db = mysql_select_db($db);// Selecting the Required Database from MySQL.
if(!$sel_db){echo '\nError:Database connection Failed!';}// If any error in connecting to MySQl Database, then this code will be executed.

if($type_of_file == "movies"){
	$sql = "INSERT INTO `videos`.`".$type_of_file."` (`id`, `name`, `date`, `lang`, `format`, `type`) VALUES (NULL, '".$name."', '".$date_of_release."', '".$language."', '".$format."', '".$type_of_file."')";
	$query = mysql_query($sql);
}
else{
	$sql = "INSERT INTO `videos`.`".$type_of_file."` (`id`, `name`, `episode`, `date`, `format`, `type`) VALUES (NULL, '".$name."', '".$no_of_ep."', '".$date_of_release."', '".$format."', '".$type_of_file."')";
	$query = mysql_query($sql);
}

?>
</body>
</html>
