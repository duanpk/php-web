<?php
require_once __DIR__ . '/../libs/database.php';
$db = new Database();
$id = $_GET['id'];

// Delete data
try {
    $db->table('users')->where('id', $id, '=')->delete();
    header('Location: index.php');
} catch (PDOException $e) {
    header('Location: index.php?m=error&msg=' . $e->getMessage());
}
