<?php 
//inisialisasi user
$user   = 'user001';

// dapatkan database
$dbFile = "../database/users/$user/trashItem/db$user.json";
$dbUser = file_get_contents($dbFile);
$dbUser = json_decode($dbUser);

// dapatkan data sebagai json
$trashItems   = file_get_contents('php://input');
$trashItems   = json_decode($trashItems);

//input data

array_push($dbUser->trashItems, $trashItems);
$dbUser = json_encode($dbUser);

// simpan sebagai file baru
file_put_contents($dbFile, $dbUser);
