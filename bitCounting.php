<?php
//solution to https://www.codewars.com/kata/526571aae218b8ee490006f4/php
function countBits($n) 
{
  $binary = decbin($n);
  $bitCount = substr_count($binary, 1);
  
  return $bitCount;
}

?>
