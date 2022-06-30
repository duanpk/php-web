<?php
session_start();

$name = $_SESSION['name'];
$password = $_SESSION['password'];

$_SESSION['name'] = $_SESSION['name'] ?? "John";
$_SESSION['password'] = $_SESSION['password'] ?? "12345";

echo $name ? "<h1>Welcome $name</h1>" : "<h1>Welcome guest</h1>";
echo $password ? "<h1>Your password is $password</h1>" : "<h1>You have not set your password</h1>";
