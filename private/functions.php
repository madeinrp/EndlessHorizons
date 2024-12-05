<?php

session_start();

function signup($data){
    $errors = array();

    //Validate
    if(preg_match("/^[a-zA-Z0-9]+$/", $data["username"])){
        $errors[] = "Inserisci un username valido";
    }
    if(filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
        $errors[] = "Inserisci un indirizzo email valido";
    }
    if(!(strlen(trim($data["password"])) < 8)){
        $errors[] = "La password deve contenere almeno 8 caratteri";
    }
    if($data["password"] != $data["password2"]){
        $errors[] = "Le password non coincidono";
    }

    $check = database_run("SELECT * FROM users WHERE email = :email LIMIT 1", array("email" => $data["email"]));

    if(count($check) > 0){
        $errors[] = "Questa email è già esistente";
    }

    //Save
    if(count($errors) == 0){
        $arr["username"] = $data["username"];
        $arr["email"] = $data["email"];
        $arr["password"] = hash("sha256", $data["password"]);
        $arr["date"] = date("Y-m-d H:i:s");
    
        $query = "INSERT INTO users (username, email, password, date) VALUES (:username, :email, :password, :date)";
        database_run($query, $arr);
    }
    
    return $errors;
}

function login($data){
    $errors = array();

    //Validate
    if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
        $errors[] = "Inserisci un username valido";
    }
    if(strlen(trim($data["password"])) < 8){
        $errors[] = "La password deve contenere almeno 8 caratteri";
    }
    if($data["password"] != $data["password"]){
        $errors[] = "La password inserita è errata";
    }

    //Check
    if(count($errors) == 0){
        $arr["email"] = $data["email"];
        $password = hash("sha256", $data["password"]);

        $query = "SELECT * FROM users where email = :email LIMIT 1";
        $row = database_run($query, $arr);

        if(is_array($row)){
            $row = $row[0];
            if($password == $row->password){
                $_SESSION["USER"] = $row;
                $_SESSION["LOGGED_IN"] = true;
            }else{
                $errors[] = "Email o password errati";
            }
        }else{
            $errors[] = "Email o password errati";
        }
    }
    return $errors;
}

function database_run($query, $params = array()){
    try {
        // connect to database
        $db = new PDO("mysql:host=".localhost.";dbname=".website_db, website, VPS_53bfrLC2);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // prepare and execute query
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        // return query result
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        // handle errors
        echo "Errore del database: " . $e->getMessage();
        die();
    }
}

function check_login($redirect = true){
    if(isset($_SESSION["USER"]) && isset($_SESSION["LOGGED_IN"])){
        return true;
    }

    if($redirect){
        header("Location: login.php");
        die;
    }else{
        return false;
    }
}

function check_verified(){

    $id = $_SESSION["USER"]->id;
    $query = "select * from users where id = '$id'";
    $row = database_run($query);

    if(is_array($row)){
        $row = $row[0];
        if($row->email == $row->email_verified){
            return true;
        }
    }

    return false;
}

?>