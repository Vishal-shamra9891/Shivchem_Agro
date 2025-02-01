<?php
session_start();
include "connection.php";

// Check if the user is logged in and is an admin
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    // Redirect to login page or show an error message
    header("Location: login.php");
    exit();
}

if (isset($_POST['signup'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validation: Check if fields are empty
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<div class='message'><p>All fields are required!</p></div><br>";
        echo "<a href='signup.php'><button class='btn'>Go Back</button></a>";
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<div class='message'><p>Passwords do not match!</p></div><br>";
        echo "<a href='signup.php'><button class='btn'>Go Back</button></a>";
        exit();
    }

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $sql_check = "SELECT * FROM users WHERE email='$email'";
    $result_check = mysqli_query($conn, $sql_check);
    
    if (mysqli_num_rows($result_check) > 0) {
        echo "<div class='message'><p>Email already exists! Try another.</p></div><br>";
        echo "<a href='signup.php'><button class='btn'>Go Back</button></a>";
        exit();
    }

    // Insert new user
    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', 'user')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<div class='message'><p>You are registered successfully!</p></div><br>";
        echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
        exit();
    } else {
        echo "<div class='message'><p>Signup Failed! Try again.</p></div><br>";
        echo "<a href='signup.php'><button class='btn'>Go Back</button></a>";
    }
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="css/style1.css">
</head>
<body>
  <div class="container">
    <div class="form-box box">
      <header>Signup</header>
      <hr>
      <form action="#" method="POST">
        <div class="form-box">
          <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input class="input-field" type="text" placeholder="Username" name="username" required>
          </div>
          <div class="input-container">
            <i class="fa fa-envelope icon"></i>
            <input class="input-field" type="email" placeholder="Email Address" name="email" required>
          </div>
          <div class="input-container">
            <i class="fa fa-lock icon"></i>
            <input class="input-field password" type="password" placeholder="Password" name="password" required>
          </div>
          <div class="input-container">
            <i class="fa fa-lock icon"></i>
            <input class="input-field" type="password" placeholder="Confirm Password" name="confirm_password" required>
          </div>
        </div>
        <input type="submit" name="signup" id="submit" value="Signup" class=" btn">
      </form>
    </div>
  </div>
</body>
</html>
<?php
}
?> It looks like you've implemented the signup logic with the role check effectively. Now, to further enhance your application, consider the following suggestions:

### Step 1: Improve Security Measures

1. **Prepared Statements**: To prevent SQL injection, use prepared statements instead of directly embedding user input in SQL queries. Here’s how you can modify the email check and user insertion:

```php
// Check if email already exists using prepared statement
$stmt_check = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    echo "<div class='message'><p>Email already exists! Try another.</p></div><br>";
    echo "<a href='signup.php'><button class='btn'>Go Back</button></a>";
    exit();
}

// Insert new user using prepared statement
$stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')");
$stmt->bind_param("sss", $username, $email, $hashed_password);
$result = $stmt->execute();