<?php
if ($_SESSION) header('Location: index.php?m=profile');
if ($_POST['submit'] === 'register') {
    require_once __DIR__ . '/../libs/database.php';
    $db = new Database();

    // Create data
    $data = [
        'fullname' => addslashes($_POST['full-name']),
        'username' => addslashes($_POST['username']),
        'password' => md5($_POST['password']),
        'email' => addslashes($_POST['email']),
    ];
    print_r($data);

    // Insert data
    try {
        $db->table('users')->insert($data);
        header('Location: index.php');
    } catch (PDOException $e) {
        header('Location: index.php?m=error&msg=' . $e->getMessage());
    }
}
?>

<head>
    <title>PHP MySQL - Insert Data</title>
</head>
<div id="main">
    <div id="main-content">
        <h3>Register User</h3>
        <form action="" method="post">
            <p>Username: <input type="text" name="username"></p>
            <p>Full Name: <input type="text" name="full-name"></p>
            <p>Password: <input type="password" name="password"></p>
            <p>E-mail: <input type="text" name="email"></p>
            <p><input type="submit" name="submit" value="register"></p>
        </form>
    </div>
</div>
