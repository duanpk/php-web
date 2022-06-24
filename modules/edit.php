<?php
require_once __DIR__ . '/../libs/database.php';
$db = new Database();
$id = $_GET['id'];
if ($_POST['submit'] === 'edit') {

    // Create data
    $data = [
        'fullname' => $_POST['fullname'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'email' => $_POST['email'],
    ];

    // Update data
    try {
        $db->table('users')->update($data, $id);
        header('Location: index.php?m=user');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
$user = $db->table('users')->get($id);
?>

<head>
    <title>PHP MySQL - Insert Data</title>
</head>

<body>
    <h2>Create an User</h2>
    <form action="" method="post">
        <p>Full Name: <input type="text" name="fullname" value="<?php echo $user['fullname'] ?>"></p>
        <p>Username: <input type="text" name="username" value="<?php echo $user['username'] ?>"></p>
        <p>Password: <input type="password" name="password" value="<?php echo $user['password'] ?>"></p>
        <p>E-mail: <input type="text" name="email" value="<?php echo $user['email'] ?>"></p>
        <p><input type="submit" name="submit" value="edit"></p>
    </form>
</body>

</html>
