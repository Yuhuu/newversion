<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico">
	<link rel="stylesheet" type="text/css" media="screen and (min-device-width: 780px)" href="articlepost.css">
	<title>Kebab i Oslo</title>
</head>
<body>
	   <?php
		$db = new mysqli("student.cs.hioa.no", "s184519",null,"s184519");
		$iUser = NULL;
		$iMessage = NULL;
		if($db->connect_errno > 0){
			die('failed to connect [' . $db->connect_error . ']');
		}
		$sql = "SELECT * FROM Forum";
		if(!$result = $db->query($sql)){
			die('You done wrong [' . $db->error . ']');
		}	
		while($row = $result->fetch_assoc()){
			echo  "<div class='temabar'>";
			//echo "<p>Title: ". $row['Title']."</p><p>Butikk :".$row['User']."</p></div><div><p>" . $row['time'];
			// echo "</p>";
			echo "<table border=''>";
			echo "<tr><td><img src='". $row['pic']."
			' alt ='heart face' height='250' width='590'> <img src='image/". $row['pic']."
			' alt ='heart face' height='250' width='250'> <img src='". $row['pic2']."
			' alt ='heart face' height='250' width='250'> </td></tr><tr><td>Kommentar: " . $row['msg']. 
			"</td></tr><tr><td>What do you think of this post?<img src='". $row['thumbsup']."
			' id='". $row['ID']."' alt ='thumbsup' height='40' width='40'>Like this post!</td></tr></table></div>";
		}
	?>
</body>
</html>
