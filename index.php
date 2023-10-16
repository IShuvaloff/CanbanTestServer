<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: POST, GET, PUT');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
// header('Content-Type: application/json; charset=utf-8');

// Получение данных из тела запроса
function getFormData($method)
{
    if ($method === 'GET') return $_GET;

    return json_decode(file_get_contents("php://input"), true);
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
