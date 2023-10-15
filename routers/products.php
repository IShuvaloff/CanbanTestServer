<?php
require_once('config/connect.php');
require_once('data/dbProducts.php');
include_once('utils/utils.php');

function route($method, $urlData, $formData)
{
  // GET /products
  if ($method === 'GET' && count($urlData) === 0) {
    $data = getProducts();
    if (!$data || !$data) return;

    echo json_encode($data);

    return;
  }
}
