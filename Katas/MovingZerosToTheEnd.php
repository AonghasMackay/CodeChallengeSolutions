<?php
//https://www.codewars.com/kata/52597aa56021e91c93000cb0/php

function moveZeros(array $items): array
{
    //lets record the number of zeros in the $items array
    $numberOfZeros = 0;
  
    foreach($items as $key => $item) {
      
      //if no value is set that isn't zero
      if(!isset($item)) {
        continue;
      }
      
      //if its a double and equal to 0 then lets convert it into integer so we can check if its 0
      if(gettype($items[$key]) === 'double') {
        if($item == 0) {
          $item = intval($item);
        }
      }
      
      if(gettype($item) === 'integer') {
        
        //if the item is an integer and equivilent to 0 then
        //unset the item from the array and increment the numberOfZeros variable
        if($item == 0) {
          unset($items[$key]);
          ++$numberOfZeros;
        }
        
      }
    }
  
    //readd the missing zeros based on the record we kept in numberOfZeros
    $iteration = 0;
    while($iteration < $numberOfZeros) {
      $items[] = 0;
      $iteration++;
    }
  
    //remap the array keys so that they match with the test cases
    $items = array_values($items);
  
    return $items;
}

?>
