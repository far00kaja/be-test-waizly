function plusMinus(arrData) {
  let positive = arrData.filter((res) => res > 0).length / arrData.length;
  let negative = arrData.filter((res) => res < 0).length / arrData.length;
  let zero = arrData.filter((res) => res === 0).length / arrData.length;

  console.log(positive.toFixed(6));
  console.log(negative.toFixed(6));
  console.log(zero.toFixed(6));
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
      plusMinus(arrNumber);
    } catch (e) {
      console.log("error : ", e.message);
    } finally {
      readline.close();
    }
  }
);
