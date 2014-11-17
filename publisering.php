<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/ico">
	<link rel="stylesheet" type="text/css" media="screen and (min-device-width: 780px)" href="index.css">
	<title>Kebab i Oslo</title>
</head>
<body>

<div class="bigtitle">
<a href="index.html" id ="kebabiOslo">Tilbake til Hovedside
</a>
</div>
	<div id="BG-top">
		<script type="text/javascript" src="headerspace.js"></script>
		<script type="text/javascript" src="lokasjon.js"></script>
</div>
<div id="publisering">
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
			echo "<div class = 'item'> <a href='page2.html'>
                  <img src='image/". $row['pic1']."' alt ='picturetoshowKebab' id = 'itemImg'></a>
		                 <div class = 'itemIn' 'whiteBG'>
			                 <p class='fatword'>".$row['Navn']."</p>
			                 <p>Bydel: " . $row['bydel']."</p>
			                 <a href='page2.html'><img src='image/". $row['LesMer']."' alt ='picturetoshow' id = 'itemImgMore'>
					</a><div id= 'itemLike'>
					<a href='page2.html'>Liker : (30) &nbsp  &nbsp  &nbsp<img src='image/". $row['thumb']."' alt ='picturetomap' id = 'itemImgthumb'></a></div>";
					echo "</div>
							<div class ='itemIn' 'whiteBG'>
							<p>Nettside :". $row['SkrevetAv']." </p> 
							<p>Adresse : ". $row['gataAdressen']."</p>
							<p>Kart: </p>
							<a href='page2.html'>
					<img src='image/". $row['KartPic']."' alt ='picturetomap' id = 'itemImgMap'></a>
					  		</div>";
					echo "
					</div> ";
		}
	?>
  </div><!-- end publisering -->
  <div class="clear"></div>
  <script type="text/javascript" src="footer.js"></script>
</body>
</html>
