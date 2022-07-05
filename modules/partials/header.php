<?php
session_start();
$name = $_SESSION['name'] ?? "Guest";
?>
<header>
    <div>
        <h4>The logo</h4>
    </div>
    <div>
        <h2 class="slogan">The header slogan</h2>
    </div>
    <div id="form">
        <ul>
            <li>Hi <span><?php echo $name ?></span></li>
            <li>
                <?php echo $_SESSION['name']
                    ? '<a href="index.php?m=login">Logout</a>'
                    : '<a href="javascript:void(0)" onclick="showLoginForm()">Login</a>' ?>
            </li>
        </ul>

        <form id="login" method="post" action="index.php?m=login">
            <input type="text" name="username" placeholder="User name" required />
            <input type="password" name="password" placeholder="Password" required />
            <label><input type="checkbox" name="rememberUsername" />Remember user name </label>
            <button type="submit" name="Login">Login</button>
        </form>
        <form method="GET" id="search">
            <input type="text" name="keyword" />
            <i class="material-icons">search</i>
        </form>
    </div>
</header>

<!-- The menu -->
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php if ($_SESSION) echo '<li><a href="index.php?m=profile">My Profile</a></li>' ?>
        <!-- <li><a href="index.php?m=user">List User</a></li> -->
        <?php if (!$_SESSION) echo '<li><a href="index.php?m=register">Register</a></li>' ?>
        <?php if ($_SESSION) echo '<li><a href="index.php?m=change">Change password</a></li>' ?>
    </ul>
</nav>
