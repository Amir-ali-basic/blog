<?php 

//Konekcija sa bazom podataka

$db['db_host'] = "localhost";
$db['db_user'] = "root"; 
$db['db_pass'] = ""; 
$db['db_name'] = "cms";

//pretvata u konstante

foreach($db as $key => $value){
define(strtoupper($key), $value);
}

// promjenjiva za konekciju sa bazom podataka
$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);
//ulov za provjeru konekcije
// if($connection){
//  echo "We are connected";
// }


?>