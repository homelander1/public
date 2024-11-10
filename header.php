<header>
    <nav>
        <a class="logo" href="#">MNTN</a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="equipment.php">Equipment</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
            <!-- Display Account button if logged in -->
            <a href="user.php" class="account-btn">
                <img src="./assets/img/account.png" alt=""></a>
        <?php else: ?>
            <!-- Display Log in button if not logged in -->
            <button type="button" id="openLoginModal" class="log-reg">Log in</button>
        <?php endif; ?>
    </nav>
</header>