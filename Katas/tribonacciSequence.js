//Solution to https://www.codewars.com/kata/556deca17c58da83c00002db/javascript
function tribonacci(signature, n) {
    let sequenceLength = n;
    
    for(let i = 3; i < sequenceLength; i++) {
      let nextNumber = signature[i - 1] + signature[i - 2] + signature [i - 3];
      signature.push(nextNumber);
    }
    
    signature.length = sequenceLength;
    
    return signature;
}