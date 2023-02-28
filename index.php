<?php
// start session
// pass user id to the session
// go to home page
// HOME PAGE
// continue session
// if id is empty, suggest to log in or sign up
// if id is not empty, suggest to log out - session_destroy()
// login page - session_regenerate_id()
session_start();
if (isset($_SESSION["user_id"])) {
$mysqli = require __DIR__ . "/database.php";
$sql = sprintf("SELECT * FROM user 
                WHERE id = '%s'", 
                $_SESSION["user_id"]);
$result = $mysqli->query($sql);
$user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">-->
  <link rel="stylesheet" href="styles/water.css">
</head>
<body>
  <h1>Home</h1>

    <?php if (isset($user)): ?>

      <p>Hello, <?= htmlspecialchars($user["name"]) ?></p>
      <a href="logout.php">Log Out</a>

    <?php else: ?>

      <p>
        <a href="login.php">Log in</a> 
        or 
        <a href="signup.php">Sign Up</a>
      </p>
    
    <?php endif; ?>

</body>
</html>
