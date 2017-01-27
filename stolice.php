
<?php 

require ('core/init.php');

//database fetch
$query = $conn->prepare("SELECT id, stolica_ime, stolica_kategorija, stolica_kategorija_en, stolica_slika FROM stolice ORDER BY stolica_ime ASC");
$query->execute();
$dquery = $query;

//translate
include "lang/common.php"; 


 

$current_language = $_GET['lang'];


?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $lang['TITLE_CHAIRS']; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="http://www.iconsdb.com/icons/preview/green/letter-e-xxl.png">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="javascript/Dropit-1.1.1/dropit.css" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<?php include "nav.php"; ?>

<!-- Title -->

<h1 class="large-title"><?php echo $lang['LARGE_TITLE_CHAIRS']; ?></h1>

<div class="nav-controls-products">
	<a href="/stolovi.php"><img id="left-arrow" src="images/icons/icons_arrow_left.png"></a>
<hr>
	<a href="/fotelje.php"><img id="right-arrow" src="images/icons/icons_arrow_right.png"></a>
</div>

<div class="short-descr-cont"><p class="short-description"><?php echo $lang['SHORT_DESCR_CHAIRS']; ?></p></div>



<!-- End Title -->

<!-- filter links -->

<div class="side-filter">
   	<a href="#"><img src="images/icons/filter/icons_arrow_up.png"></a>

	<?php  

		$link =  '&lang=' . $arr['lang'];
		$link1 =  '?lang=' . $arr['lang'];

		if($_GET['category'] == 'stolice'){
			echo '<a class="active-filter" href="stolice.php'.$link1.'"><img src="images/icons/filter/chairs/icons_stolica_1.png" title="stolice"></a>';
		}else{
			echo '<a href="stolice.php?category=stolice'.$link.'"><img src="images/icons/filter/chairs/icons_stolica.png" title="stolice"></a>';
		}
		if($_GET['category'] == 'polufotelje'){
			echo '<a class="active-filter" href="stolice.php'.$link1.'"><img src="images/icons/filter/chairs/icons_polufotelja_1.png" title="polufotelje"></a>';
		}else{
			echo '<a href="stolice.php?category=polufotelje'.$link.'"><img src="images/icons/filter/chairs/icons_polufotelja.png" title="polufotelje"></a>';
		}
		if($_GET['category'] == 'lounge'){
			echo '<a class="active-filter" href="stolice.php'.$link1.'"><img src="images/icons/filter/chairs/icons_lounge_1.png" title="lounge"></a>';
		}else{
			echo '<a href="stolice.php?category=lounge'.$link.'"><img src="images/icons/filter/chairs/icons_lounge.png" title="lounge"></a>';
		}
		if($_GET['category'] == 'bar'){
			echo '<a class="active-filter" href="stolice.php'.$link1.'"><img src="images/icons/filter/chairs/icons_bar_1.png" title="bar"></a>';
		}else{
			echo '<a href="stolice.php?category=bar'.$link.'"><img src="images/icons/filter/chairs/icons_bar.png" title="bar"></a>';
		}

	?>

</div>

<!-- end filter links -->


<!-- Products -->


<div class="products">

 <?php


  //sortiranje i filtriranje stolica
  while($stolice = $query->fetch(PDO::FETCH_ASSOC)):
  	if($_GET['category'] == 'stolice'){
			$category = 'stolica';
		}elseif($_GET['category'] == 'polufotelje'){
			$category = 'polufotelja';
		}elseif($_GET['category'] == 'bar'){
			$category = 'bar';
		}elseif($_GET['category'] == 'lounge'){
			$category = 'lounge';
		}else{
			$category = $stolice['stolica_kategorija'];
		}
  	$stolice_category = $stolice['stolica_kategorija'];

  	switch ( $current_language) {
 case 'rs':
 $current_cat = $stolice['stolica_kategorija'];
 break;
 case 'en':
 $current_cat = $stolice['stolica_kategorija_en'];
 break;
 default: 
 $current_opis = $stolice['stolica_kategorija'];
}

	if($stolice_category == $category):
 ?>

	<div class="box-product">
	<a href="stolica_proizvod.php?id=<?php echo $stolice['id'] . '&lang=' . $lang_active; ?>">
	<p class="product-title"><?php echo $stolice['stolica_ime']; ?></p>
	<p class="product-subtitle"><?php echo $current_cat; ?></p>
	<img class="product-img" src="<?php echo $stolice['stolica_slika']; ?>">
	</a>
	</div>


<?php
	endif;
	endwhile; 
?>

</div>

<!-- End Products -->

<!-- footer -->

<?php include "footer.php"; ?>


<!-- end footer -->

</body>
</html>