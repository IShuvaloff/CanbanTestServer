<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: POST,GET');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
// header('Content-Type: application/json; charset=utf-8');

// Получение данных из тела запроса
function getFormData($method)
{

    // GET или POST: данные возвращаем как есть
    if ($method === 'GET') return $_GET;
    // if ($method === 'POST') return $_POST;

    return json_decode(file_get_contents("php://input"), TRUE);
    // $title = $data['title'];
    // $description = $data['description'] ?? '';
    // $price = $data['price'] ?? '';
    // $category = $data['category'] ?? '';
    // $image = $data['image'] ?? '';
    // throw new Exception('ДАННЫЕ: ' . implode($formData), 1);


    // PUT, PATCH или DELETE
    // $data = array();
    // $exploded = explode('&', file_get_contents('php://input'));

    // foreach ($exploded as $pair) {
    //     $item = explode('=', $pair);
    //     if (count($item) == 2) {
    //         $data[urldecode($item[0])] = urldecode($item[1]);
    //     }
    // }

    // return $data;
}

// Определяем метод запроса
$method = $_SERVER['REQUEST_METHOD'];

// Получаем данные из тела запроса
$formData = getFormData($method);


// Разбираем url
$url = (isset($_GET['q'])) ? $_GET['q'] : '';
$url = rtrim($url, '/');
$urls = explode('/', $url);

// Определяем роутер и url data
$router = $urls[0];
$urlData = array_slice($urls, 1);

// throw new Exception('URL_DATA = ' . implode($urlData), 1);

// Подключаем файл-роутер и запускаем главную функцию
include_once 'routers/' . $router . '.php';
route($method, $urlData, $formData);
