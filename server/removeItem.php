<?php 
//inisialisasi user
$user   = 'user001';

// dapatkan database
$dbFile = "../database/users/$user/item/db$user.json";

//dapatkan data
$input = 'php://input';
$items = file_get_contents($input);
$items = json_decode($items, true);
$items = json_encode($items);
file_put_contents($dbFile, $items);