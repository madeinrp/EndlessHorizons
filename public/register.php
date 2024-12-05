<?php
session_start();
require "../private/registration.php";

if(isset($_POST["submit"])){
    $errors = signup($_POST);
    if(count($errors) == 0){
        header("Location: verify.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta   http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EndlessHorizons | Registrazione</title>
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== FontAwesome CSS =====-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../private/css/register.css">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/jpg" href="../private/images/NovaLogo.jpg">
    
    <!-- === Background for JS === -->
    <style>
        body{
            background: url("../private/images/log-reg/sfondo1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            transition: 1s ease-in-out;
        }
    </style>

    <!--<title>Form Login & Registrazione</title>-->
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Registrati</span>
                
                <!-- Eventuali errori di registrazione -->
                <?php if(isset($errors) && count($errors) > 0): ?>
                    <div class="errors">
                        <ul>
                        <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Form di registrazione -->
                <form method="post" action="?sent=true" id="form">
                    <div class="input-field">
                        <input name="username" type="text" placeholder="Username" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                    <input name="email" class="email" type="text" id="email" placeholder="Email" onkeydown="validation()" required>
                        <i class="uil uil-envelope icon"></i>
                        <span id="text"></span>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field">
                        <input name="password" type="password" class="password" placeholder="Conferma password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="sigCheck">
                            <label for="sigCheck" class="text">Ricordami</label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Registrati">
                    </div>
                </form>

                <div class="login-signup">
                        <span class="text">
                        Sei già un membro?
                        <a href="login.php" class="text login-link">Accedi</a>
                        <br>
                        Vuoi tornare alla home?
                        <a href="../index.html" class="text">clicca qui</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!--<script src="script.js"></script>-->
    <script src="../private/js/log-reg.js"></script>
    <script src="../private/js/changebk.js"></script>
</body>
</html>