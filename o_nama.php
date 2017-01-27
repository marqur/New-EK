
<?php  

include "lang/common.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>O Nama</title>
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="http://www.iconsdb.com/icons/preview/green/letter-e-xxl.png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="slick-1.6.0/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="slick-1.6.0/slick/slick-theme.css"/>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


</head>

<body>

<!-- navbar -->
		
	<?php include "nav.php"; ?>
		
<!-- navbar end -->	


<h1 class="large-title"><?php echo $lang['O_NAMA']; ?></h1>
<h3 id="references-small-title" class="small-title"><?php echo $lang['TRADICIJA']; ?></h3>

<div class="onama-linija2"><hr></div>

	<div class="uvod-onama-cont">
	<p class="uvod-onama"><?php echo $lang['UVOD_ONAMA']; ?></p>
	</div>



<!-- slider -->

<div class="carousel">  
  <img src="images/o nama/DSC_8279.jpg">
  <img src="images/o nama/DSC_8324.jpg">
  <img src="images/o nama/DSC_8342.jpg">
</div>

<!-- end slider -->

<div class="standardi">
<div class="left-standardi">
</div>
<div class="right-standardi">
<h1 class="standardi-naslov"><?php echo $lang['VISOKI_STANDARDI']; ?></h1>
<div class="onama-linija1"><hr></div>
<p class="standardi-text"><?php echo $lang['STANDARDI_TEXT']; ?></p>
</div>
</div>


<div class="proizvodnja">
<div class="left-proizvodnja">

<button class="accordion"><?php echo $lang['PLUS1_NASLOV']; ?></button>
<div class="panel">
  <p><?php echo $lang['PLUS1_TEXT']; ?></p>
</div>

<button class="accordion"><?php echo $lang['PLUS2_NASLOV']; ?></button>
<div class="panel">
  <p><?php echo $lang['PLUS2_TEXT']; ?></p>
</div>

<button class="accordion"><?php echo $lang['PLUS3_NASLOV']; ?></button>
<div id="foo" class="panel">
  <p><?php echo $lang['PLUS3_TEXT']; ?></p>
</div>

<button class="accordion"><?php echo $lang['PLUS4_NASLOV']; ?></button>
<div id="foo" class="panel">
  <p><?php echo $lang['PLUS4_TEXT']; ?></p>
</div>


<div class="show-window1">
<button id="show1" type="button" class="tcon tcon-plus tcon-plus--minus" aria-label="add item">
    <span  class="tcon-visuallyhidden"></span>
</button>
	<div style="display: none;" class="onama-window1">
		<h3><?php echo $lang['PLUS1_NASLOV']; ?></h3>

		<p><?php echo $lang['PLUS1_TEXT']; ?></p>
	</div>
</div>

<div class="show-window2">
<button id="show2" type="button" class="tcon tcon-plus tcon-plus--minus" aria-label="add item">
    <span  class="tcon-visuallyhidden"></span>
</button>
	<div style="display: none;" class="onama-window2">
		<h3><?php echo $lang['PLUS3_NASLOV']; ?></h3>
		<p><?php echo $lang['PLUS3_TEXT']; ?></p>
	</div>
</div>

<div class="show-window3">
<button id="show3" type="button" class="tcon tcon-plus tcon-plus--minus" aria-label="add item">
    <span  class="tcon-visuallyhidden"></span>
</button>
	<div style="display: none;" class="onama-window3">
		<h3><?php echo $lang['PLUS2_NASLOV']; ?></h3>
		<p><?php echo $lang['PLUS2_TEXT']; ?></p>
	</div>
</div>

<div class="show-window4">
<button id="show4" type="button" class="tcon tcon-plus tcon-plus--minus" aria-label="add item">
    <span  class="tcon-visuallyhidden"></span>
</button>
	<div style="display: none;" class="onama-window4">
		<h3><?php echo $lang['PLUS4_NASLOV']; ?></h3>
		<p><?php echo $lang['PLUS4_TEXT']; ?></p>
	</div>
</div>

</div>

<div class="right-proizvodnja">
<h1 class="proizvodnja-naslov"><?php echo $lang['PROIZVODNJA']; ?></h1>
<div class="onama-linija"><hr></div>
<p class="proizvodnja-text"><?php echo $lang['PROIZVODNJA_TEXT']; ?></p>
</div>
</div>



<div class="ekoloska-svest">
<h1 class="es-naslov"><?php echo $lang['EKOLOSKA_SVEST']; ?></h1>
<div class="onama-linija2"><hr></div>
<p class="es-text1"><?php echo $lang['EKO_SVEST_TEXT1']; ?></p>
<p class="es-text2"><?php echo $lang['EKO_SVEST_TEXT2']; ?></p>
</div>


<!--
<div class="suma">
<p class="suma-text">"MI ZNAMO SA DRVETOM"</p>
<div class="onama-linije">
<div class="linija1-onama"><hr></div>
<div class="jelkica"><img src="images/o nama/jelkica.png"></div>
<div class="linija2-onama"><hr></div>
</div>
<div class="ceo"><p>Predrag Kanazir<br>CEO</p></div>

</div>
-->



<!-- footer -->

<?php include "footer.php"; ?>

<!-- end footer -->


</body>
</html>