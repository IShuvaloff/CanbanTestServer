<?php

function resultMessage($errorMessage = null)
{
  return array(
    array('result' => $errorMessage ?? 'ГОТОВО'),
    array('error' => !!$errorMessage),
  );
}

function getProducts()
{
  global $connect;
  if (!$connect) die('Подключение к базе не установлено!');

  $result = mysqli_query($connect, 'select * from products');
  $products = mysqli_fetch_all($result);

  $resultProducts = [];
  foreach ($products as $item) {
    $resultProducts[] = array(
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

  return $resultProducts;
}

function getProduct($id)
{
  global $connect;
  if (!$connect) die('Подключение к базе не установлено!');

  try {
    $stmt = mysqli_prepare($connect, 'select * from products where id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $product = mysqli_fetch_assoc($result);

    if (!$product) throw new Exception('Сотрудник не найден', 1);


    $resultProduct = array(
      'method' => 'GET',
      'id' => $product['id'],
      'title' => $product['title'],
      'price' => $product['price'],
      'description' => $product['description'],
      'category' => $product['category'],
      'image' => is_null($product['image']) ? '' : $product['image'],
      'rating' => array(
        'rate' => $product['rating'],
        'count' => $product['voices']
      ),
      'group' => $product['group'],
    );

    return $resultProduct;
  } catch (\Throwable $th) {
    return resultMessage('ОШИБКА получения сотрудника: ' . $th->getMessage());
  }
}

function addProduct($formData)
{
  global $connect;
  if (!$connect) die('Подключение к базе не установлено!');

  if (!isset($formData) || !count($formData)) return resultMessage('ОШИБКА: не переданы данные для добавления продукта');

  $title = $formData['title'];
  $description = $formData['description'] ?? '';
  $price = $formData['price'] ?? '';
  $category = $formData['category'] ?? '';
  $image = $formData['image'] ?? '';

  try {
    $stmt = mysqli_prepare($connect, 'insert into products(title, description, category, price, image) values(?, ?, ?, ?, ?)');
    mysqli_stmt_bind_param($stmt, 'sssds', $title, $description, $category, $price, $image);
    mysqli_stmt_execute($stmt);

    return resultMessage();
  } catch (\Throwable $th) {
    return resultMessage('ОШИБКА добавления сотрудника: ' . $th->getMessage());
  }
}

function updateProduct($formData)
{
  global $connect;
  if (!$connect) die('Подключение к базе не установлено!');

  if (!isset($formData) || !count($formData)) return array('result' => 'ОШИБКА: не переданы данные для обновления продукта');

  try {
    $stmt = mysqli_prepare($connect, 'insert into products(title, description, category, price, image) values(?, ?, ?, ?, ?)');
    mysqli_stmt_bind_param($stmt, 'sssds', $title, $description, $category, $price, $image);
    mysqli_stmt_execute($stmt);

    return resultMessage();
  } catch (\Throwable $th) {
    return resultMessage('ОШИБКА обновления сотрудника: ' . $th->getMessage());
  }
}
