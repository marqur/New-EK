
<?php
require ('core/init.php');

//database fetch
$query = $conn->prepare("SELECT * FROM novosti");
$query->execute();
$dquery = $query;



//translate
include "lang/common.php"; 


?>


<!DOCTYPE html>
<html>
<head>
	<title>Eurokancom</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="http://www.iconsdb.com/icons/preview/green/letter-e-xxl.png">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="javascript/Dropit-1.1.1/dropit.css" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	

</head>

<body>

<!-- navbar -->
		
	<?php include "nav.php"; ?>
		
<!-- navbar end -->	

<h1 class="large-title">NOVOSTI</h1>
<h1 class="small-title">BUDITE UVEK U TOKU</h1>
<div class="novosti-hr">
<hr>
</div>

<div class="novosti">

<?php 
while($novosti = $query->fetch(PDO::FETCH_ASSOC)):
?>


<div class="box-novost">
<a href="novost.php?id=<?php echo $novosti['id'] . '&lang=' . $lang_active; ?>">
		 <p class="category-novost"><?php echo $novosti['novost_datum']; ?></p>
		 <p id="title-novost"><?php echo $novosti['novost_naslov']; ?></p>
		 <div id="subtitle-cont"><p id="subtitle-novost"><?php echo $novosti['novost_podnaslov']; ?></p></div>
		 </a>
	</div>
	<hr>

<?php
	endwhile; 
?>	

</div>



<!-- footer -->

<?php include "footer.php"; ?>

<!-- end footer -->






</body>
</html>