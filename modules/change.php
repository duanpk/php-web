<?php
if (!$_SESSION) {
    header('Location: index.php?m=register');
}
if (($_POST['submit'] === 'change') && $_SESSION['id']) {
    require_once __DIR__ . '/../libs/database.php';
    $db = new Database();

    $current_password = $db->table('users')->where('id', $_SESSION['id'], '=')->get()[0]['password'];

    // Update data
    $old_password = md5($_POST['old-password']);
    $new_password = md5($_POST['new-password']);

    if($current_password === $old_password) {
        try {
            $db->table('users')->where('id', $_SESSION['id'], '=')->update(['password' => $new_password]);
            header('Location: index.php?m=profile');
        } catch (PDOException $e) {
            header('Location: index.php?m=error&msg=' . $e->getMessage());
        }
        // echo '<script>alert("Change password success")</script>';
    } else {
        header('Location: index.php?m=error&msg=Wrong password');
    }
}
?>
<h3>Change password</h3>
<form action="" method="post" onsubmit="submitChangePassword(this)">
    <p>Old password: <input type="password" name="old-password" id='old-password' required></p>
    <p>New password: <input type="password" name="new-password" id='new-password' required></p>
    <p>Confirm password: <input type="password" name="confirm-password" id='confirm-password' required></p>
    <p><input type="submit" name="submit" value="change"></p>
</form>
