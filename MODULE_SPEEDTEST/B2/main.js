window.onload = function () {
  // Deklarasi variable yang digunakan
  var seconds = "000";
  var tens = "00";
  var appendTens = document.getElementById("tens")
  var appendSeconds = document.getElementById("seconds")
  var buttonStart = document.getElementById('button-start');
  var buttonStop = document.getElementById('button-stop');
  var buttonReset = document.getElementById('button-reset');
  var Interval;

  // Mulai timer saat tombol start diklik
  buttonStart.onclick = function () {
    clearInterval(Interval);
    Interval = setInterval(startTimer, 10);
  }

  // Hentikan timer saat tombol start diklik
  buttonStop.onclick = function () {
    clearInterval(Interval);
  }

  // Reset timer saat tombol start diklik
  buttonReset.onclick = function () {
    clearInterval(Interval);
    tens = "00";
    seconds = "000";
    appendTens.innerHTML = tens;
    appendSeconds.innerHTML = seconds;
  }

  // Fungsi yang dilaksakan untuk menghitung setiap 10ms
  function startTimer() {
    tens++;

    if (tens <= 9) {
      appendTens.innerHTML = "0" + tens;
    }

    if (tens > 9) {
      appendTens.innerHTML = tens;

    }

    if (tens > 59) {
      console.log("seconds");
      seconds++;
      appendSeconds.innerHTML = "0" + "0" + seconds;
      tens = 0;
      appendTens.innerHTML = "0" + 0;
    }

    if (seconds > 9) {
      appendSeconds.innerHTML = "0" + seconds;
    }


  }


}