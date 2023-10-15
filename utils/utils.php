<?php

function print_arr($arr, $extended = false)
{
  echo '<pre>';
  if ($extended) {
    var_dump($arr);
  } else {
    print_r($arr);
  }
  echo '</pre>';
}
