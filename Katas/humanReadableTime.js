//solution for: https://www.codewars.com/kata/525f3eda17c7cd9f9e000b39
function humanReadable (seconds) {
  let hours    = seconds / 3600;    //3600 seconds in an hour. Divide seconds by an hour worth of seconds to get number of hours
  let minutes  = seconds / 60 % 60; //get modulo of 60 to get number of minutes left over once seconds has been divided by hours
  seconds  = seconds % 60;      //use modulo of 60 to get number of seconds left over once seconds has been divided by minutes
  
  //make our numbers into strings for formatting
  let hoursString = String(Math.floor(hours));
  let minutesString = String(Math.floor(minutes));
  let secondsString = String(Math.floor(seconds));
  
  //if the strings are less than 2 characters long then add a 0 at the start
  let hoursFormatted = hoursString.padStart(2, '0');
  let minutesFormatted = minutesString.padStart(2, '0');
  let secondsFormatted = secondsString.padStart(2, '0');
  
  //build our string
  return `${hoursFormatted}:${minutesFormatted}:${secondsFormatted}`;
}
