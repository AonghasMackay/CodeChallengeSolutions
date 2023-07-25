<?php
//solution to https://www.codewars.com/kata/52685f7382004e774f0001f7/php
function human_readable($seconds) {
  $hours    = $seconds / 3600;    //3600 seconds in an hour. Divide seconds by an hour worth of seconds to get number of hours
  $minutes  = $seconds / 60 % 60; //get modulo of 60 to get number of minutes left over once seconds has been divided by hours
  $seconds  = $seconds % 60;      //use modulo of 60 to get number of seconds left over once seconds has been divided by minutes
  
  //build our string
  return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
}

?>
