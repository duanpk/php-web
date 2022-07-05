<!-- MAIN content -->
<div id="main">
    <div id="main-content">
        <?php
        if ($_SESSION) {
            require_once __DIR__ . '/user.php';
        }
        else {
            echo '<h3>Welcome to the website! Login to see users list</h3>';
        }
        ?>
    </div>
    <!-- embed sidebar.php -->
    <?php require_once __DIR__ . '/partials/sidebar.php' ?>
</div>
