<?php
include 'config.php';
$name = $_POST['student_name'];
$tracker_id = $_POST['tracker_id'];
$gps_link = $_POST['gps_link'];
$time_limit = $_POST['time_limit'];
$action = $_POST['action'];
$now = date("Y-m-d H:i:s");

if ($action == "out") {
  $conn->query("INSERT INTO students (name, tracker_id, time_out, gps_link, time_limit)
                VALUES ('$name', '$tracker_id', '$now', '$gps_link', '$time_limit')");
  header("Location: timer.php?limit=$time_limit");
} elseif ($action == "in") {
  $conn->query("UPDATE students SET time_in = '$now'
                WHERE tracker_id = '$tracker_id' ORDER BY id DESC LIMIT 1");
  header("Location: dashboard.php");
}
?>