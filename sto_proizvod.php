<?php 



require ('core/init.php');

$id = $_GET['id'];


//database fetch
$query = $conn->prepare("SELECT * FROM sto WHERE id='$id'");
$query->execute();
$query = $query;



//poslednji id
$queryl = $conn->prepare("SELECT max(id) FROM sto");
$queryl->execute();
$max_id = $queryl->fetch();
$lid = $max_id[0];


//filtriranje stolova
while($sto_info = $query->fetch(PDO::FETCH_ASSOC)){
				 $sto_ime = $sto_info['sto_ime'];
		         $sto_kategorija = $sto_info['sto_kategorija'];
		         $sto_slika = $sto_info['sto_slika'];
		         $sto_opis = $sto_info ['sto_opis'];
		         $sto_opis_eng = $sto_info ['sto_opis_eng'];
		         $sto_opis_rus = $sto_info ['sto_opis_rus'];
		         $sto_familija = $sto_info ['sto_familija'];
		         $sto_small_1 = $sto_info ['sto_small1'];
		         $sto_small_2 = $sto_info ['sto_small2'];
		         $sto_small_3 = $sto_info ['sto_small3'];
		         $sto_dim1 = $sto_info ['sto_dim1'];
		         $sto_dim2 = $sto_info ['sto_dim2'];
		         $sto_dim3 = $sto_info ['sto_dim3'];
		         $sto_dim4 = $sto_info ['sto_dim4'];
		         $mozaik1 = $sto_info ['mozaik_slika1'];
		         $mozaik2 = $sto_info ['mozaik_slika2'];
		         $mozaik3 = $sto_info ['mozaik_slika3'];
		         $tezina = $sto_info ['tezina'];
		         $zapremina = $sto_info ['zapremina'];

}


//filitriranje stolova po familiji
 

 switch ( $sto_kategorija) {
 case 'fiksni':
 $kategorija = 'razvlacenje';
 break;
 case 'razvlacenje':
 $kategorija = 'fiksni';
 break;
}

$queryf = $conn->prepare("SELECT id, sto_slika, sto_kategorija, sto_ime FROM sto
                           WHERE sto_familija='$sto_familija'
                           AND sto_kategorija='$kategorija'");
$queryf->execute();

$current_language = $_GET['lang'];


 switch ( $current_language) {
 case 'rs':
 $current_opis = $sto_opis;
 break;
 case 'en':
 $current_opis = $sto_opis_eng;
 break;
 case 'rus':
 $current_opis = $sto_opis_rus;
 break;
 case 'esp':
 $current_opis = $sto_opis_esp;
 break;
 case 'ita':
 $current_opis = $sto_opis_ita;
 break;
 default: 
 $current_opis = $sto_opis;
}



//small chairs for sliders empty places

if(empty($sto_small_2)){
	$bool = true;
}else{
	$bool = false;
}

if(empty($sto_dim4)){
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
	<title><?php echo $sto_ime; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" src="images/icons/icon.svg">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="slick-1.6.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick-1.6.0/slick/slick-theme.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

<!-- navbar -->
		
	<?php include "nav.php"; ?>
		
<!-- navbar end -->	

<h1 class="large-title">Sto</h1>
<h3 class="small-title"><?php echo $sto_ime; ?></h3>

<?php include "nav_controls.php"; ?>


<!-- product -->

<div class="product-tables">

<div class="product-tables-left">
	<div class="carousel-tables">
		<img src="<?php echo $sto_small_1; ?>">
		<?php if($bool==false):?>
 		<img src="<?php echo $sto_small_2; ?>">
 		<?php endif; ?>
	</div>
		<?php if($bool==false):?>
		<p class="t-prev">prev</p>
		<p class="t-next">next</p>
		<?php endif; ?>
</div>
<div class="product-tables-right">
		
		<div class="tables-opis">
		<h2><?php echo $lang['OPIS_PROIZVODA']; ?></h2>
		<p class="opis-proizvoda"><?php echo $current_opis; ?></p>
		</div>
		

			<hr class="hr-tables">
		

<div class=" specs-preuzimanja">
		<div class="tables-dimenzije">
		<h2><?php echo $lang['DIMENZIJE']; ?></h2>
		<table>
			<tr>
				<td><img src="images/dimenzije/sto 1.png"></td>
				<td><img src="images/dimenzije/sto 2.png"></td>
				<td><img src="images/dimenzije/sto 3.png"></td>
				<?php if($bool1==false):?>
				<td><img src="images/dimenzije/sto 4.png"></td>
				<?php endif; ?>
			</tr>
			<tr>
				<td><?php echo $sto_dim1; ?></td>
				<td><?php echo $sto_dim2; ?></td>
				<td><?php echo $sto_dim3; ?></td>
				<td><?php echo $sto_dim4; ?></td>
			</tr>
		</table>

	</div>

	
	   <div class="tables-specifikacije">
		<h2><?php echo $lang['SPECIFIKACIJE']; ?></h2>

		
		<table>
			<tr>
				<td><img src="images/dimenzije/icons_box.png"></td>
				<td><img src="images/dimenzije/icons_weight.png"></td>
			</tr>
			<tr>
				<td><?php echo $zapremina; ?>m<sup>3</sup></td>
				<td><?php echo $tezina; ?>kg</td>
			</tr>
		</table>

	</div>
</div>

<hr class="hr-tables">

	<div class="tables-preuzimanja">
		<h2><?php echo $lang['PREUZIMANJA']; ?></h2>

		<table>
			<tr>
				<td><a target="blank" href="pdf-sto.php?id=<?php echo $id; ?>"><img src="images/icons/download.png"></a></td>
				<td><a href="#"><img src="images/icons/download.png"></a></td>
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

<div id="tables-mosaic"  class="mosaic-chairs">
	<img src="<?php echo $mozaik1; ?>">
	<img src="<?php echo $mozaik2; ?>">
	<img src="<?php echo $mozaik3; ?>">
</div>

<!-- end of set-->


<!-- family -->

<?php
if(!empty($stolica_familija)): 
?>

<div class="table-family">
<h1 class="family-title"><?php echo $lang['STOLICA-FAMILIJA']; ?></h1>

<?php else: ?>
	<h1></h1>
<?php endif; ?>

<?php 
// prikazivanje stolica iz iste familije
 if(!empty($sto_familija)): 
while($sto_fam = $queryf->fetch(PDO::FETCH_ASSOC)): ?>
	
	<a href="sto_proizvod.php?id=<?php echo $sto_fam['id']; ?>">
	<div class="table-family1">
		<p class="table-family-title"><?php echo $sto_fam['sto_ime']; ?></p>
		<p class="table-family-subtitle">Sto</p>
		<img class="table-family-img" src="<?php echo $sto_fam['sto_slika']; ?>">	
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
<script type="text/javascript">$('.carousel-tables').slick({
  arrows: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  fade: false,
  dots: true,
  cssEase: 'linear'
});</script>


</body>
</html>