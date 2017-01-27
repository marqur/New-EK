<?php


require ('core/init.php');

$id = $_GET['id'];


//database fetch
$query = $conn->prepare("SELECT * FROM reference WHERE id='$id'");
$query->execute();
$rquery = $query;




//filtriranje stolice
while($referenca = $query->fetch(PDO::FETCH_ASSOC)){
				 $referenca_ime = $referenca['referenca_ime'];
				 $referenca_kategorija = $referenca['referenca_kategorija'];
				 $referenca_naslov = $referenca['referenca_naslov'];
				 $referenca_podnaslov = $referenca['referenca_podnaslov'];
				 $referenca_opis = $referenca['referenca_opis'];
				 $referenca_website = $referenca['referenca_website'];
				 $slika1 = $referenca['ref_slika1'];
				 $slika2 = $referenca['ref_m_slika2'];
				 $slika3 = $referenca['ref_m_slika3'];
				 $slika4 = $referenca['ref_m_slika4'];
				 $slika5 = $referenca['ref_m_slika5'];
				 $slika6 = $referenca['ref_slika6'];
				 $slika7 = $referenca['ref_slika7'];
}

//poslednji id
$queryl = $conn->prepare("SELECT max(id) FROM reference");
$queryl->execute();
$max_id = $queryl->fetch();
$lid = $max_id[0];


//translate
include "lang/common.php"; 




?>



<!DOCTYPE html>
<html>
<head>
	<title>Reference</title>
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

<h1 class="large-title"><?php echo $referenca_kategorija; ?></h1>
<h3 id="references-small-title" class="small-title"><?php echo $referenca_ime ?></h3>


	<!--<div class="linija-referenca">
		<hr>
	</div>-->

	<?php include "nav_controls.php"; ?>

	<div class="uvod-referenca-cont">
	<p class="uvod-referenca"><?php echo $referenca_opis; ?>
    </p> 
    </div>
    <div class="website-referenca-cont">
	<a target="blank" class="website-referenca" href="<?php echo $referenca_website; ?>">More info.</a>
	</div>



<!-- mozaik slika -->

<div class="referenca-images">
	<div class="ref-img1">
		<img src="<?php echo $slika1; ?>">
	</div>
	<div class="ref-img23">
		<div class="ref-img2">
			<?php if(!empty($slika2)): ?><img src="<?php echo $slika2; ?>"><?php endif; ?>
		</div>
		<div class="ref-img3">
			<?php if(!empty($slika3)): ?><img src="<?php echo $slika3; ?>"><?php endif; ?>
		</div>
	</div>
	<div class="ref-img45">
		<div class="ref-img4">
			<?php if(!empty($slika4)): ?><img src="<?php echo $slika4; ?>"><?php endif; ?>
		</div>
		<div class="ref-img5">
			<?php if(!empty($slika5)): ?><img src="<?php echo $slika5; ?>"><?php endif; ?>
		</div>
	</div>
	<div class="ref-img6">
		<img src="<?php echo $slika6; ?>">
	</div>
	<div class="ref-img7">
		<img src="<?php echo $slika7; ?>">
	</div>
</div>

<!-- end mozaik slika -->


<!-- serijski proizvodi -->
<br><br>
<hr>


<!-- end serijski proizvodi -->

<!-- footer -->

<?php include "footer.php"; ?>

<!-- end footer -->
</body>
</html>