<?php

?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EndlessHorizons | Home</title>
        <link rel="shortcut icon" type="image/jpg" href="./private/images/NovaLogo.jpg">

        <!--Fontawesome link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!--CSS Custom-->
        <link rel="stylesheet" href="../private/css/index.css">

	<!--Favicon-->
    </head>
    <body>

        <!--Header-->
        <header class="header">
            <a href="index.html" class="logo">
                <img src="./private/images/NovaLogo.jpg" class="logo">
            </a>

            <nav class="navbar">
                <a href="profile.php">Profilo</a>
                <a href="../index.html">Esci</a>
            </nav>

            <div class="icon">
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>
        </header>

        <!--Home-->
        <section class="home" id="home">
            <div class="content">
                <h3>Entra nel <br>nostro network</h3>
                <p>Se è la prima volta che trascorri un'esperienza RolePlay ti invitiamo ad entrare nella nostra modalità!</p>
            </div>
        </section>

        <!--Info-->
        <section class="info" id="info">
            <div class="content">
                <h1>Informazioni sul server</h1>
                <p><br><span>IP:</span> MadeInRP.net</p>
                <p><span>Versioni:</span> 1.16.5 - 1.18.2</p>
            </div>
        </section>

        <!--Menù-->
        <section class="menu" id="menu">
            <h1 class="heading">RolePlay e Network</h1>
            <div class="box-container">

                <!--Box Regolamento-->
                <div class="box">
                    <img src="./private/images/NovaBank.jpg" alt="Bank">
                    <h3>Regolamento</h3>
                    <p>
                        <br>
                        Il regolamento è importante per evitare di riscontrare ulteriori sanzioni e per una migliore esperienza RolePlay
                        <br>
                    </p>
                    <a href="./pages/regolamento.html" class="btn">Regolamento</a>
                </div>

                <!--Box Store-->
                <div class="box">
                    <img src="./private/images/NovaLogo.jpg" alt="Logo">
                    <h3>Store</h3>
                    <p>
                        <br>
                        Visita il nostro store per scoprire tutti i pacchetti disponibili nella piattaforma a prezzi convenienti
                        <br>
                    </p>
                    <a href="https://MadeInRP.tebex.io" class="btn">Store</a>
                </div>

                <!-- Box Candidature -->
                <div class="box">
                    <img src="./private/images/Staff.png" alt="Module">
                    <h3>Candidature</h3>
                    <p>
                        <br>
                        Se hai voglia di lavorare con noi candidati sulla pagina collegata, siamo in cerca di ottimi collaboratori
                        <br>
                    </p>
                    <a href="./pages/candidature/candidature.html" class="btn">Candidature</a>
                </div>

                <!-- Box Social -->
                <div class="box">
                    <img src="./private/images/share.png" alt="Module">
                    <h3>Social</h3>
                    <p>
                        <br>
                        Seguici sui nostri social e rimani aggiornato sulle novità in arrivo
                        <br>
                    </p>
                    <a href="./pages/social.html" class="btn">Social</a>
                </div>

                <!-- Box Circolari segreteria -->
                <div class="box">
                    <img src="./private/images/circolari.png" alt="Module">
                    <h3>Circolari</h3>
                    <p>
                        <br>
                        Clicca per accedere alle circolari della segreteria municipale della modalità RolePlay
                        <br>
                    </p>
                    <a href="./pages/circolari.html" class="btn">Circolari</a>
                </div>
            </div>
        </section>

        <!--Footer-->
        <section class="footer" id="footer">
            <div class="share">
                <a href="https://www.instagram.com/novacityrp/" class="fab fa-instagram"></a>
                <a href="https://t.me/MadeInRP" class="fab fa-telegram"></a>
                <a href="https://t.me/NovaCityRP" class="fab fa-telegram"></a>
                <a href="https://Discord.io/MadeInRP" class="fab fa-discord"></a>
            </div>

            <div class="links">
                <a href="index.html">Home</a>
                <a href="https://MadeInRP.tebex.io">Store</a>
                <a href="./pages/regolamento.html">Regolamento</a>
                <a href="./pages/candidature/candidature.html">Candidature</a>
                <a href="./pages/social.html">Social</a>
            </div>

            <div class="credit">
                Copyright <a href="index.html">EndlessHorizons</a> | All right reserved
            </div>
        </section>

        <script src="./private/js/home.js"></script>
    </body>
</html>