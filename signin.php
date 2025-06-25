<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if ($password === $user['password']) {
      $_SESSION['user'] = $username;
      header("Location: dashboard.php");
      exit;
    } else {
      $error = "Incorrect password.";
    }
  } else {
    $error = "User not found.";
  }
}
?>
<form method="POST">
  <h2>Sign In</h2>
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Sign In</button>
</form>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>