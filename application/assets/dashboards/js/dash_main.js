function startTime() {
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const today = new Date();
    let day = today.getDate();
    let month = months[today.getMonth()];
    let year = today.getFullYear();
    let now = today.toDateString()
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =  day+" "+month+" "+year + "<br>"+ h + ":" + m + ":" + s;
    setTimeout(startTime, 1000);
  }
  
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

startTime();

setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);

