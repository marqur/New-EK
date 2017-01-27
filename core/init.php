<?php
$server = 'localhost';
$username = 'root';
$password = 'vcfimh10';
$database = 'eurokancom';
try{
	$conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
