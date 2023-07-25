<?php
//Solution for https://www.codewars.com/kata/51e0007c1f9378fa810002a9/php
function parse($data) {
  
  $commands = str_split($data);
  $value = 0;
  $returnArray = [];
  
  foreach($commands as $command) {
    switch($command) {
        case 'i':
          $value++;
          break;
        case 'd':
          $value--;
          break;
        case 's':
          $value = $value ** 2;
          break;
        case 'o':
          $returnArray[] = $value;
          break;
    }
  }
  
  return $returnArray;
}
?>
