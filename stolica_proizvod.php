<?php 



require ('core/init.php');

$id = $_GET['id'];


//database fetch
$query = $conn->prepare("SELECT * FROM stolice WHERE id='$id'");
$query->execute();




//poslednji id
$queryl = $conn->prepare("SELECT max(id) FROM stolice");
$queryl->execute();
$max_id = $queryl->fetch();
$lid = $max_id[0];


//filtriranje stolice
while($stolica_info = $query->fetch(PDO::FETCH_ASSOC)){
				 $stolica_ime = $stolica_info['stolica_ime'];
		         $stolica_kategorija = $stolica_info['stolica_kategorija'];
		         $stolica_kategorija_en = $stolica_info['stolica_kategorija_en'];
		         $stolica_slika = $stolica_info['stolica_slika'];
		         $stolica_opis = $stolica_info ['stolica_opis'];
		         $stolica_opis_eng = $stolica_info ['stolica_opis_eng'];
		         $stolica_opis_rus = $stolica_info ['stolica_opis_rus'];
		         $stolica_familija = $stolica_info ['stolica_familija'];
		         $stolica_small_1 = $stolica_info ['stolica_small1'];
		         $stolica_small_2 = $stolica_info ['stolica_small2'];
		         $stolica_small_3 = $stolica_info ['stolica_small3'];
		         $stolica_small_4 = $stolica_info ['stolica_small4'];
		         $stolica_small_5 = $stolica_info ['stolica_small5'];
		         $mozaik1 = $stolica_info ['mozaik_slika1'];
		         $mozaik2 = $stolica_info ['mozaik_slika2'];
		         $mozaik3 = $stolica_info ['mozaik_slika3'];
		         $dim1 = $stolica_info ['stolica_dim1'];
		         $dim2 = $stolica_info ['stolica_dim2'];
		         $dim3 = $stolica_info ['stolica_dim3'];
		         $dim4 = $stolica_info ['stolica_dim4'];
		         $dim5 = $stolica_info ['stolica_dim5'];
		         $utrosak = $stolica_info ['utrosak'];
		         $zapremina = $stolica_info ['zapremina'];
		         $tezina = $stolica_info ['tezina'];
}




//filitriranje stolica po familiji
 switch ( $stolica_kategorija) {
 case 'stolica':
 $familija1 = 'polufotelja';
 $familija2= 'bar';
 $familija3= 'lounge';
 break;
 case 'polufotelja':
 $familija1 = 'stolica';
 $familija2= 'bar';
 $familija3= 'lounge';
 break;
case 'bar':
 $familija1 = 'polufotelja';
 $familija2= 'stolica';
 $familija3= 'lounge';
 case 'lounge':
 $familija1 = 'polufotelja';
 $familija2= 'stolica';
 $familija3= 'bar';
 break;
}
  	

$queryf = $conn->prepare("SELECT id, stolica_slika, stolica_kategorija, stolica_ime FROM stolice
                           WHERE stolica_familija='$stolica_familija' 
                           AND (stolica_kategorija='$familija1' OR stolica_kategorija='$familija2' OR stolica_kategorija='$familija3')");
$queryf->execute();


//current language information from database
$current_language = $_GET['lang'];


 switch ( $current_language) {
 case 'rs':
 $current_opis = $stolica_opis;
 $current_cat = $stolica_kategorija;
 break;
 case 'en':
 $current_opis = $stolica_opis_eng;
 $current_cat = $stolica_kategorija_en;
 break;
 case 'rus':
 $current_opis = $stolica_opis_rus;
 break;
 case 'esp':
 $current_opis = $stolica_opis_esp;
 break;
 case 'ita':
 $current_opis = $stolica_opis_ita;
 break;
 default: 
 $current_opis = $stolica_opis;
}



//small chairs for sliders empty places
if(empty($stolica_small_4) || empty($stolica_small_5) ){
	$bool = true;
}else{
	$bool = false;
}

if(empty($dim5)){
	$bool1 = true;
}else{
	$bool1 = false;
}




//translate
include "lang/common.php"; 




?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $stolica_ime. " | " .$stolica_kategorija; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" src="images/icons/icon.svg">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="slick-1.6.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick-1.6.0/slick/slick-theme.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

<!-- navbar -->
		
	<?php include "nav.php"; ?> 


		
<!-- navbar end -->

<h1 class="large-title"><?php echo $current_cat; ?></h1>
<h4 class="small-title"><?php echo $stolica_ime; ?></h4>


<!-- product -->

<?php include "nav_controls.php"; ?>


<div class="product-chair">

<div class="product-chair-left">
	
	<div class="carousel-chairs">
		<img src="<?php echo $stolica_small_2; ?>">
 		<img src="<?php echo $stolica_small_3; ?>">
 		<img src="<?php echo $stolica_small_4; ?>">
 		<?php if($bool==false):?>
 		<img src="<?php echo $stolica_small_5; ?>">
 		<img src="<?php echo $stolica_small_1; ?>">
 		<?php endif; ?>
	</div>
		<p class="prev">prev</p>
		<p class="next">next</p>
</div>
<div class="product-chair-right">
		
		<div class="chair-opis">
		<h2><?php echo $lang['OPIS_PROIZVODA']; ?></h2>
		<p class="opis-proizvoda"><?php echo $current_opis; ?></p>
		</div>
		

			<hr class="hr">
		


		<div class="chairs-dimenzije">
		<h2><?php echo $lang['DIMENZIJE']; ?></h2>
		<table>
			<tr>
				<td><img src="images/dimenzije/pf 1.png"></td>
				<td><img src="images/dimenzije/pf 2.png"></td>
				<td><img src="images/dimenzije/pf 3.png"></td>
				<td><img src="images/dimenzije/pf 4.png"></td>
				<?php if($bool1==false):?>
				<td><img src="images/dimenzije/pf 5.png"></td>
				<?php endif; ?>
			</tr>
			<tr>
				<td><?php echo $dim1; ?></td>
				<td><?php echo $dim2; ?></td>
				<td><?php echo $dim3; ?></td>
				<td><?php echo $dim4; ?></td>
				<?php if($bool1==false):?>
				<td><?php echo $dim5; ?></td>
				<?php endif; ?>
			</tr>
		</table>

	</div>

		<hr class="hr">
	

	<div class="chairs-specifikacije">
		<h2><?php echo $lang['SPECIFIKACIJE']; ?></h2>

		
		<table>
			<tr>
				<td><img src="images/dimenzije/icons_box.png"></td>
				<td><img src="images/dimenzije/icons_weight.png"></td>
				<td><img src="images/dimenzije/icons_fabrics.png"></td>
			</tr>
			<tr>
				<td><?php echo $zapremina; ?>m<sup>3</sup></td>
				<td><?php echo $tezina; ?>kg</td>
				<td><?php echo $utrosak; ?>m</td>
			</tr>
		</table>

	</div>

		<hr class="hr">


	<div class="chairs-preuzimanja">
		<h2><?php echo $lang['PREUZIMANJA']; ?></h2>

		<table>
			<tr>
				<td><a target="blank" href="pdf.php?id=<?php echo $id; ?>"><img src="images/icons/icons_download.png"></a></td>
				<td><a href="#"><img src="images/icons/icons_download.png"></a></td>
			</tr>
			<tr>
				<td class="preuzimanja-subtitle">pdf</td>
				<td class="preuzimanja-subtitle">stamp</td>
			</tr>
		</table>

		
		

	</div>

</div>
	
</div>





<!-- end product -->

<!-- set of images -->
<div class="mosaic-chairs">

   <?php 
if(!empty($mozaik1)):?>  

	<img src="<?php echo $mozaik1 ;?>">

   <?php endif;
if(!empty($mozaik2)):?>

    <img src="<?php echo $mozaik2 ;?>">

	<?php endif;
if(!empty($mozaik3)):?>

	<img src="<?php echo $mozaik3 ;?>">
	
	<?php endif; ?>

</div>

<!-- end of set-->


<!-- family -->

<?php
if(!empty($stolica_familija)): 
?>
<div class="chair-family">
<h1 class="family-title"><?php echo $lang['STOLICA-FAMILIJA']; ?></h1>
<hr>
<?php else: ?>
	<h1></h1>
<?php endif; ?>

<?php 
// prikazivanje stolica iz iste familije

if(!empty($stolica_familija)): 
	while($stolica_fam = $queryf->fetch(PDO::FETCH_ASSOC)):
?>
	
	<a href="stolica_proizvod.php?id=<?php echo $stolica_fam['id']; ?>">
	<div class="chair-family1">
		<p class="chair-family-title"><?php echo $stolica_fam['stolica_ime']; ?></p>
		<p class="chair-family-subtitle"><?php echo $stolica_fam['stolica_kategorija']; ?></p>
		<img class="chair-family-img" src="<?php echo $stolica_fam['stolica_slika']; ?>">	
	</div>
	</a>

	<?php endwhile; ?>
<?php else: ?>
	<h1></h1>
<?php endif; ?>


</div>
</div>

<!-- end family -->


<!-- footer -->

<?php include "footer.php"; ?>

<!-- end footer -->




</body>
</html>