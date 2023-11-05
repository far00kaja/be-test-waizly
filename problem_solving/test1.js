// find minimum and maximum Sum
// let arr = [1, 3, 5, 7, 9];
let arr = [1, 2, 3, 4, 5];

function minMaxSum(arr) {
  try {
    let min = Number.MAX_SAFE_INTEGER;
    let max = Number.MIN_SAFE_INTEGER;
    for (let index = 0; index < arr.length; index++) {
      let flag = arr[index];
      let sumValue = 0;
      for (let j = 0; j < arr.length; j++) {
        if (flag !== arr[j]) {
          sumValue += arr[j];
        }
      }
      if (sumValue < min) {
        min = sumValue;
      }

      if (sumValue > max) {
        max = sumValue;
      }
    }
    console.log(min, max);
  } catch (error) {
    console.log("ERROR : ", error);
    throw new Error(error);
  }
}

const readline = require("readline").createInterface({
  input: process.stdin,
  output: process.stdout,
});

readline.question(
  "input 5 number, separate using space (ex: 1 2 3 4 5)!\n",
  (name) => {
    try {
      const arrNumber = name.split(" ").map((res) => {
        if (isNaN(res)) {
          throw new Error("input must number");
        } else {
          return parseInt(res);
        }
      });
      if (arrNumber.length !== 5) {
        console.log("number input must 5 number");
      } else {
        minMaxSum(arrNumber);
      }
    } catch (e) {
      console.log("error : ", e.message);
    } finally {
      readline.close();
    }
  }
);
