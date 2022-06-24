<?php
require_once __DIR__ . '/../libs/database.php';
$db = new Database();
$id = $_GET['id'];

// Delete data
try {
    $db->table('users')->delete($id);
    header('Location: index.php?m=user');
} catch (PDOException $e) {
    echo $e->getMessage();
}
