<?php

try {
  $connect = mysqli_connect('127.0.0.1', 'root', '', 'canban-test');
  if (!$connect) {
    die('Ошибка подключения к базе данных');
  }
} catch (\Throwable $th) {
  die('<html>Ошибка подключения к базе данных: <br></html>' . $th);
}
