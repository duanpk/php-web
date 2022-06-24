<?php
if ($_POST['submit'] === 'create') {
    require_once __DIR__ . '/../libs/database.php';
    $db = new Database();

    // Create data
    $data = [
        'fullname' => $_POST['fullname'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'email' => $_POST['email'],
    ];

    // Insert data
    try {
        $db->table('users')->insert($data);
        header('Location: index.php?m=user');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<head>
    <title>PHP MySQL - Insert Data</title>
</head>

<body>
    <h2>Create an User</h2>
    <form action="" method="post">
        <p>Full Name: <input type="text" name="fullname"></p>
        <p>Username: <input type="text" name="username"></p>
        <p>Password: <input type="password" name="password"></p>
        <p>E-mail: <input type="text" name="email"></p>
        <p><input type="submit" name="submit" value="create"></p>
    </form>
</body>

</html>
