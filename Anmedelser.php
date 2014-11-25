<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width: 780px)" href="Anmedelser.css">
    <title>Kebab i Oslo</title>
</head>
<body>
<div id="title_wrapper"><br><br></div>
<div id="feature_wrapper">
<div id ="feature" >
	<div id ="feature_left">
	    <h1>Last posted comment</h1>
	    <div class="cleaner_h20">
    	</div>
	    <p>Så hvis du er glad i både kebab og pizza, er dette virkelig stedet for deg!
	    Jeg bestilte en stor biff-kebabtallerken. Den ble levert på en halvtime og det smakte veldig godt. Det var andre gang jeg bestilte fra Kebab Biten, og det blir sikkert ikke siste. En ekte hjemmelaget kebab med grønnsaker og husets spesialkomponert tomatsaus. Rask service her altså!</p>
	    <div class="button">
	        <a href="#">Read more</a>
	    </div>
	</div>
	
	<div id ="feature_right">
		<div id ="feature_image">
		    <img alt="image" src="image/Kebab7pic2.jpg">
		</div>
	</div>
</div><!--end featurer-->
</div><!--end feature_wrapper-->
<div class="cleaner_h20">
    	</div>
<div id="content_wrapper">
  	<div id="content">
    <h2>Meget hyggelig pris</h2>
    <p>En ekte hjemmelaget kebab med grønnsaker og husets spesialkomponert tomatsaus. Rask service og bra mat her altså. Grei pris på stor kebabporsjon. Nydelig og ryddig grønnsaksdisk.Litt ekstra grillkrydder på opplevelsen er jo at du kan sitte og lese bransjeblader fra det hardkokte servicemiljøet mens du venter, er du heldig finner du også et VG. Neidasåjodaså - rask service og bra mat her altså.</p>
	    <div class="readmore">
	        <a href="#">
	           read more
	    </a>
		</div>
    	<div class="cleaner_h20">
    	</div>
    	<div id="publisering">
    		<!--   <a href='page2.html'>Les Mer</a>
							 <p>Nettside :". $row['SkrevetAv']." </p>  -->
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
			echo "
					<a href='page2.html'>
                  <figure>
                  <img src='image/". $row['pic1']."' alt ='picturetoshowKebab' id = 'itemImg'>
                  <figcaption>
                  <strong>".$row['Navn']."</strong> ".$row['SkrevetAv']."
                  </figure></a>
		                 <div class = 'itemIn readmore'>
			                 <p class='fatword'>".$row['Navn']."</p>
			                 <p>Bydel: " . $row['bydel']."</p>
							<p>Adresse : ". $row['gataAdressen']."</p>
							<p>Kart: </p>
							<img src='image/". $row['KartPic']."' alt ='picturetomap' id ='itemImgMap'>
						
		    </div>";
			echo "<div class='cleaner_h20'></div>";
		}
	?>
  </div><!-- end publisering -->
</div><!--content-->

<div id= "siderBar_wrapper">
	<div class="col_w265 float_r">
    		<h3>Title2</h3>
		    <div class="siderBar_top_image">
		    	    <a href="#">
		    <img  height="177" alt="image" src="image/Kebab10pic2.png"></img>

				</a>
		    </div>
   			 <p>Kebab resaturant Webside</p><p>http://skjerioslo.dittoslo.no/takeaway/istanbul-kebab#what:Takeaway</p>
		    <div class="readmore">
		    	<a href="#">
		           read more</a>
		    </div>
		</div><!--col_w265 float_r -->
		<div class="col_w265 float_l">
    		<h3>Title</h3>
			 <div class="siderBar_top_image">
		    	    <a href="#">
		    <img  height="177" alt="image" src="image/Kebab3pic2.jpg"></img>
				</a>
		    </div>
   			 <p>Kebab resaturant Webside</p><p>http://skjerioslo.dittoslo.no/takeaway/istanbul-kebab#what:Takeaway</p>
	    	<div class="readmore">
	    	<a href="#">
	           read more</a>
	    	</div>
		</div>

		<div class="col_w265 float_r">
    		<h3>Title2</h3>
		    <div class="siderBar_top_image">
		    	    <a href="#">
		    <img  height="175" alt="image" src="image/Kebab8pic2.jpg"></img>
				</a>
		    </div>
   			 <p>Kebab resaturant Webside</p><p>http://skjerioslo.dittoslo.no/takeaway/istanbul-kebab#what:Takeaway</p>
		    <div class="readmore">
		    	<a href="#">
		           read more</a>
		    </div>
		</div><!--col_w265 float_r -->
	    <div class="col_w265 float_l">
    		<h3>Title</h3>
			 <div class="siderBar_top_image">
		    	    <a href="#">
		    <img height="175" alt="image" src="image/Kebab7pic2.jpg"></img>
				</a>
		    </div>
   			 <p>Kebab resaturant Webside</p><p>http://skjerioslo.dittoslo.no/takeaway/istanbul-kebab#what:Takeaway</p>
	    	<div class="readmore">
	    	<a href="#">
	           read more</a>
	    	</div>
		</div>
		<div class="col_w265 float_r">
    		<h3>Title2</h3>
		    <div class="siderBar_top_image">
		    	    <a href="#">
		    <img  height="175" alt="image" src="image/Kebab10pic2.png"></img>
				</a>
		    </div>
   			 <p>Kebab resaturant Webside</p><p>http://skjerioslo.dittoslo.no/takeaway/istanbul-kebab#what:Takeaway</p>
		    <div class="readmore">
		    	<a href="#">
		           read more
		    </a>
		    </div>
		</div><!--col_w265 float_r -->
		<div class="col_w265 float_l">
			 <div class="siderBar_top_image">
		    	    <a href="#">
		    <img  height="175" alt="image" src="image/Kebab12pic2.jpg"></img>
				</a>
		    </div>
   			 <p>Kebab resaturant Webside</p><p>http://skjerioslo.dittoslo.no/takeaway/istanbul-kebab#what:Takeaway</p>
	    	<div class="readmore">
	    	<a href="#">
	           read more</a>
	    	</div>
		</div>
	</div> <!-- siderbare wrapperend-->
</div>
<div id = "sidebar_buttom">		    
		<div class="sidebar_buttom_cont">
      <h2>Recent Posts</h2>
      <div class="cleaner_h10">
    	</div>
    	<h3>Title</h3>
      <a href="#"><img width="199" height="135" alt="image" src="image/Kebab12pic2.jpg"></a>
      <span>posted by John - 12.08</span>
    	  <hr style="border:1px dashed #000; height:1px">
    	  <div class="cleaner_h10">
    	</div>
   
      <h3>Title3</h3>
      <a href="#"><img width="199" height="135" alt="image" src="image/Kebab7pic2.jpg"></a>
      <span>posted by Jen - 12.08</span>
      	<hr style="border:1px dashed #000; height:1px">
      	<div class="cleaner_h10">
    	</div>
    	<h3>Title4</h3>
      <a href="#"><img width="199" height="135" alt="image" src="image/Kebab12pic2.png"></a>
      <span class="meta_info">posted by Ola - 12.08</span>
      	<hr style="border:1px dashed #000; height:1px">
      	<div class="cleaner_h10">
    	</div>
    	<h3>Title5</h3>
      <a href="#"><img width="199" height="135" alt="image" src="image/Kebab7pic2.jpg"></a>
      <span class="meta_info">posted by yuan - 12.08</span>
      	<hr style="border:1px dashed #000; height:1px">
      	<div class="cleaner_h10">
    	</div>
    	<a id = "loadPost" href="#">Load More Posts</a>
    	 </div>
   	</div>
	    
</div><!--contentWrapper -->


</body>
</html>