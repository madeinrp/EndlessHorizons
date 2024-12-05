<?php
    require("../private/access.php");

    $errors = array();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $errors = signup($_POST);
    
        if(count($errors) == 0){
            header("Location: profile.php");
            die;
        }
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta   http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EndlessHorizons | Accesso</title>
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== FontAwesome CSS =====-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../private/css/login.css">

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
</head>
<body>
    <!--<title>Form Login & Registrazione</title>-->
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>
                <!-- Form di login -->
                <form action="?sent=true" method="post">
                    <div class="input-field">
                        <input name="email" type="text" placeholder="Email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input name="password" type="password" class="password" placeholder="Password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Ricordami</label>
                        </div>
                            
                        <a href="#" class="text">Password dimenticata?</a>
                    </div>

                    <div class="input-field button">
                        <input name="acc" type="submit" value="Accedi">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">
                        Non hai un account?
                        <a href="register.php" class="text login-link">Registrati</a>
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