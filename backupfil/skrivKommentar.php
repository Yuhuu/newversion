
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico">
	<link rel="stylesheet" type="text/css" media="screen and (min-device-width: 780px)" href="skrivKommentar.css">
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
		echo "<div><form action='http://student.cs.hioa.no/~s184519/webprosjekt/kommentar.html' method='post'><table border=''>
			<tr><td>Admin password</td><td>Kebab shop´s name</td><td>Komment´s title</td></tr>
			<tr><td>
			<textarea id='input_here' name='user'>";
		echo "</textarea>
			</td>
			<td>
			<input type='text' name='kebabNavn'>
			</td>
			<td>
		    <input type='text' name='kommentarTitle'>
			</td>
			</tr><tr><td colspan = '3'>Write your komments Here: no more than 140 words</td></tr><tr>
		    <td colspan = '3'>
			<textarea id='input_text' name='message'></textarea>
			</td></tr>
			<tr><td>location:</td><td>Adressen of the shop</td><td>Time for delivering</td></tr><tr>
		    <td>
			<select name='location'>
		    <option value='Oslosenter'>Oslo senter</option>
		     <option value='Oslovest'>Oslo west</option>
		      <option value='Osloeast'>Oslo east</option>
		       <option value='Oslosouth'>Oslo south</option>
		        <option value='Oslonorth'>Oslo north</option>
            </select>
			</td>
			<td><textarea id='gataAdressen' name='gataAdressen'></textarea></td><td>
			<select name='lerveringtid'>
		    <option value='mindre5'>mindre enn 5 min</option>
		     <option value='5til7'>5min til 7min</option>
		      <option value='7til10'>7min til 10mom</option>
		       <option value='lengre10'>lengre enn 10min</option>
            </select>
			<input type='submit'></td></tr>
			</table></form></div>";
		if($_POST['user'] != NULL)
		{
			$iUser = mysqli_real_escape_string($db, $_POST['user']);
			$iMessage = mysqli_real_escape_string($db, $_POST['message']);
			$iTitle = mysqli_real_escape_string($db, $_POST['title']);
			$iPic = mysqli_real_escape_string($db, $_POST['pic']);
		}
		if($iUser != NULL && $iMessage != NULL)
		{
			 echo "<p>Thank you for submitting article</p>";
			 mysqli_query($db, "INSERT INTO `s184519`.`Forum` (`ID` ,`User` ,`Title` ,`msg` ,
`pic` ,`time`) VALUES (NULL,'$iUser','$iTitle', '$iMessage', '$iPic', NULL)");
		}
		echo mysqli_error($db);
		$db->close();
	?>
</body>
</html>
