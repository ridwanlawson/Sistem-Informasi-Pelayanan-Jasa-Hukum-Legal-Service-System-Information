<?php 
function randString($length) {
  $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $char = str_shuffle($char);
  for($i = 0, $rand = '', $l = strlen($char) - 1; $i < $length; $i ++) {
      $rand .= $char{mt_rand(0, $l)};
  }
  return $rand;
}
// echo randString(6); 
?>