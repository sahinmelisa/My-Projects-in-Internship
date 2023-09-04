<?php

// Connect to the SQLite database
$db = new SQLite3('db.sqlite');

// Check if the username and password are valid
$username = $_POST['username'];
$password = $_POST['password'];

$query = 'SELECT * FROM users WHERE username = :username AND password = :password';
$statement = $db->prepare($query);
$statement->bindParam(':username', $username);
$statement->bindParam(':password', $password);
$result = $statement->execute();

if ($result->fetchArray()) {
    // The username and password are valid
    header('Location: Home/home.html');
    echo 'Valid';
} else {
    // The username and password are not valid
    echo 'Invalid username or password';
}

?>
