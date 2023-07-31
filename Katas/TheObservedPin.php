<?php

//Solution for: https://www.codewars.com/kata/5263c6999e0f40dee200059d/php
function getPINs($observed) {
  //map our keypad as a 2 dimensional array
  $mapKeypad[0][0] = 1;
  $mapKeypad[0][1] = 2;
  $mapKeypad[0][2] = 3;
  $mapKeypad[1][0] = 4;
  $mapKeypad[1][1] = 5;
  $mapKeypad[1][2] = 6;
  $mapKeypad[2][0] = 7;
  $mapKeypad[2][1] = 8;
  $mapKeypad[2][2] = 9;
  $mapKeypad[3][1] = 0;
  
  //split our string of numbers into an array so we can itrerate through it
  $numbers = str_split($observed);
  $possibleNumbersArray = [];
  $possibleCombinations;
  
  foreach($numbers as $number) {
    //explicitly cast number as int just to be safe
    $number = (int)$number;
    
    //returns an array containing the two coordinates
    $keypadCoords = array_recursive_search_key_map($number, $mapKeypad);
    
    //get all possible numbers for the observed number
    $possibleNumbersSubArray = getPossibleNumbers($keypadCoords, $mapKeypad);
  
    //add the sub array to the parent array
    $possibleNumbersArray[] = $possibleNumbersSubArray;
  }
  
  $possibleCombinations = getPossibleCombinations($possibleNumbersArray);
  
  //cast all array items as strings
  $possibleCombinations = array_map('strval', $possibleCombinations);
  return $possibleCombinations;
}

//get all possible combinations of the numbers provided in nested arrays
function getPossibleCombinations(array $possibleNumbersArray) {
  //initialize the combination array with the first set of numbers
  $combination = $possibleNumbersArray[0];

    //loop through each set of numbers except the first (as we assign it above)
    for ($i = 1; $i < count($possibleNumbersArray); $i++) {
      //initialize a variable to hold the current iterations combination
      $y = [];

        //loop through each number in the current iterations array
        foreach ($possibleNumbersArray[$i] as $number) {
          //loop through each number in the previous array
          foreach ($combination as $prevNumber) {
            //append the current number to the previous number
            $y[] = $prevNumber . $number;
          }
        }

        //update the combination array with the new result
        //the loop then runs again using this updated variable as the previous array referenced above
        $combination = $y;
    }

  return $combination;
}

function getPossibleNumbers(array $keypadCoords, array $mapKeypad) : array {
  $possibleNumbersArray = [];
  
  //original number
  $possibleNumbersArray[] = $mapKeypad[$keypadCoords[0]][$keypadCoords[1]] ?? false;
  //Above
  $possibleNumbersArray[] = $mapKeypad[(int)$keypadCoords[0] - 1][$keypadCoords[1]] ?? false;
  //Below
  $possibleNumbersArray[] = $mapKeypad[(int)$keypadCoords[0] + 1][$keypadCoords[1]] ?? false;
  //Left
  $possibleNumbersArray[] = $mapKeypad[$keypadCoords[0]][(int)$keypadCoords[1] - 1] ?? false;
  //Right
  $possibleNumbersArray[] = $mapKeypad[$keypadCoords[0]][(int)$keypadCoords[1] + 1] ?? false;
  
  //Remove false values from array
  return array_filter($possibleNumbersArray, function($x) {
    if($x === false) {
      return false;
    }
    return true;
  });
}

//Copied from PHP docs for searching multidimensional arrays
function array_recursive_search_key_map($needle, $haystack) {
    foreach($haystack as $first_level_key=>$value) {
        if ($needle === $value) {
            return array($first_level_key);
        } elseif (is_array($value)) {
            $callback = array_recursive_search_key_map($needle, $value);
            if ($callback) {
                return array_merge(array($first_level_key), $callback);
            }
        }
    }
    return false;
}

?>
