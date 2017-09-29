function findN(array) {
  return array.length;
}

function findSum(array) {
  var sum = 0;
  for (var i in array) {
    sum = sum + array[i];
  }
  return Math.round(sum * 100) / 100;
}

function findMean(array) {
  var mean = findSum(array) / array.length;
  return Math.round(mean * 100) / 100;
}

function findMedian(array) {
  var newArray = array.slice();
  var median = 0;
  newArray.sort(sortNumber);
  if(newArray.length % 2 == 0) {
    var midVal1 = newArray[newArray.length / 2];
    var midVal2 = newArray[(newArray.length / 2) + 1];
    median = (midVal1 + midVal2) / 2;
  } else {
    median = newArray[newArray.length / 2];
  }

  return Math.round(median * 100) / 100;;
}

function findMode(array) {
  var numberMap = {}; //Formatted as numberMap[number] = number of occurances
  var modes = {}; //A list of the mods (for multimode condition)
  var currentModeNum = 0; //Currently the number of occurances of a number is 0

  for(var number in array) {
    //Check if the number has occured before
    if (number in numberMap) {
      //If the number has occured before increment its count
      numberMap[number] = numberMap[number] + 1;
    } else {
      //If the number has NOT occured before set its count to 1
      numberMap[number] = 1;
    }//end if/else

    //Check if we have a new or same mode
    if(numberMap[number] > currentModeNum) {
      //Reset modes and set currentModeNum
      modes = [number];
      currentModeNum = numberMap[number];
    } else if (numberMap[number] == currentModeNum) {
      modes.push(number);
    }//end if/else
  }//end for

  return modes;
}//end findMode()

function findVariance(array) {
  var newArray = array.slice();
  //First find the mean
  var mean = findMean(newArray);

  //Now subtract each number from the mean and square it
  for (var i in newArray) {
    console.log(newArray[i]);
    newArray[i] = Math.pow((newArray[i] - mean), 2);
    console.log(newArray[i]);
  }
  console.log(newArray);

  //Find the sum of these numbers
  var sum = findSum(newArray);

  //Get variance by dividing by array length minus one
  var variance = sum / (newArray.length - 1);

  return Math.round(variance * 100) / 100;;
}

function findStandardDeviation(array) {
  var stdDev = Math.sqrt(findVariance(array));
  return Math.round(stdDev * 100) / 100;
}

function sortNumber(a,b) {
  return a - b;
}
