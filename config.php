

<?php

$dbserver = 'localhost';
$andmebaas = 'drooniralli';
$kasutaja = 'keiti';
$pw = 'sh2mp00n';

$yhendus = mysqli_connect($dbserver, $kasutaja, $pw, $andmebaas);

if(!$yhendus){
	die("Ei saa ühendust andmebaasiga");
}

?>