<?php  

require ('core/init.php');

$id = $_GET['id'];


//database fetch
$query = $conn->prepare("SELECT * FROM novosti WHERE id='$id'");
$query->execute();

while($novost = $query->fetch(PDO::FETCH_ASSOC)){
				 $novost_naslov = $novost['novost_naslov'];
		         $novost_podnaslov = $novost['novost_podnaslov'];
		         $novost_datum = $novost['novost_datum'];
		         $novost_link = $novost ['novost_link'];
		         $novost_text = $novost ['novost_text'];
}

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



<div class="datum-novost">
	<p><?php echo $novost_datum; ?></p>
</div>

<h1 class="large-title-novost"><?php echo $novost_naslov; ?></h1>
<p class="podnaslov-novost"><?php echo $novost_podnaslov; ?></p>

<div class="novost-hr">
	<hr>
</div>


<div class="novost-text">
	<p><?php echo $novost_text; ?></p>
</div>

<div class="website-novost">
	<a target="blank" href="<?php echo $novost_link; ?>"><?php echo $novost_link; ?></a>
</div>



<!-- newsletter 
<div class="newsletter-novost">
<h1 class="large-title-news">NEWSLETTER</h1>
<h3 class="small-title-novost"><?php echo $lang['NEWSLETTER_BELOW']; ?></h3>
  <div class="newsletter-form">
    <form action="#">
     
      <input type="email" name="email" placeholder="<?php echo $lang['EMAIL_ADDRESS']; ?>">
      <input type="submit">
      
    </form>
  </div>
</div>

<!-- end newsletter -->

<!-- footer -->

<?php include "footer.php"; ?>

<!-- end footer -->






</body>
</html>