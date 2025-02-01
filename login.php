<?php
session_start();
include "connection.php"; // Ensure this file connects to your database

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    // Prevent empty input
    if (empty($email) || empty($pass)) {
        echo "<div class='message'><p>Email and Password are required!</p></div><br>";
        echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $password = $row['password'];

        // Debugging output
        echo "<pre>";
        echo "Stored Password Hash: " . $password . "<br>";
        echo "Input Password: " . $pass . "<br>";
        echo "</pre>";

        // Verify password
        if (password_verify($pass, $password)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role']; // Store the role in session
            header("Location: home.php");
            exit();
        } else {
            echo "<div class='message'><p>Wrong Password</p></div><br>";
            echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
        }
    } else {
        echo "<div class='message'><p>Wrong Email or Password</p></div><br>";
        echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
    }
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container">
    <div class="form-box box">
      <header>Login</header>
      <hr>
      <form action="#" method="POST">
        <div class="form-box">
          <div class="input-container">
            <i class="fa fa-envelope icon"></i>
            <input class="input-field" type="email" placeholder="Email Address" name="email" required>
          </div>
          <div class="input-container">
            <i class="fa fa-lock icon"></i>
            <input class="input-field password" type="password" placeholder="Password" name="password" required>
            <i class="fa fa-eye toggle icon"></i>
          </div>
          <div class="remember">
            <input type="checkbox" class="check" name="remember_me">
            <label for="remember">Remember me</label>
            <span><a href="forgot.php">Forgot password</a></span>
          </div>
        </div>
        <input type="submit" name="login" id="submit" value="Login" class="button">
        <div class="links">
          Don't have an account? contect Your admin.
        </div>
      </form>
    </div>
  </div>
  <script>
    const toggle = document.querySelector(".toggle"),
          input = document.querySelector(".password");
    toggle.addEventListener("click", () => {
      if (input.type === "password") {
        input.type = "text";
        toggle.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        input.type = "password";
      }
    });
  </script>
</body>
</html>

<?php } ?>