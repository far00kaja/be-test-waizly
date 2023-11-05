// s = '12:01:00PM' return 12:01:00
// s= '12:01:00AM' return 00:01:00

function timeConversion(value) {
  try {
    const getClockFormat = value.substring(value.length, 8);
    if (getClockFormat !== "AM" || getClockFormat !== "PM") {
      let arrTime = value.substring(0, value.length - 2).split(":");
      if (getClockFormat === "PM") {
        if (parseInt(arrTime[0]) >= 12) {
          console.log(arrTime.join(":"));
        } else {
          arrTime[0] = parseInt(arrTime[0]) + 12;
          console.log(arrTime.join(":"));
        }
      } else {
        if (parseInt(arrTime[0]) < 12) {
          console.log(arrTime.join(":"));
        } else if (parseInt(arrTime[0]) === 12) {
          arrTime[0] = "00";
          console.log(arrTime.join(":"));
        } else {
          arrTime[0] = parseInt(arrTime[0]) - 12;
          if (arrTime[0]<10){
            arrTime[0] = '0'+arrTime[0];
          }
          console.log(arrTime.join(":"));
        }
      }
    } else {
      throw new Error("Format must be AM/PM");
    }
  } catch (error) {
    console.log("error:", error.message);
  }
}

timeConversion("12:01:01PM");
timeConversion("15:01:01PM");
timeConversion("02:01:01PM");
timeConversion("00:01:01PM");
timeConversion("12:01:01AM");
timeConversion("07:01:01AM");
timeConversion("11:41:01AM");
timeConversion("21:41:01AM");
