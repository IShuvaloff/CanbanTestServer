<?php

function getProducts()
{
  global $connect;
  if (!$connect) die('Подключение к базе не установлено!');

  $result = mysqli_query($connect, 'select * from products');
  $products = mysqli_fetch_all($result);
  // print_arr($products);

  $result = [];
  foreach ($products as $item) {
    $result[] = array(
      'method' => 'GET',
      'id' => $item[0],
      'title' => $item[1],
      'price' => $item[2],
      'description' => $item[3],
      'category' => $item[4],
      'image' => is_null($item[5]) ? '' : $item[5],
      'rating' => array(
        'rate' => $item[6],
        'count' => $item[7]
      ),
      'group' => $item[8],
    );
  }

  return $result;
}
