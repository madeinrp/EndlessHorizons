<?php
require("../private/conn.php");

$conf = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email_verified=:id");
    $stmt->bindParam(':id', $conf);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 1) {
        try {
            $stmt = $conn->prepare("UPDATE users SET email_verified = 'TRUE' WHERE email_verified = :id;");
            $stmt->bindParam(':id', $conf);
            $stmt->execute();
            echo "conferma avvenuta con successo";
        } catch (PDOException $e) {
            die('Database error: ' . $e->getMessage());
        }
    } else if ($count == 0) {
        echo "No rows found with the specified ID.";
    } else {
        echo "Error: Multiple rows found with the specified ID.";
    }
} catch (PDOException $e) {
    die('Database error: ' . $e->getMessage());
}
?>
