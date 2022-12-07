//Solution to https://www.codewars.com/kata/54e6533c92449cc251001667
var uniqueInOrder=function(iterable) {
    let inputAsArray = Array.from(iterable);
    
    inputAsArray.forEach(function(item, index) {
      if(item == inputAsArray[index + 1]) {
        while(item == inputAsArray[index + 1]) {
          inputAsArray.splice(index, 1);
        }
      }
    });
    
    return inputAsArray;
}