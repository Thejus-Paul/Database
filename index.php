<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Database 0.3</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!-- Navigation Bar -->

<div class='nav'>
	<form method="get" action="index.php">
		<ul>
			<span><a href="index.php">Database</a></span>
			<li><a href="insert\insert.php">New</a></li>
			<li><a href="index.php?anime=true">Anime</a></li>
			<li><a href="index.php?television=true">Television</a></li>
			<li><a href="index.php?movies=true">Movies</a></li>
		</ul>
	</form>
</div>

<!-- Form for the search box and button -->

<div class="search">
	<form method="get" action="index.php">
		<input type="text" name="name" placeholder="Search">
		<input type="submit" name="submit" value="Search">
		<br><br>
	</form>
</div>

<!-- Displaying the Content using the MySQL Database -->

<div class="content">
	<?php

	$file_open = fopen("/init/init.txt","r");

	if($file_open){
		$user = trim(fgets($file_open),"\n");
		$pass = trim(fgets($file_open),"\n");
		$server = trim(fgets($file_open),"\n");
		}

	$db = "videos";

	@$search_name = $_GET['name'];// @ to cancel the error forming due to no initial Value.
	@$sel_anime_name = $_GET['sel_anime_name'];
	@$sel_tv_name = $_GET['sel_tv_name'];

	@$db_handle = mysql_connect($server,$user,$pass);// Connecting to MySQL.
	if(!$db_handle)
		echo "Couldn't connect to MySQL!</br>";

	$db_sel = mysql_select_db($db);// Selecting the Video Database.($db)
	if(!$db_sel)
		echo "Couldn't connect to MySQL Database!</br>";

	if(@$_GET['submit'])// This condition is created since all elements in the MySQL Database is always displayed before we start searching.
		search();

/* Search Function */

	function search()
	{
		if($GLOBALS['db_sel'])
		{
			$sql = "select * from anime where name like '%".$GLOBALS['search_name']."%' union select * from movies where name like '%".$GLOBALS['search_name']."%' union select * from television where name like '%".$GLOBALS['search_name']."%'";// Searching the anime using search box
			$query = mysql_query($sql);// Passing the query to MySQL
			while($record = mysql_fetch_array($query))// Fetching the output of the query
			{
				echo "<div class='box'>";
				if($record['type'] == "anime")//In MySQL Database, 'type' was used to identify whether the search query is a movie,television or an anime.
					echo "<a href='index.php?sel_anime_name=".$record['name']."'><img src='./img/".$record['name'].".jpg'></a>";//Displaying the Images of the Search query.
				if($record['type'] == "movies")
						echo "<a href='./Database/Videos/Movies/".$record['name']."/".$record['name'].".".$record['format']."'><img src='./img/".$record['name'].".jpg'></a>";
				if($record['type'] == "television")
						echo "<a href='index.php?sel_tv_name=".$record['name']."'><img src='./img/".$record['name'].".jpg'></a>";
				echo "<br><label>". $record['name']. "</label>";//To Display the Name under the Image.
				echo "</div>";
			}
		}
	}

	if(isset($sel_anime_name))//To call the function when a specific anime is clicked.
		sel_anime_content();

/* Function to select a specific Anime */

	function sel_anime_content(){
		$sql = "select * from anime where name = '".$GLOBALS['sel_anime_name']."'";
		$query = mysql_query($sql);
		$record = mysql_fetch_array($query);
		$no_of_ep = $record['episode'];

		echo "<div class='series_content'>";
		echo "<img src='./img/".$record['name'].".jpg'>";//Displaying the Image of Selected Anime Series.
		echo "<h1>". $record['name']. "</h1>";//Displaying Heading for the selected Anime Series.
		echo "<table>";
		echo "<tr><th class='text-center'>Episodes</th></tr>";
		echo "<tbody>";
		for($i=1;$i<$no_of_ep;$i++)// Loop to Print Episodes from 1.
			echo "<tr><td><a href='./Database/Videos/Anime/".$record['name']."/".$i.".".$record['format']."'>Episode $i</a></td></tr>";//selecting the Episode.(haven't figured out how to check for .mkv or .mp4)
		echo "</table>";
		echo "</div>";
	}

	if(isset($sel_tv_name))//To call the function when a specific tv series is clicked.
		sel_tv_content();

/* Function to select a specific TV show */

	function sel_tv_content(){
		$sql = "select * from television where name = '".$GLOBALS['sel_tv_name']."'";
		$query = mysql_query($sql);
		$record = mysql_fetch_array($query);
		$no_of_ep = $record['episode'];

		echo "<div class='series_content'>";
		echo "<img src='./img/".$record['name'].".jpg'>";//Displaying the Image of Selected TV Series.
		echo "<h1>". $record['name']. "</h1>";//Displaying Heading for the selected TV Series.
		echo "<table>";
		echo "<tr><th class='text-center'>Episodes</th></tr>";
		echo "<tbody>";
		for($i=1;$i<=$no_of_ep;$i++)// Loop to Print Episodes from 1.
			echo "<tr><td><a href='./Database/Videos/TV/".$record['name']."/".$i.".".$record['format']."'>Episode $i</a></td></tr>";//selecting the Episode.
		echo "</table>";
		echo "</div>";
	}
//The movie starts when clicked and no extra webpage needs to be displayed like for television series and anime.

/* Navigation Bar Function */

	if(isset($_GET['anime']))
	{
		$sql = "select * from anime";// Selecting all the Anime from the Database
		$query = mysql_query($sql);// Passing the query to MySQL.
		while($record = mysql_fetch_array($query))// Displaying all the Anime from the Database.
		{
			echo "<div class='box'>";
			echo "<a name='sel_anime' href='index.php?sel_anime_name=".$record['name']."'><img src='./img/".$record['name'].".jpg'></a>";//Displaying the Image from the img file.
			echo "<br><label>". $record['name']. "</label>";//Displaying the Name under the Image.
			echo "</div>";
		}
	}


	if(isset($_GET['movies']))
	{
		$sql = "select * from movies";// Selecting all the Movies from the Database.
		$query = mysql_query($sql);// Passing the query to MySQL.
		while($record = mysql_fetch_array($query))// Displaying all the the Movies from 'movies' table.
		{
			echo "<div class='box'>";
			echo "<a href='./Database/Videos/Movies/".$record['name']."/".$record['name'].".".$record['format']."'><img src='./img/".$record['name'].".jpg'></a>";//Displaying the Image from the img file.
			echo "<br><label>". $record['name']. "</label>";//Displaying the Name under the Image.
			echo "</div>";
		}
	}

	if(isset($_GET['television']))
	{
		$sql = "select * from television";// Selecting all the Television series from the Database.
		$query = mysql_query($sql);// Passing the query to MySQL.
		while($record = mysql_fetch_array($query))// Displaying all the the Television series from 'television' table.
		{
			echo "<div class='box'>";
			echo "<a name='sel_anime' href='index.php?sel_tv_name=".$record['name']."'><img src='./img/".$record['name'].".jpg'></a>";//Displaying the Image from the img file.
			echo "<br><label>". $record['name']. "</label>";//Displaying the Name under the Image.
			echo "</div>";
		}
	}
	fclose($file_open);
?>
</div>
</body>
</html>
