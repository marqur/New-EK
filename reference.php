
<?php 

require ('core/init.php');

//database fetch
$query = $conn->prepare("SELECT * FROM reference");
$query->execute();
$rquery = $query;

//translate
include "lang/common.php"; 


?>



<!DOCTYPE html>
<html>
<head>
	<title><?php echo $lang['TITLE_REFERENCES']; ?></title>
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

<h1 class="large-title"><?php echo $lang['REFERENCE']; ?></h1>
<h3 id="references-small-title" class="small-title"><?php echo $lang['SHORT_DESCR_REFERENCES']; ?></h3>

<div class="onama-linija2"><hr></div>

	<div id='ref-lista' class="uvod-onama-cont">
	<p class="uvod-onama"><?php echo $lang['LARGE_DESCR_REFERENCES']; ?></p>
	</div>


	<div class="referentna-lista-cont">
	<a target="blank" class="referentna-lista" href="images/references/referentna lista.pdf">Referentna lista</a>
	</div>

<!-- filter links -->

<div class="side-filter">
   	<a href="#"><img src="images/icons/filter/icons_arrow_up.png"></a>
<?php  

		$link =  '&lang=' . $arr['lang'];
		$link1 =  '?lang=' . $arr['lang'];

		if($_GET['category'] == 'caffe'){
			echo '<a class="active-filter" href="reference.php'.$link1.'"><img src="images/icons/filter/references/icons_caffe_1.png" title="caffe"></a>';
		}else{
			echo '<a href="reference.php?category=caffe'.$link.'"><img src="images/icons/filter/references/icons_caffe.png" title="caffe"></a>';
		}
		if($_GET['category'] == 'hotel'){
			echo '<a class="active-filter" href="reference.php'.$link1.'"><img src="images/icons/filter/references/icons_hotel_1.png" title="hotel"></a>';
		}else{
			echo '<a href="reference.php?category=hotel'.$link.'"><img src="images/icons/filter/references/icons_hotel.png" title="hotel"></a>';
		}
		if($_GET['category'] == 'restoran'){
			echo '<a class="active-filter" href="reference.php'.$link1.'"><img src="images/icons/filter/references/icons_restoran_1.png" title="restoran"></a>';
		}else{
			echo '<a href="reference.php?category=restoran'.$link.'"><img src="images/icons/filter/references/icons_restoran.png" title="restoran"></a>';
		}
		if($_GET['category'] == 'ostalo'){
			echo '<a class="active-filter" href="reference.php'.$link1.'"><img src="images/icons/filter/references/icons_ostalo_1.png" title="ostalo"></a>';
		}else{
			echo '<a href="reference.php?category=ostalo'.$link.'"><img src="images/icons/filter/references/icons_ostalo.png" title="ostalo"></a>';
		}
		

	?>
</div>



<!-- end filter links -->

<!-- references -->


<div class="references-block">

	<?php

  //sortiranje i filtriranje referenci
  		while($reference = $query->fetch(PDO::FETCH_ASSOC)):
  			if($_GET['category'] == 'hotel'){
					$category = 'hotel';
				}elseif($_GET['category'] == 'caffe'){
					$category = 'caffe';
				}elseif($_GET['category'] == 'restoran'){
					$category = 'restoran';	
				}elseif($_GET['category'] == 'ostalo'){
					$category = 'ostalo';	
				}else{
					$category = $reference['referenca_kategorija'];
				}
  			$reference_category = $reference['referenca_kategorija'];
			if($reference_category == $category):
    ?>
	
	<div class="box-reference">
	<a href="referenca.php?id=<?php echo $reference['id']; ?>">
		<p class="reference-title"><?php echo $reference['referenca_naslov']; ?></p>
		<p class="reference-subtitle"><?php echo $reference['referenca_podnaslov']; ?></p>
		<div class="reference-img1">
		<img class="reference-img" src="<?php echo $reference['referenca_slika']; ?>">
		</div>
	</a>
	</div>

	<?php
		endif;
		endwhile; 
    ?>

</div>



<!-- end references -->


<!-- footer -->

<?php include "footer.php"; ?>

<!-- end footer -->
</body>
</html>