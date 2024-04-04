<?php
//***objektorjenteeritud***//
//sinu andmed
$db_server = 'localhost';
$db_andmebaas = 'drooniralli';
$db_kasutaja = 'keiti';
$db_salasona = 'sh2mp00n';
//yhenduse loomine
$yhendus = new mysqli($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);
// ühenduse kontroll
if(!$yhendus){
	die('Ei saa ühendust andmebaasiga');
}
//päring
$paring = 'SELECT * FROM drooniralli';	
$valjund = $yhendus->query($paring);
//väljund
while($rida = $valjund->fetch_row()){
	var_dump($rida);
	}
//ühenduste sulgemine
$yhendus->close();
?>