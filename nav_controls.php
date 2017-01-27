
<?php

$page = $_SERVER['PHP_SELF'];
$back_page = '';


 if(strpos($location, stolica_proizvod)){
    $back_page = '/stolice.php' . $menu_item;
}elseif(strpos($location, sto_proizvod)){
     $back_page = '/stolovi.php' . $menu_item;
}elseif(strpos($location, fotelja)){
     $back_page = '/fotelje.php' . $menu_item;
}elseif(strpos($location, referenca)){
     $back_page = '/reference.php' . $menu_item;
}

?>
<center>
<div class="navigation">

	<?php if($id > 1): ?>
	<a href="<?php echo $page .'?id='. ($id-1) . $character . '?lang=' . $arr['lang'];?>"><img id="left-pointer" src="images/icons/icons_arrow_left.png"></a>
	<?php endif; ?>
	<img id="line-left" src="images/icons/line.png">
	<a href="<?php echo $back_page; ?>"><img id="nav-center" src="images/icons/icons_mozaik.png"></a>
	<img id="line-right" src="images/icons/line.png">
	<?php if($id < $lid): ?>
	<a href="<?php echo $page .'?id='. ($id+1) . $character . '?lang=' . $arr['lang'];?>"><img id="right-pointer" src="images/icons/icons_arrow_right.png"></a>
	<?php endif; ?>
</div>
</center>

