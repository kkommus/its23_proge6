<?php
//sinu andmed
$db_server = 'localhost';
$db_andmebaas = 'drooniralli';
$db_kasutaja = 'keiti';
$db_salasona = 'sh2mp00n';

//ühendus andmebaasiga
$yhendus = mysqli_connect($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);
//ühenduse kontroll
if(!$yhendus){
	die('Ei saa ühendust andmebaasiga');
}

//päring
$paring = 'SELECT * FROM drooniralli';
$valjund = mysqli_query($yhendus, $paring);



?>