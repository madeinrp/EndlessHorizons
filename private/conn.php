<?php
    //registrazione
    //blocco dei parametri di connessione
    $host = "localhost";// nome di host
    $db = "website_db";// nome del database
    $user = "website";// username dell'utente in connessione
    $password = "VPS_53bfrLC2"; // password dell'utente
    // blocco try/catch di gestione delle eccezioni
    try {
        // stringa di connessione al DBMS
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        // impostazione attributo per il report degli errori
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $e->getMessage(); // notifica in caso di errore nel tentativo di connessione   
    }
?>
