<?php
//inisialisasi user
$user   = 'user001';

// dapatkan database
$dbFile = "../database/users/$user/order/db$user.json";

//dapatkan data
$input  = 'php://input';
$orders = file_get_contents($input);
$orders = json_decode($orders, true);
$orders = json_encode($orders);
file_put_contents($dbFile, $orders);
