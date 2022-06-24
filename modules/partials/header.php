<header>
    <div>
        <h4>The logo</h4>
    </div>
    <div>
        <h2 class="slogan">The header slogan</h2>
    </div>
    <div id="form">
        <ul>
            <li>Hi <span>Guest</span></li>
            <li><a href="javascript:void(0)" onclick="showLoginForm()">Login</a></li>
        </ul>

        <form id="login">
            <input type="text" name="username" placeholder="User name" />
            <input type="password" name="password" placeholder="Password" />
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
        <li><a href="index.php?m=profile">My Profile</a></li>
        <li><a href="index.php?m=user">User</a></li>
        <li><a href="index.php?m=create">Create</a></li>
    </ul>
</nav>
