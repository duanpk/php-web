<?php

require_once __DIR__ . '/../libs/database.php';

$db = new Database('127.0.0.1', 'root', 'bietlamgi', 'php_mysql');
?>

<!-- <div class="container"> -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên người dùng</th>
            <th>Mật khẩu</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        try {
            $users = $db->table('users')->get();
        } catch (PDOException $e) {
            header('Location: index.php?m=error&msg=' . $e->getMessage());
        }
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['id']) . "</td>";
            echo "<td>" . htmlspecialchars($user['username']) . "</td>";
            echo "<td>" . htmlspecialchars($user['password']) . "</td>";
            echo "<td>" . htmlspecialchars($user['fullname']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "<td><a href='index.php?m=edit&id={$user['id']}'>Sửa&nbsp;&nbsp;</a>";
            echo "<a href='index.php?m=delete&id={$user['id']}'>Xóa</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<!-- </div> -->
