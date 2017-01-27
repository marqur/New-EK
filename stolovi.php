
<?php 

require ('core/init.php');

//database fetch
$query = $conn->prepare("SELECT id, sto_ime, sto_kategorija, sto_slika FROM sto ORDER BY sto_ime ASC");
$query->execute();
$dquery = $query;


//translate
include "lang/common.php"; 


?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $lang['TITLE_TABLES']; ?></title>
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

<h1 class="large-title"><?php  echo $lang['TITLE_TABLES']; ?></h1>

<div class="nav-controls-products">
	<a href="/fotelje.php"><img id="left-arrow" src="images/icons/icons_arrow_left.png"></a>
<hr>
	<a href="/stolice.php"><img id="right-arrow" src="images/icons/icons_arrow_right.png"></a>
</div>

<div class="short-descr-cont"><p class="short-description"><?php  echo $lang['SHORT_DESCR_TABLES']; ?></p></div>

<!-- End Title -->


<!-- filter links -->

<div class="side-filter">
   	<a href="#"><img src="images/icons/filter/icons_arrow_up.png"></a>

	<?php  

		$link =  '&lang=' . $arr['lang'];
		$link1 =  '?lang=' . $arr['lang'];

		if($_GET['category'] == 'fiksni'){
			echo '<a class="active-filter" href="stolovi.php'.$link1.'"><img src="images/icons/filter/tables/icons_sto f_1.png" title="fiksni stolovi"></a>';
		}else{
			echo '<a href="stolovi.php?category=fiksni'.$link.'"><img src="images/icons/filter/tables/icons_sto f.png" title="fiksni stolovi"></a>';
		}
		if($_GET['category'] == 'razvlacenje'){
			echo '<a class="active-filter" href="stolovi.php'.$link1.'"><img src="images/icons/filter/tables/icons_sto r_1.png" title="stolovi na razvlacenje"></a>';
		}else{
			echo '<a href="stolovi.php?category=razvlacenje'.$link.'"><img src="images/icons/filter/tables/icons_sto r.png" title="stolovi na razvlacenje"></a>';
		}

	?>

</div>

<!-- end filter links -->



<!-- Products -->

<div class="products-table">

	 <?php

  //sortiranje i filtriranje stolica
    while($stolovi = $query->fetch(PDO::FETCH_ASSOC)):
  	


  	if($_GET['category'] == 'fiksni'){
			$category = 'fiksni';
		}elseif($_GET['category'] == 'razvlacenje'){
			$category = 'razvlacenje';
		}else{
			$category = $stolovi['sto_kategorija'];
		}
  	$sto_category = $stolovi['sto_kategorija'];
	if($sto_category == $category):
 ?>


	<div class="box-product-table">
	<a href="sto_proizvod.php?id=<?php echo $stolovi['id'] . '&lang=' . $lang_active;; ?>">
	<p class="product-title-table"><?php echo $stolovi['sto_ime']; ?></p>
	<p class="product-subtitle-table">sto</p>
	<img class="product-img-table" src="<?php echo $stolovi['sto_slika']; ?>">
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