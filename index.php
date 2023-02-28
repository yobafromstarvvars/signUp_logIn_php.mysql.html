<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">-->
  <link rel="stylesheet" href="styles/water.css">
</head>
<body>
  <h1>Sign Up</h1>
  <form action="process-signup.php" method="POST">
      <div>
          <label for="name">Name</label>
          <input id="name" name="name" type="text" required>
      </div>
      <div>
          <label for="email">Email</label>
          <input id="email" type="email" name="email" required>
      </div>
      <div>
          <label for="password">Password</label>
          <input id="password" type="password" name="password" required>
      </div>
      <div>
          <label for="password_repeat">Repeat password</label>
          <input id="password_repeat" type="password" name="password_repeat" required>
      </div>
     
      <button type="submit">Sign Up</button>
  </form>
</body>
</html>
