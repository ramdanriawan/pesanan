<?php
$user = 'user001';

$url = 'php://input';

// dapatkan database
$dbFile = "../database/users/$user/item/db$user.json";
$dbUser = file_get_contents($dbFile);
$dbUser = json_decode($dbUser);

// dapatkan data restore items
$restoreOrder = file_get_contents($url);
$restoreOrder = json_decode($restoreOrder, true);
$restoreOrder = json_encode($restoreOrder);
$restoreOrder = json_decode($restoreOrder);

// tambahkan restore order ke orders
array_push($dbUser->orders, $restoreOrder);

// encode jadi json
$dbUser = json_encode($dbUser);

// simpan ke database
file_put_contents($dbFile, $dbUser);

// buang item yang telah direstore dari list trash orders
$dbFile = "../database/users/$user/trashOrder/db$user.json";
$dbUser = file_get_contents($dbFile);
$dbUser = json_decode($dbUser);

foreach($dbUser->trashOrders as $key => $value)
{
	if($value->id == $restoreOrder->id)
	{
		unset($dbUser->trashOrders[$key]);
	}
}

//masukkan lagi ke database trashItem
$dbUser->trashOrders = array_values($dbUser->trashOrders);
$dbUser = json_encode($dbUser);
file_put_contents($dbFile, $dbUser);
