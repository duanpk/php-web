<div id="main">
    <div id="main-content">
        <h3>My profile.</h3>
        <p>Name: <?php echo $_SESSION['name'] ?></p>
    </div>
    <!-- embed sidebar.php -->
    <?php require_once __DIR__ . '/partials/sidebar.php' ?>
</div>
