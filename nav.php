
<?php


  $location = $_SERVER['REQUEST_URI'];

  if(strpos($location, stolica_proizvod) || strpos($location, sto_proizvod) || strpos($location, fotelja) || strpos($location, referenca)){
    $character = '&';
}else{
    $character = '?';
}

$b = parse_url($location, PHP_URL_QUERY);
parse_str($b, $arr);
$lang_active = 'rs';   // $lang['LANGUAGE'];


 $language= $_GET['lang'];
 switch ($language) {
 case 'rs':
 $menu_item = '?lang=rs';
 $lang_active = 'rs';
 $flag= 'images/icons/flags/serbia.png';
 break;
 case 'en':
 $menu_item = '?lang=en';
 $lang_active = 'en';
 $flag= 'images/icons/flags/UK.png';
 break;
 case 'ita':
 $menu_item = '?lang=ita';
 $lang_active = 'ita';
 $flag= 'images/icons/flags/italia.png';
 break;
 case 'rus':
 $menu_item = '?lang=rus';
 $lang_active = 'rus';
 $flag= 'images/icons/flags/russia.png';
 break;
 default:
 $lang_active = 'rs';
 $flag= 'images/icons/flags/serbia.png';
}

$idCheck = '';
if(empty($_GET['id'])){
  $idCheck = '';
}else{
  $idCheck = '?id=' . $_GET['id'];
}



?>
<div class="nav-wrapper">

			
			<nav>	
			<img src="images/icons/eurokancom_3.png" class="nav-title">
        <div class="soc-nav">
         <a href="https://plus.google.com/117131562002974557020"><img src="images/icons/google_3.png"></a>
         <a href="https://www.facebook.com/Eurokancom/"><img src="images/icons/facebook_3.png"></a>
         <a href="https://www.instagram.com/eurokancom/"><img src="images/icons/instagram_3.png"></a>
         <a href="https://www.linkedin.com/company/eurokancom"><img src="images/icons/linkedin_3.png"></a>
       </div>

				<ul>
					<a  class="nav-item" href="<?php echo 'stolice.php' . $menu_item; ?>"><li><?php echo $lang['STOLICE']; ?>.</li></a>
					<a  class="nav-item" href="<?php echo 'fotelje.php' . $menu_item; ?>"><li><?php echo $lang['FOTELJE']; ?>.</li></a>
					<a  class="nav-item" href="<?php echo 'stolovi.php' . $menu_item; ?>"><li><?php echo $lang['STOLOVI']; ?>.</li></a>
					<a  class="nav-item" href="<?php echo 'reference.php' . $menu_item; ?>"><li><?php echo $lang['REFERENCE']; ?>.</li></a>
					<a  class="nav-item" href="<?php echo 'novosti.php' . $menu_item;?>"><li><?php echo $lang['NOVOSTI']; ?>.</li></a>
					<a  class="nav-item" href="<?php echo 'o_nama.php' . $menu_item; ?>"><li><?php echo $lang['ONAMA']; ?>.</li></a>
					<a  class="nav-item contact-trigger" href="javascript:;"><li class="contact-trigger"><?php echo $lang['KONTAKT']; ?>.</li></a>
				</ul>

      

			</nav>
			
			<div class="box">
				<!-- <a class="box-shadow-menu" href="#"></a> -->
				<div id="icon-toggle" class="menu-toggle-btn">
    				 <span class="line line-1"></span>
   					 <span class="line line-2"></span>
   					 <span class="line line-3"></span>
  				</div> 

				

			</div> 
			<div class="box">
			<div class="icon-cont"><a href="/"><p class="title">EUROKANCOM</p></a><a href="/"><img class="icon" src="images/icons/icon.svg"></a>
	    <a href="/"><img class="icon-responsive" src="images/icons/icon.svg"></a></div>
      
			</div>
			<div class="box">

  				<div class="dropdown-lang">
   				 <a onclick="langChange()" class="lang-btn"><?php echo $lang_active; ?><img id="flag" src="<?php echo $flag; ?>"></a>

   				  <div id="Demo" class="lang-dropdown-content">
               <hr>
            
             <a href="<?php echo $_SERVER['PHP_SELF'] . $idCheck . $character . 'lang=en' ?>">ENG <img src="images/icons/flags/UK.png"></a>
             <hr>

             <!--
             <a href="<?php // echo $_SERVER['PHP_SELF']  . $idCheck . $character . 'lang=rus' ?>">RUS <img src="images/icons/flags/russia.png"></a>
             <hr>
             <a href="<?php //echo $_SERVER['PHP_SELF']  . $idCheck . $character . 'lang=esp'; ?>">ESP <img src="images/icons/flags/spain.png"></a>
             <hr>  
             -->
             <a href="<?php echo $_SERVER['PHP_SELF']  . $idCheck . $character . 'lang=rs'; ?>">SRB <img src="images/icons/flags/serbia.png"></a>
             <hr> 
             <!--
             <a href="<?php //echo $_SERVER['PHP_SELF']  . $idCheck . $character . 'lang=ita'; ?>">ITA <img src="images/icons/flags/italia.png"></a>
              -->
            </div>
          </div>


			</div>
		</div>


    

<!-- CONTACT OVERLAY -->

<div class="contact-overlay">

<!--...-->



    <div class="contact-left">
        
	  <div class="contact-overlay_close">
     <button type="button" class="tcon-contact tcon-contact-remove tcon-contact-remove--chevron-up" aria-label="remove item">
       <span class="tcon-contact-visuallyhidden">remove item</span>
     </button>
    </div>	


      <h1 class="large-title-contact"><strong><?php echo $lang['CONTACT_TITLE']; ?></strong></h1>
      <h1 class="small-title-contact"><strong><?php echo $lang['CONTACT_LARGE_TITLE']; ?></strong></h1>
      
       <h2><?php echo $lang['ADRESA']; ?></h2>
       <h2><?php echo $lang['TELEFON']; ?></h2>
       <h2>MAIL</h2>
       
       <div class="kontakt-hr">
       <hr>
       </div>
       <div class="kontakt-hr">
       <hr>
       </div>
       <div class="kontakt-hr">
       <hr>
       </div>

      <div class="kontakt-adresa">
      
        <address>
          Treca industrijska zona 3, <br>
          22330 Nova Pazova
        </address>
        
      </div>

     
      <div class="kontakt-telefon">
            
        <p>(+381) 22 323 395</p>
        <p>(+381) 22 321 266</p>
        <p>(+381) 22 323 437</p>
        
      </div>
     
      <div class="kontakt-web">

        <p><a href="mailto:office@eurokancom.com">office@eurokancom.com</a></p>
         
      </div>

      <div class="prodajno-mesto">
         <h2>PRODAJNO MESTO</h2>
          <div class="kontakt-hr-pm">
       <hr>
       </div>
         <strong><p id="pm-naslov">ULTRA</p></strong>
         <address>Novosadskog sajma 17,<br>
                  Novi Sad, Srbija
         </address>
         <p>Tel: +381 21 654 65 71</p>
         <p>Mob: +381 62 802 21 60</p>
      </div>

      <div class="social-icons-contact">
        <div>
        <a target="blank" href="https://www.facebook.com/Eurokancom/"><img onmouseover="this.src='images/icons/social/facebook_2.png';" onmouseout="this.src='images/icons/social/facebook_1.png';" src="images/icons/social/facebook_1.png"></a>
        <a target="blank" href="https://plus.google.com/117131562002974557020"><img onmouseover="this.src='images/icons/social/google_2.png';" onmouseout="this.src='images/icons/social/google_1.png';" src="images/icons/social/google_1.png"></a>
        <a target="blank" href="https://www.instagram.com/eurokancom/"><img onmouseover="this.src='images/icons/social/instagram_2.png';" onmouseout="this.src='images/icons/social/instagram_1.png';" src="images/icons/social/instagram_1.png"></a>
         <a target="blank" href="https://www.linkedin.com/company/eurokancom"><img onmouseover="this.src='images/icons/social/linkedin_2.png';" onmouseout="this.src='images/icons/social/linkedin_1.png';" src="images/icons/social/linkedin_1.png"></a>
     </div>
      </div>

    </div>

<!--...-->
  

    <div id="map"></div>
<!--...-->
</div>   