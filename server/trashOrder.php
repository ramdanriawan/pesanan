<?php
//inisialisasi user
$user   = 'user001';

// dapatkan database
$dbFile = "../database/users/$user/trashOrder/db$user.json";
$dbUser = file_get_contents($dbFile);
$dbUser = json_decode($dbUser);

// dapatkan data sebagai json
$trashOrders   = file_get_contents('php://input');
$trashOrders   = json_decode($trashOrders);

//input data
array_push($dbUser->trashOrders, $trashOrders);
$dbUser = json_encode($dbUser);

// simpan sebagai file baru
file_put_contents($dbFile, $dbUser);
