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
    <title>Hjem</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    
    <h1>Hjem</h1>
    
    <?php if (isset($user)): ?>
        
        <p>Hej Rotte <?= htmlspecialchars($user["name"]) ?></p>

        
        <p><a href="logout.php">Log ud</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">Log ind</a> or <a href="signup.html">Opret bruger</a></p>
        
    <?php endif; ?>

    <div class="navbar">
    <a href="index.html">Hjem</a>
    <div class="dropdown">
      <button class="dropbtn">Projekter 
      </button>
      <div class="dropdown-content">
        <a href="CV.html">Web CV</a>
        <a href="./Billeder/bAlpha.jpg" target="_blank">Alpha V.1</a>
        <a href="./Billeder/Beta2.jpg" target="_blank">Beta V.2</a>
        <a href="./Billeder/Beta.jpg" target="_blank">Beta</a>
        <a href="./Billeder/Delta V3.jpg" target="_blank">Delta V.3</a>
        <a href="./Billeder/Delta V1.jpg" target="_blank">Delta v.2</a>
        <a href="./Billeder/Delta.jpg" target="_blank">Delta</a>
      </div>
    </div> 
    <a href="CV.html">CV</a>
    <a href="mailto: Lucasdevinechr@gmail.com">Kontakt</a>
    <a href="signup.html">Log ind</a>
  </div>
    
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    