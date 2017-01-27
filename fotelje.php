
<?php 

require ('core/init.php');

//database fetch
$query = $conn->prepare("SELECT id, fotelja_ime, fotelja_kategorija, fotelja_slika FROM fotelje ORDER BY fotelja_ime ASC");
$query->execute();
$fquery = $query;

//translate
include "lang/common.php"; 


?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $lang['TITLE_ARMCHAIRS']; ?></title>
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

<h1 class="large-title"><?php echo $lang['LARGE_TITLE_ARMCHAIRS']; ?></h1>

<div class="nav-controls-products">
	<a href="/stolice.php"><img id="left-arrow" src="images/icons/icons_arrow_left.png"></a>
<hr>
	<a href="/stolovi.php"><img id="right-arrow" src="images/icons/icons_arrow_right.png"></a>
</div>

<div class="short-descr-cont"><p class="short-description"><?php echo $lang['SHORT_DESCR_ARMCHAIRS']; ?></p></div>

<!-- End Title -->

<!-- filter links -->

<div class="side-filter">
	
		<a href="#"><img src="images/icons/filter/icons_arrow_up.png"></a>

		<?php  

		$link =  '&lang=' . $arr['lang'];
		$link1 =  '?lang=' . $arr['lang'];

		if($_GET['category'] == 'fotelje'){
			echo '<a class="active-filter" href="fotelje.php'.$link1.'"><img src="images/icons/filter/armchairs/icons_big armchair_1.png" title="fotelje"></a>';
		}else{
			echo '<a href="fotelje.php?category=fotelje'.$link.'"><img src="images/icons/filter/armchairs/icons_big armchair.png" title="fotelje"></a>';
		}
		if($_GET['category'] == 'pouf'){
			echo '<a class="active-filter" href="fotelje.php'.$link1.'"><img src="images/icons/filter/armchairs/icons_pouf_1.png" title="pouf"></a>';
		}else{
			echo '<a href="fotelje.php?category=pouf'.$link.'"><img src="images/icons/filter/armchairs/icons_pouf.png" title="pouf"></a>';
		}

	?>

</div>

<!-- end filter links -->


<!-- Products -->
<div class="products">

 <?php

  //sortiranje i filtriranje stolica
  while($fotelje = $query->fetch(PDO::FETCH_ASSOC)):
  	if($_GET['category'] == 'fotelje'){
			$category = 'fotelja';
		}elseif($_GET['category'] == 'pouf'){
			$category = 'pouf';
		}else{
			$category = $fotelje['fotelja_kategorija'];
		}
  	$fotelje_category = $fotelje['fotelja_kategorija'];
	if($fotelje_category == $category):
 ?>

<div class="box-product">
	<a href="fotelja.php?id=<?php echo $fotelje['id'] . '&lang=' . $lang_active; ?>">
	<p class="product-title"><?php echo $fotelje['fotelja_ime']; ?></p>
	<p class="product-subtitle"><?php echo $fotelje['fotelja_kategorija'] ; ?></p>
	<img class="product-img" src="<?php echo $fotelje['fotelja_slika']; ?>">
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