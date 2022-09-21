<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Log ind</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    
    <h1>Log ind</h1>
    
    <?php if ($is_invalid): ?>
        <em>Forkert login</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Kode</label>
        <input type="password" name="password" id="password">
        
        <button>Log ind</button>
    </form>
    
</body>
</html>








