<?php 



require ('core/init.php');

$id = $_GET['id'];


//database fetch
$query = $conn->prepare("SELECT * FROM fotelje WHERE id='$id'");
$query->execute();




//poslednji id
$queryl = $conn->prepare("SELECT max(id) FROM fotelje");
$queryl->execute();
$max_id = $queryl->fetch();
$lid = $max_id[0];


//filtriranje fotelje
while($fotelja_info = $query->fetch(PDO::FETCH_ASSOC)){
				 $fotelja_ime = $fotelja_info['fotelja_ime'];
		         $fotelja_kategorija = $fotelja_info['fotelja_kategorija'];
		         $fotelja_slika = $fotelja_info['fotelja_slika'];
		         $fotelja_opis = $fotelja_info ['fotelja_opis'];
		         $fotelja_opis_eng = $fotelja_info ['fotelja_opis_eng'];
		         $fotelja_opis_rus = $fotelja_info ['fotelja_opis_rus'];
		         $fotelja_familija = $fotelja_info ['fotelja_familija'];
		         $fotelja_small_1 = $fotelja_info ['fotelja_small1'];
		         $fotelja_small_2 = $fotelja_info ['fotelja_small2'];
		         $fotelja_small_3 = $fotelja_info ['fotelja_small3'];
		         $fotelja_small_4 = $fotelja_info ['fotelja_small4'];
		         $fotelja_small_5 = $fotelja_info ['fotelja_small5'];
		         $mozaik1 = $fotelja_info ['mozaik_slika1'];
		         $mozaik2 = $fotelja_info ['mozaik_slika2'];
		         $mozaik3 = $fotelja_info ['mozaik_slika3'];
		         $dim1 = $fotelja_info ['fotelja_dim1'];
		         $dim2 = $fotelja_info ['fotelja_dim2'];
		         $dim3 = $fotelja_info ['fotelja_dim3'];
		         $dim4 = $fotelja_info ['fotelja_dim4'];
		         $dim5 = $fotelja_info ['fotelja_dim5'];

}




//filitriranje fotelja po familiji
 switch ( $fotelja_kategorija) {
 case 'fotelja':
 $familija1 = 'pouf';
 break;
 case 'pouf':
 $familija1 = 'fotelja';
 break;
}
  	

$queryf = $conn->prepare("SELECT id, fotelja_slika, fotelja_kategorija, fotelja_ime FROM fotelje
                           WHERE fotelja_familija='$fotelja_familija' 
                           AND (fotelja_kategorija='$familija1')");
$queryf->execute();


//current language information from database
$current_language = $_GET['lang'];


 switch ( $current_language) {
 case 'rs':
 $current_opis = $fotelja_opis;
 break;
 case 'en':
 $current_opis = $fotelja_opis_eng;
 break;
 case 'rus':
 $current_opis = $fotelja_opis_rus;
 break;
 case 'esp':
 $current_opis = $fotelja_opis_esp;
 break;
 case 'ita':
 $current_opis = $fotelja_opis_ita;
 break;
 default: 
 $current_opis = $fotelja_opis;
}



//small chairs for sliders empty places
if(empty($fotelja_small_4) || empty($fotelja_small_5) ){
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
	<title><?php echo $fotelja_ime. " | " .$fotelja_kategorija; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" src="images/icons/icon.svg">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="slick-1.6.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick-1.6.0/slick/slick-theme.css"/>
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

<!-- navbar -->
		
	<?php include "nav.php"; ?> 


		
<!-- navbar end -->

<h1 class="large-title"><?php echo $fotelja_kategorija; ?></h1>
<h4 class="small-title"><?php echo $fotelja_ime; ?></h4>


<!-- product -->

<?php include "nav_controls.php"; ?>


<div class="product-chair">

<div class="product-chair-left">
	<div class="carousel-chairs">
		<img src="<?php echo $fotelja_small_1; ?>">
 		<img src="<?php echo $fotelja_small_2; ?>">
 		<?php if($bool==false):?>
 		<img src="<?php echo $fotelja_small_3; ?>">
 		<img src="<?php echo $fotelja_small_4; ?>">
 		<img src="<?php echo $fotelja_small_5; ?>">
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
				<?php if($bool1==false):?>
				<td><img src="images/dimenzije/pf 4.png"></td>
				<td><img src="images/dimenzije/pf 5.png"></td>
				<?php endif; ?>
			</tr>
			<tr>
				<td><?php echo $dim1; ?></td>
				<td><?php echo $dim2; ?></td>
				<td><?php echo $dim3; ?></td>
				<?php if($bool1==false):?>
				<td><?php echo $dim4; ?></td>
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
				<td>12m<sup>3</sup></td>
				<td>7kg</td>
				<td>0.75m</td>
			</tr>
		</table>

	</div>

		<hr class="hr">


	<div class="chairs-preuzimanja">
		<h2><?php echo $lang['PREUZIMANJA']; ?></h2>

		<table>
			<tr>
				<td><a href="#"><img src="images/icons/icons_download.png"></a></td>
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



<div class="chair-family">
<h1 class="family-title"><?php echo $lang['STOLICA-FAMILIJA']; ?></h1>
<hr>

<?php 
// prikazivanje fotelja iz iste familije

if(!empty($fotelja_familija)): 
	while($fotelja_fam = $queryf->fetch(PDO::FETCH_ASSOC)):
?>
	
	<a href="fotelja.php?id=<?php echo $fotelja_fam['id']; ?>">
	<div class="chair-family1">
		<p class="chair-family-title"><?php echo $fotelja_fam['fotelja_ime']; ?></p>
		<p class="chair-family-subtitle"><?php echo $fotelja_fam['fotelja_kategorija']; ?></p>
		<img class="chair-family-img" src="<?php echo $fotelja_fam['fotelja_slika']; ?>">	
	</div>
	</a>

	<?php endwhile; ?>
<?php else: ?>
	<h1>/</h1>
<?php endif; ?>


</div>
</div>

<!-- end family -->

<!-- footer -->

<?php include "footer.php"; ?>

<!-- end footer -->




</body>
</html>