<?php

require_once __DIR__ . '/../libs/database.php';

$db = new Database('127.0.0.1', 'root', 'bietlamgi', 'php_mysql');
?>

<div id="main">
    <div id="main-content">
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
                $users = $db->table('users')->getAll();
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>{$user['id']}</td>";
                    echo "<td>{$user['username']}</td>";
                    echo "<td>{$user['password']}</td>";
                    echo "<td>{$user['fullname']}</td>";
                    echo "<td>{$user['email']}</td>";
                    echo "<td><a href='index.php?m=edit&id={$user['id']}'>Sửa&nbsp;&nbsp;</a>";
                    echo "<a href='index.php?m=delete&id={$user['id']}'>Xóa</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <!-- </div> -->
    </div>
    <?php require_once __DIR__ . '/partials/sidebar.php'; ?>
</div>
