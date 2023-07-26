//solution to https://www.codewars.com/kata/520b9d2ad5c005041100000f/javascript
function pigIt(str) {
  let splitString = str.split(' ')
  let sentence = '';
  let words = [];
  
  splitString.forEach(function(word) {
    let letters = word.split('');
    let firstLetter = letters[0];
    
    //remove first letter of word
    letters.shift();
    
    letters.push(firstLetter);
    
    let newWord = letters.join('');
    
    //if word is not punctuation
    if(!word.match(/^[.,:!?]/)) {
      newWord += 'ay';
    }
    
    words.push(newWord);
  });
  
  sentence = words.join(' ');
  
  return sentence;
}
