<?php

echo "<h1>Hello!</h1>";


$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
try {
    $db = new PDO(
        "mysql:host='';" .
        "dbname=test;" .
        "charset=utf8",
        "",
        "",
        $options
    );
} catch (PDOException $ex) {
    die("Failed to connect to the database: " . $ex->getMessage());
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


$stmt = $db->prepare('SELECT * FROM users WHERE email = :email');
$stmt->execute(['email' => "test@test.com"]);
print_r($user = $stmt->fetch());

