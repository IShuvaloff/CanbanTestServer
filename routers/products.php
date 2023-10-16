<?php
require_once('config/connect.php');
require_once('data/dbProducts.php');
include_once('utils/utils.php');

function route($method, $urlData, $formData)
{
  // GET /products
  if ($method === 'GET' && count($urlData) === 0) {
    $data = getProducts();
    if (!$data || !count($data)) return;

    echo json_encode($data); // возврат результата

    return;
  }

  // GET /products/:id
  if ($method === 'GET' && count($urlData) === 1) {
    $data = getProduct($urlData[0]);

    if (!isset($data) || !count($data)) return;

    echo json_encode($data);

    return;
  }

  // POST /products
  if ($method === 'POST' && count($formData) >= 1) {
    $result = addProduct($formData);

    echo json_encode($result); // возврат результата

    return;
  }

  // PUT /products
  if ($method === 'PUT' && count($formData) >= 1) {
    $result = updateProduct($formData);

    echo json_encode($formData);

    return;
  }
}
