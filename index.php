<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">
</head>
<body>
    
    <h1>Welcome to TFF for Children, Please Proceed to Log In or Sign Up</h1>
    
    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>


        <?php echo "<td><a href='delete.php?id=".$user['id']."'>Delete User</a></td>"; ?>
        <p></p>
        <?php echo "<td><a href='change_username.php?id=".$user['id']."'>Change Username</a></td>"; ?>
        <p></p>
        <?php echo "<td><a href='change_password.php?id=".$user['id']."'>Change Password</a></td>"; ?>
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    