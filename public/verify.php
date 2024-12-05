<?php

    /*require "../private/functions.php";
    require "../private/mail.php";

    check_login();

    $errors = array();

    if($_SERVER["REQUEST_METHOD"] == "GET" && !check_verified()){
        //Invia email
        $vars["code"] = rand(10000, 99999);

        //Salva nel database
        $vars["expires"] = (time() + (60 * 1));
        $vars["email"] = $_SESSION["USER"]->email;

        $query = "INSERT INTO verify (code,expires,email) VALUES (:code,:expires,:email)";
        database_run($query, $vars);

        $message = "Il tuo codice di verifica è " . $vars["code"];
        $subject = "Verifica dell'email EndlessHorizons";
        $recipient = $vars["email"];
        send_mail($recipient, $subject, $message);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){

		if(!check_verified()){

			$query = "SELECT * FROM verify WHERE code = :code && email = :email";
			$vars = array();
			$vars['email'] = $_SESSION['USER']->email;
			$vars['code'] = $_POST['code'];

			$row = database_run($query,$vars);

			if(is_array($row)){
				$row = $row[0];
				$time = time();

				if($row->expires > $time){

					$id = $_SESSION['USER']->id;
					$query = "UPDATE users SET email_verified = email WHERE id = '$id' LIMIT 1";

					database_run($query);

					header("Location: profile.php");
					die;
				}else{
					echo "Il codice inserito è scaduto";
				}

			}else{
				echo "Il codice inserito è errato";
			}
		}else{
			echo "Sei già verificato";
		}
	}*/

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificati</title>

	<link rel="stylesheet" href="../private/css/verify.css">
</head>
<body>
    <section class="registered">
		<div class="check">
			<h3>Verifica dell'account</h3>
			<br>
			<p>Il tuo account è in fase di verifica, controlla la tua email e inserisci il codice di verifica per poter completare la registrazione dell'account</p>
			<br>
			<form action="">
				<input type="text" name="code" id="code" placeholder="Inserisci il codice qui">
				<br><br>
				<input type="submit" name="Invia" id="send">
			</form>
		</div>
	</section>
</body>
</html>