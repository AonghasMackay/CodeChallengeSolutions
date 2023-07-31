//solution for https://www.codewars.com/kata/525f3eda17c7cd9f9e000b39

//if number function contains the operation argument then return the operation with the number as an argument
//else just return the number.
function zero(operation) {
  if (operation) {
    return operation(0);
  } else {
    return 0;
  }
}

function one(operation) {
  if (operation) {
    return operation(1);
  } else {
    return 1;
  }
}

function two(operation) {
  if (operation) {
    return operation(2);
  } else {
    return 2;
  }
}

function three(operation) {
  if (operation) {
    return operation(3);
  } else {
    return 3;
  }
}

function four(operation) {
  if (operation) {
    return operation(4);
  } else {
    return 4;
  }
}

function five(operation) {
  if (operation) {
    return operation(5);
  } else {
    return 5;
  }
}

function six(operation) {
  if (operation) {
    return operation(6);
  } else {
    return 6;
  }
}

function seven(operation) {
  if (operation) {
    return operation(7);
  } else {
    return 7;
  }
}

function eight(operation) {
  if (operation) {
    return operation(8);
  } else {
    return 8;
  }
}

function nine(operation) {
  if (operation) {
    return operation(9);
  } else {
    return 9;
  }
}

//Operation callbacks
function plus(b) {
  return function(a) { 
    return a + b 
  };
}
function minus(b) {
    return function(a) { 
      return a - b 
    };
}
function times(b) {
    return function(a) { 
      return a * b 
    };
}
function dividedBy(b) {
    return function(a) { 
      //Make sure its an integer and not a float
      return Math.floor(a / b) 
    };
}
