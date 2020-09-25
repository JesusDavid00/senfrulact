<?php
$link='mysql:host=localhost;dbname=senfrulact';
$pass="";
$users="root";

try {

	$pdo= new PDO ($link,$users,$pass);
	/* //echo 'nada'; */
	/* echo "la base de datso esta conectado" */
} catch (PDOException $e) {
		print "¡Error!:". $e->getMessage() . "<br/>";
		die();
	
}
