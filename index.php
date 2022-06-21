<head>
    <link rel="stylesheet" href="normalize.css">
    <meta charset="utf-8">
    <title>My web page</title>
    <link rel="stylesheet" href="assets/css/index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="assets/js/index.js"></script>
</head>
<?php
$module = $_GET['m'];
$module = $module ?? 'home';

# Include header
require_once __DIR__ . '/modules/partials/header.php';
# Include main contain
require_once __DIR__ . "/modules/$module.php";
# Include footer
require_once __DIR__ . '/modules/partials/footer.php';
