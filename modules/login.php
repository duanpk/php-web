<?php
session_destroy();
require_once __DIR__ . '/../libs/database.php';
$db = new Database();

$username = addslashes($_POST['username']);
$password = md5($_POST["password"]);
$user = $db->table('users')->where('username', $username, '=')->where('password', $password, '=')->get()[0];
try {
    $user = $db->table('users')->where('username', $username, '=')->where('password', $password, '=')->get()[0];
} catch (PDOException $e) {
    header('Location: index.php?m=error&msg=' . $e->getMessage());
}
print_r($user);

if (!$user) {
    header('Location: index.php?m=error&msg=Login failed');
} else {
    session_start();
    $_SESSION['name'] = $user['fullname'];
    $_SESSION['id'] = $user['id'];
    header('Location: index.php?m=profile');
}
