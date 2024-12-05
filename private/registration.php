<?php
session_start();
require("conn.php");
if(isset($_GET['sent'])){
    // Sanitize user inputs
    $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $passwd = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // Validate user inputs
    if (empty($user) || empty($passwd) || empty($email)){
        echo $user . $passwd . $email; 
        die('Please fill out all fields');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      die('Invalid email format');
    }

    // Check if user already exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
      die('User already exists');
    }

    // Hash the password
    $hashed_password = password_hash($passwd, PASSWORD_DEFAULT);
    $confirmation_code = uniqid();

    // Insert the user into the database
    try {
      $stmt = $conn->prepare("INSERT INTO users (username, email, email_verified, password, date) VALUES (:user, :email, :verify, :password, CURRENT_DATE)");
      $stmt->bindParam(':user', $user);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':verify', $confirmation_code);
      $stmt->bindParam(':password', $hashed_password);
      $stmt->execute();
      header("Location: ../public/login.php");
      $to = $email;
      $subject = 'Conferma la registrazione';
      $message = "clicca sul link di seguito per confermare la tua registrazione: https://madeinrp.net/public/confirm.php?id=" . $confirmation_code;
      $headers = 'From: noreply@Madeinrp.net' . "\r\n" .
           'Reply-To: noreply@Madeinrp.net' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();
      mail($to, $subject, $message, $headers);
    } catch (PDOException $e) {
      die('Database error: ' . $e->getMessage());
    }
}
?>
