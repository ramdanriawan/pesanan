<?php
//inisialisasi user
$user   = 'user001';

// dapatkan database
$dbFile = "../database/users/$user/order/db$user.json";
$dbUser = file_get_contents($dbFile);
$dbUser = json_decode($dbUser);

// dapatkan data sebagai json
$order   = file_get_contents('php://input');
$order   = json_decode($order);

//input data
array_push($dbUser->orders, $order);
$dbUser = json_encode($dbUser);

// simpan sebagai file baru
file_put_contents($dbFile, $dbUser);

// kurangkan dari stok item
    // dapatkan database
    $dbFile = "../database/users/$user/item/db$user.json";
    $dbUser = file_get_contents($dbFile);
    $dbUser = json_decode($dbUser);

    foreach($dbUser->items as $key => $item)
    {
        if($item->id == $order->item_id)
        {
            $dbUser->items[$key]->stok -= $order->jumlah;
        }
    }

    $dbUser = json_encode($dbUser);
    file_put_contents($dbFile, $dbUser);
