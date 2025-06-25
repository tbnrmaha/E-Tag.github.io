<!DOCTYPE html>
<html>
<head>
<title>Student Timer</title>
<script>
let remaining = <?php echo intval($_GET['limit']) * 60; ?>;
let timer = setInterval(() => {
  if (--remaining < 0) {
    clearInterval(timer);
    document.getElementById("alert").innerHTML = "⛔ TIME EXCEEDED!";
    document.getElementById("alert").style.color = "red";
    let audio = new Audio('alarm.mp3'); audio.play();
  } else {
    let mins = Math.floor(remaining / 60);
    let secs = remaining % 60;
    document.getElementById("timer").innerHTML = mins + ":" + (secs < 10 ? "0" + secs : secs);
  }
}, 1000);
</script>
</head>
<body>
<h2>⏱️ Countdown Timer</h2>
<div id="timer" style="font-size: 48px; color: green;"></div>
<h3 id="alert"></h3>
</body>
</html>