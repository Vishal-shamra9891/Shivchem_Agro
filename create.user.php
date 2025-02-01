<?php
session_start();
include "connection.php";

// Check if the user is logged in and is an admin
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_POST['create_user'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']); // Assuming you want to set the role (admin/user)

    // Validate input
    if (empty($username) || empty($email) || empty($password) || empty($role)) {
        echo "<div class='message'><p>All fields are required!</p></div><br>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);

        if ($stmt->execute()) {
            echo "<div class='message'><p>User created successfully!</p></div><br>";
        } else {
            echo "<div class='message'><p>Error creating user: " . $stmt->error . "</p></div><br>";
        }

        // Close the statement
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div class="container">
        <div class="form-box box">
            <header>Create User</header>
            <hr>
            <form action="#" method="POST">
                <div class="form-box">
                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="Username" name="username" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="email" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="input-container">
                        <select name="role" required>
                            <option value="">Select Role</option>
                            <option value="user">User </option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <input type="submit" name="create_user" value="Create User" class="button">
            </form>
        </div>
    </div>
</body>
</html>