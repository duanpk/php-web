<?php
setcookie("name", "John", time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie("password", "12345", time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie("email", "john@gmail", time() + (86400 * 30), "/"); // 86400 = 1 day

$name = $_COOKIE['name'];
$password = $_COOKIE['password'];
$email = $_COOKIE['email'];

echo $name ? "<h1>Welcome $name</h1>" : "<h1>Welcome guest</h1>";
echo $password ? "<h1>Your password is $password</h1>" : "<h1>You have not set your password</h1>";
echo $email ? "<h1>Your email is $email</h1>" : "<h1>You have not set your email</h1>";
