
<?php  

require ('core/init.php');

//database fetch
$query = $conn->prepare("SELECT * FROM novosti ORDER BY id DESC LIMIT 2");
$query->execute();
$dquery = $query;

include "lang/common.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Eurokancom</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" src="images/icons/icon.svg">
	<link rel="stylesheet" type="text/css" href="slick-1.6.0/slick/slick.css"/>
  	<link rel="stylesheet" type="text/css" href="slick-1.6.0/slick/slick-theme.css"/>
  	<link rel="stylesheet" type="text/css" href="styles.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


</head>

<body>


<!-- navbar -->
		
	<?php include "nav.php"; ?>
		
<!-- navbar end -->	

<!-- slider -->
<div>
<div class="carousel-homepage">  
 	<a href="/referenca.php?id=2"><div class="slide1"><p>Referenca</p><br><hr><h1>Hotel Palmon Bay</h1></div></a>
    <a href="/referenca.php?id=5"><div class="slide2"><p>Referenca</p><br><hr><h1>Restoran Fusco</h1></div></a>
    <a href="/referenca.php?id=1"><div class="slide3"><p>Referenca</p><br><hr><h1>Hotel Palma</h1></div></a>
</div>
	<p class="prev1">prev</p>
	<p class="next1">next</p>
	</div>
<!-- end slider  -->






<div class="homepage-flex">
 <a href="http://localhost/stolica_proizvod.php?id=2&lang=rs"> <li class="flex-item"><h1>Amarcord</h1><h3>stolica</h3><img class="flex-img" src="images/chairs/chairs-cover/Amarcord_st.png"></a></li></a>
 <a href="http://localhost/stolica_proizvod.php?id=2&lang=rs"> <li class="flex-item"><h1>Amarcord</h1><h3>polufotelja</h3><a href="http://localhost/stolica_proizvod.php?id=3&lang=rs"><img class="flex-img" src="images/chairs/chairs-cover/amarcord_pf.png"></a></li></a>
 <a href="http://localhost/stolica_proizvod.php?id=2&lang=rs"> <li class="flex-item"><h1>Amarcord</h1><h3>bar</h3><a href="http://localhost/stolica_proizvod.php?id=4&lang=rs"><img class="flex-img" src="images/chairs/chairs-cover/amarcord_bar.png"></a></li></a>
</div>




<!-- references -->

<div class="references">

	<?php 
while($novosti = $query->fetch(PDO::FETCH_ASSOC)):
?>

	<div class="box-references">
		<a href="novost.php?id=<?php echo $novosti['id'] . '&lang=' . $lang_active; ?>">
		<p class="references-title"><?php echo $novosti['novost_naslov']; ?></p>
		<p class="references-subtitle"><?php echo $novosti['novost_podnaslov']; ?></p>
		<img class="references-img" src="<?php echo $novosti['novost_slika']; ?>">
		</a>
	</div>

<?php
	endwhile; 
?>	

</div>	

<!-- end references -->

<?php
$error = '';

if(!empty($_POST['EMAIL'])){
	$error = 'You must enter a valide email address.';
}

?>


<!-- newsletter -->
<div class="newsletter">
<h1 class="large-title">NEWSLETTER</h1>
<h3 class="small-title"><?php echo $lang['NEWSLETTER_BELOW']; ?></h3>

  <div class="newsletter-form" id="mc_embed_signup">
    <form action="//eurokancom.us14.list-manage.com/subscribe/post?u=94f358adf5cf0a6ec5392fc26&amp;id=95e6561c9a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
     
		<div id="md_embed-signup-scroll">

      <input id="mce-EMAIL" type="email" value="" name="EMAIL" placeholder="<?php echo $lang['EMAIL_ADDRESS']; ?>" required>
      <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_94f358adf5cf0a6ec5392fc26_95e6561c9a" tabindex="-1" value=""></div>
      <input type="submit" name="subscribe" id="mc-embedded-subscribe">
      
		</div>

    </form>

	<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
	<script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

  </div>
</div>

<!-- end newsletter -->



<!--End mc_embed_signup-->


<!-- footer -->

<?php include "footer.php"; ?>

<!-- end footer -->



</body>
</html>