<?php 
$user = 'user001';

$url = 'php://input';

// dapatkan database
$dbFile = "../database/users/$user/item/db$user.json";
$dbUser = file_get_contents($dbFile);
$dbUser = json_decode($dbUser);

// dapatkan data restore items
$restoreItem = file_get_contents($url);
$restoreItem = json_decode($restoreItem, true);
$restoreItem = json_encode($restoreItem);
$restoreItem = json_decode($restoreItem);

// tambahkan restore items ke items
array_push($dbUser->items, $restoreItem);

// encode jadi json
$dbUser = json_encode($dbUser);

// simpan ke database
file_put_contents($dbFile, $dbUser);

// buang item yang telah direstore dari list trash items
$dbFile = "../database/users/$user/trashItem/db$user.json";
$dbUser = file_get_contents($dbFile);
$dbUser = json_decode($dbUser);

foreach($dbUser->trashItems as $key => $value)
{
	if($value->id == $restoreItem->id)
	{
		unset($dbUser->trashItems[$key]);
	}
}

//masukkan lagi ke database trashItem
$dbUser->trashItems = array_values($dbUser->trashItems);
$dbUser = json_encode($dbUser);
file_put_contents($dbFile, $dbUser);