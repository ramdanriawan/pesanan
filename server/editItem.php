<?php 
$user = 'user001';
$url = "php://input";

$editItem       = file_get_contents($url);
$editItemDecode = json_decode($editItem, true);
$editItemDecode = json_encode($editItem);
$editItemDecode = json_decode($editItem);

// dapatkan database
$dbFile = "../database/users/$user/item/db$user.json";
$dbUser = file_get_contents($dbFile);
$dbUser = json_decode($dbUser);

// cari dan ganti yang idnya sama
foreach($dbUser->items as $key => $value)
{
	if($value->id == $editItemDecode->id)
	{
		$dbUser->items[$key] = $editItemDecode;
	}

}

// simpan ke database
$dbUser = json_encode($dbUser);

file_put_contents($dbFile, $dbUser);