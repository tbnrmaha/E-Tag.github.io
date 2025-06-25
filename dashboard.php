<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: signin.php");
  exit;
}
?>
<h2>Welcome, <?= htmlspecialchars($_SESSION['user']) ?></h2>
<form method="POST" action="record.php">
  <input type="text" name="student_name" placeholder="Student Name" required>
  <input type="text" name="tracker_id" placeholder="Tracker ID or NFC" required>
  <input type="text" name="gps_link" placeholder="Paste GPS Link" required>
  <input type="number" name="time_limit" placeholder="Allowed Time (mins)" required>
  <button name="action" value="out">Mark Time Out</button>
  <button name="action" value="in">Mark Time In</button>
</form>
<a href="logout.php">Log Out</a>