<!DOCTYPE html>

<html>

<head>
	<title>Kebab i Oslo</title>
        	<meta charset="utf-8">
        	<link type="text/css" rel="stylesheet" href="paralax.css"> 
        	<script type="text/javascript" src='slider.js'></script>
                <link rel="SHORTCUT ICON" href="image/shortcut.jpg">
                <script>
var pagetop, menu, yPos;
function yScroll(){
        pagetop = document.getElementById('pagetop');
        menu = document.getElementById('navigation');
        yPos = window.pageYOffset;
        if(yPos > 150){
                pagetop.style.height = "36px";
                pagetop.style.paddingTop = "8px";
                menu.style.height = "0px";
        } else {
                pagetop.style.height = "120px";
                pagetop.style.paddingTop = "50px";
                menu.style.height = "50px";
        }
}
window.addEventListener("scroll", yScroll);
</script>
</head>
<body class="body" onLoad="photoA()">
 <div id="pagetop">
        <div id="navigation">
                <ul>
                        <li class='active'><a href='#'><span>Hjem</span></a></li>
                        <li><a href='anmeldelser.html'><span>Anmeldelser</span></a></li>
                        <li><a href='mal.php'><span>Restauranter </span></a></li>
                        <li><a href='omoss.html'><span>Om oss</span></a></li>
                        <li class='last'><a href='kontakt.html'><span>Kontakt</span></a></li>
                </ul>
        </div>
</div>
        <div class="container">
            <div class="allthestoff-wrapper padding10px">            
                <div class ="breadcrumb-container"><a  href="#"><img class ="breadcrumb breadcrumbImg" src="image/home.png" alt="Photograph" /></a> <img  class ="breadcrumb Forbreadcrumb" src="image/read_more.png" alt="Photograph" /><a href="#" ><span class ="breadcrumb linkForForbreadcrumb">BYDELER</span></a></div>  
                <!-- for square of 6 city images -->
                <div class="bydel" id="bydelcontainer">  
                     <div class= "col-29" id="box1" >
                        <a href="#"><h1>Majorstuen</h1><figure><img src="bilder/Majourstuen.png" alt="Photograph" onmouseover="this.src='http://www.arqiva.com/application/images/temporary-images/read-more-large.png'" onmouseout="this.src='bilder/Majourstuen.png'" /><figcaption>Kebab-restauranter på Majorstuen</figcaption></figure></a> </div><div class= "col-29" id="box2">

                        <a href="#"><h1>Oslo Sentrum</h1><figure><img src="bilder/Bjerke.png" alt="Photograph" /><figcaption>Kebab-restauranter på Oslo Sentrum</figcaption></figure></a> </div><div class= "col-29" id="box3">

                        <a href="#"><h1>Bjerke</h1><figure><img src="bilder/OsloS.png" alt="Photograph" /><figcaption>Kebab-restauranter på Oslo Sentrum</figcaption></figure></a> </div><div class= "col-29" id="box4">

                        <a href="#"><h1>Grünerlokka</h1><figure><img src="bilder/Oslo_grunerlokka.png" alt="Photograph" />
                          <figcaption>Kebab-restauranter på Grünerlokka</figcaption></figure></a> </div><div class= "col-29" 
                          id="box5">

                        <a href="#"><h1>St.hanshaugen</h1><figure><img src="bilder/Oslo_sthanshaugen.png" alt="Photograph" />
                          <figcaption>Kebab-restauranter på St.hanshaugen</figcaption></figure></a> </div><div class= "col-29" id="box6">

                        <a href="#"><h1>Torshov</h1><figure><img src="bilder/210px-Oslo_sagene.png" alt="Photograph" /><figcaption>4 Kebab-restauranter på Oslo Sentrum</figcaption></figure></a> </div>
                    </div>
<!-- End item which published 6 city parts -->
                  <!-- for  bydel navigation -->     
                    <div id = "nav">
                      <ul><li>
                      <a  href="http://student.cs.hioa.no/~s184519/webprosjekt/GalleriKebab.php">
                        <img src="image/gallery/Kebabbydel6.png" alt="Photograph0" /></a></li>   
                        <li><a href="#"><img src="image/gallery/Kebabbydel1.png" alt="Photograph" /></a></li>
                        <li><a href="#"><img src="image/gallery/Kebabbydel2.png" alt="Photograph1" /></a></li>
                        <li><a href="#"><img src="image/gallery/Kebabbydel3.png" alt="Photograph2" /></a></li>
                        <li><a href="#"><img src="image/gallery/Kebabbydel4.png" alt="Photograph3" /></a></li>
                        <li><a href="#"><img src="image/gallery/Kebabbydel5.png" alt="Photograph4" /></a></li>
                        </ul>
                    </div>
<!-- For list of items  -->

                    <div id="content-wrapper2">
                      <div class ="padding-bottom5 breadcrumb-container"><a  href="#"><img class ="breadcrumb breadcrumbImg" src="image/home.png" alt="Photograph" /></a> <img  class ="breadcrumb Forbreadcrumb" src="image/read_more.png" alt="Photograph" /><a href="#" ><span class ="breadcrumb linkForForbreadcrumb">BYDELER</span></a>
                        <img class ="breadcrumb Forbreadcrumb" src="image/read_more.png" alt="Photograph" /> <a  href="#"><span class= "linkForForbreadcrumb breadcrumb">RESTAURANTER</span></a>
                    </div>  <div class="clean">
                </div>
</div>
<!--  content-wrapper2 end -->
</div><!--  end whole-bodywrapper-->
    <div class="bottom-content"> 
<?php
    $db = new mysqli("student.cs.hioa.no", "s184519",null,"s184519");
    $iUser = NULL;
    $iMessage = NULL;
    if($db->connect_errno > 0){
      die('failed to connect [' . $db->connect_error . ']');
    }
    $sql = "SELECT * FROM Forum ORDER BY bydel";
    if(!$result = $db->query($sql)){
      die('You done wrong [' . $db->error . ']');
    } 
    while($row = $result->fetch_assoc()){
      echo "
<div class= 'col-full wrapper margin-top5px'>
            <div class='ribbon-wrapper-green'>
                <div class='ribbon-green'>★★★★★</div>
            </div>  
            <div class='floatleft col-60 restaurantInfo'>
              <h1>". $row['Navn']."</h1>
                <a href='#''><img src='bilder/". $row['pic2']."' alt='". $row['pic1']."' />
                  <img src='bilder/". $row['pic1']."' alt='". $row['pic1']."' />
                </a>
           </div>
        <div class = 'floatright col-35 restaurantInfotext'>
            <strong>". $row['gataAdressen']."</strong>
            <ul>
            <li><p>". $row['gataAdressen']." ligger i ". $row['bydel'].".</p></li>
            <li><p>Informasjon endret: ". $row['time'].".</p></li>
            </ul>
            <h4>Kort Anmeldelser</h4>
            <p>". $row['Anmeldelser']."</p>
            <div>
            <a href='#''><img src='image/read_more.png' alt='Photograph'/><img src='image/read_more.png' alt='Photograph'/> Les mer</a>
            </div>
        </div>
        
</div>";
    }
  ?>
                                
    </div>
                </div>          
                        <div class="Anbefarbar">
                                <h2>RestaurantNavn1</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>                                

                        <div class="Anbefarbar">
                                <h2>RestaurantNavn1</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod expedita distinctio.</p>
                        </div>  

                        <div class="Anbefarbar">
                                <h2>RestaurantNavn1</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod expedita distinctio.</p>
                        </div>
        </div> 
        <div class="mainFooter">
                <p>Copyright &copy; 2014 <a href="#">Thundercats</a></p>
                <div id="faceb">
                       <!--  <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com/pages/Kebab-i-Oslo/1588977414659426?fref=ts&amp;layout=button_count&amp;show_faces=true&amp;action=like&amp;colorscheme=light"scrolling="no" frameborder="0">
                        </iframe> -->
                </div>
                <div id="twitt"> <a href="https://twitter.com/share" class="twitter-share-button" data-url="https://twitter.com/kebabioslo">Tweet</a>
                </div>
                <div id="insta">
                        <span class="ig-follow" data-id="fa337aa667" data-count="true" data-size="small" data-username="false">
                        </span>
                </div>
        </div>

</body>
</html>