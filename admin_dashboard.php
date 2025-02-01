<?php
session_start();
include "connection.php"; // Ensure this file connects to your database

// Check if the user is logged in and is an admin
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style1.css"> <!-- Link to your CSS file -->
    
</head>
<body>
    <div class="container">
        
        <main>
            <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
            <p>This is your admin dashboard. From here, you can manage users and perform administrative tasks.</p>
            <h3>Quick Links</h3>
            <ul>
                <li><a href="/create.user.php">Create a New User</a></li>
                <li><a href="view_users.php">View All Users</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </main>
                
    </div>
</body>
</html>