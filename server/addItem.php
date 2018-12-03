<?php 
//inisialisasi user
$user   = 'user001';

// dapatkan database
$dbFile = "../database/users/$user/item/db$user.json";
$dbUser = file_get_contents($dbFile);
$dbUser = json_decode($dbUser);

// dapatkan data sebagai json
$item   = file_get_contents('php://input');
$item   = json_decode($item);

//input data
array_push($dbUser->items, $item);
$dbUser = json_encode($dbUser);

// simpan sebagai file baru
file_put_contents($dbFile, $dbUser);
