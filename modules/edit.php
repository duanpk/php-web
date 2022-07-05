<?php
require_once __DIR__ . '/../libs/database.php';
$db = new Database();
$id = $_GET['id'];
if ($_POST['submit'] === 'edit') {
    // Create data
    $data = [
        'fullname' => addslashes($_POST['full-name']),
        'username' => addslashes($_POST['username']),
        'password' => md5($_POST['password']),
        'email' => addslashes($_POST['email']),
    ];

    // Update data
    try {
        $db->table('users')->where('id', $id, '=')->update($data);
        header('Location: index.php');
    } catch (PDOException $e) {
        header('Location: index.php?m=error&msg=' . $e->getMessage());
    }
}
$user = $db->table('users')->where('id', $id, '=')->get()[0];
if (!$user) {
    header('Location: index.php?m=error&msg=User not found');
}
?>

<head>
    <title>PHP MySQL - Insert Data</title>
</head>

<body>
    <h3>Edit User</h3>
    <form action="" method="post">
        <p>Username: <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']) ?>"></p>
        <p>Full Name: <input type="text" name="full-name" value="<?php echo htmlspecialchars($user['fullname']) ?>"></p>
        <p>Password: <input type="password" name="password"></p>
        <p>E-mail: <input type="text" name="email" value="<?php echo htmlspecialchars($user['email']) ?>"></p>
        <p><input type="submit" name="submit" value="edit"></p>
    </form>
</body>

</html>
