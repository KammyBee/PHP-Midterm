<?php
$dsn = 'mysql:host=localhost;dbname=zippyusedautos';
$username = 'your_db_username';
$password = 'your_db_password';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../view/db_error.php');
    exit();
}
?>
