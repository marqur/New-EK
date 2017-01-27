<?php
session_start();
header('Cache-control: private'); // IE 6 FIX
if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];
// register the session and set the cookie
$_SESSION['lang'] = $lang;

}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'rs';
}
switch ($lang) {
case 'rs':
$lang_file = 'lang.rs.php';
break;
case 'en':
$lang_file = 'lang.en.php';
break;
case 'rus':
$lang_file = 'lang.rus.php';
break;
default:
$lang_file = 'lang.rs.php';
}
include_once 'lang/'.$lang_file;
?>