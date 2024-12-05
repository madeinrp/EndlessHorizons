<?php
session_start();
require("conn.php");
if(isset($_GET['sent'])){
    // Sanitize user inputs
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
    
    // Validate user inputs
    if (empty($email) || empty($password)) {
            die('Please fill out all fields');
        } else {
        // Verify email and password in database
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            // Email and password are correct, create token and store in session
            $token = bin2hex(random_bytes(32)); // Generate random token
            $stmt = $conn->prepare("UPDATE users SET token=:token WHERE id=:id");
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':id', $user['id']);
            $stmt->execute();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;
	    $_SESSION['id'] = $user['id'];
	    setcookie("id", $user['id'], time() + (86400 * 30));
	    setcookie("token", $token, time() + (86400 * 30));
	    setcookie("email", $email, time() + (86400 * 30));
	    header("Location: ../public/profile.php");
            exit();
        } else {
            // Email or password is incorrect
            echo "credenziali errate <a href=" . "./login.php" . ">torna indietro</a>";
            exit();
        }
    }
}
?>
