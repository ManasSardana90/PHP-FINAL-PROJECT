<header>
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a href="index.php" class="logo">My Website</a>

        <!-- Navigation Links -->
        <nav class="nav-links">
            <a href="index.php">Home</a>
            <a href="HOME/about.php">About</a>
            <a href="HOME/register.php">Register</a>
        </nav>

        <!-- Login Form / User Info -->
        <div class="login-section">
            <?php if(!isset($_SESSION['logged_in'])): ?>
                <!-- Display Login Form if user is not logged in -->
                <form action="login.php" method="post">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
            <?php else: ?>
                <!-- Display User Info if user is logged in -->
                <span>Welcome, <?php echo $_SESSION['user_name']; ?>!</span>
                <a href="logout.php">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</header>
