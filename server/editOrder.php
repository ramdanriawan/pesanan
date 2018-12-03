<?php
$user = 'user001';
$url = "php://input";

$editOrder       = file_get_contents($url);
$editOrderDecode = json_decode($editOrder, true);
$editOrderDecode = json_encode($editOrder);
$editOrderDecode = json_decode($editOrder);

// dapatkan database
$dbFile = "../database/users/$user/order/db$user.json";
$dbUser = file_get_contents($dbFile);
$dbUser = json_decode($dbUser);
// cari dan ganti yang idnya sama
foreach($dbUser->orders as $key => $value)
{
	if($value->id == $editOrderDecode->id)
	{
		$dbUser->orders[$key] = $editOrderDecode;
	}
}

// simpan ke database
$dbUser = json_encode($dbUser);

file_put_contents($dbFile, $dbUser);
