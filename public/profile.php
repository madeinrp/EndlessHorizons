<?php
    //require "../private/functions.php";
    //check_login();
    session_start();
    if(isset($_COOKIE['id'])){
    	
    }
    require("../private/conn.php");
    // Verify token in session matches token in database
    if (isset($_SESSION['token']) && isset($_SESSION['email'])) {
      $stmt = $conn->prepare("SELECT token FROM users WHERE email=:email");
      $stmt->bindParam(':email', $_SESSION['email']);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
      if ($_SESSION['token'] != $user['token']) {
        header("Location: ../public/login.php");
      }
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EndlessProfile</title>
</head>
<body>
    <h1>Profilo</h1>

    <?php include("header.php")?>
</body>
</html>
