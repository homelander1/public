<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>MNTN</title>
</head>

<body class="gradient-background">
    <div class="social-block">
        <ul>
            <li><button type="button" id="openFollowUsModal" class="followUs"><img src="/assets/img/Follow us.png"></button></li>
            <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><img src="/assets/img/instagram.png"></a></li>
            <li><a href="https://x.com/i/flow/login" target="_blank"><img src="/assets/img/twitter.png"></a></li>

        </ul>
    </div>

    <div class="wrapper">
        <?php include './header.php'; ?>

        <div class="hero">
            <div class="hero-info">
                <div class="hiking-guide"><img src="/assets/img/Rectangle 2.1.png"></div>
                <h1>Be Prepared For The Mauntains And Beyond!</h1>
                <div class="scrollDown" id="scrollButton"><a href="#"><img src="/assets/img/scrollDown.png" alt="scroll"></a></div>

            </div>
        </div>
    </div>

    <!-- index.php -->

    <!-- Follow Us modal window -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="followUsTitle">Follow Us<div class="close">X</div>
            </div>
            <form id="contactForm" action="index.php" method="POST">
                <input type="hidden" name="form_type" value="subscribe">
                <label for="name">Name<span class="requiredField">*</span></label><br>
                <input type="text" id="name" name="name" class="formField" placeholder="John Smith" required><br><br>
                <label for="email">Email<span class="requiredField">*</span></label><br>
                <input type="email" id="email" name="email" class="formField" placeholder="example@example.com" required><br><br>
                <button type="submit" class="followUs_subscribe">SUBSCRIBE</button>
            </form>
        </div>
    </div>

    <!-- Data sent to db -->
    <?php
    include_once './ContactUs.php'; // Change to include_once
    include_once './registration.php'; // Change to include_once

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['form_type']) && $_POST['form_type'] === 'subscribe') {
            processForm($_POST);
        } elseif (isset($_POST['form_type']) && $_POST['form_type'] === 'registration') {
            registrationForm($_POST);
        } elseif (isset($_POST['login'])) { // Check for login form submission
            loginUser($_POST);
        }
    }

    ?>



    <!-- Sign up modal -->
    <div id="myModalSignup" class="modalLog" style="display:none;">
        <div class="modal-content">
            <div class="followUsTitle">Sign up
                <div class="close">X</div>
            </div>
            <form id="signupForm" action="index.php" method="POST">
                <input type="hidden" name="form_type" value="registration">
                <label>First Name</label>
                <input class="formField" type="text" name="first_name" placeholder="First name" required><br><br>
                <label>Last Name</label>
                <input class="formField" type="text" name="last_name" placeholder="Last name" required><br><br>
                <label>Email</label>
                <input class="formField" type="email" name="email" placeholder="Enter email address" required><br><br>
                <label>Password</label>
                <input class="formField" type="password" name="password" placeholder="Enter password" required><br><br>
                <label>Confirm Password</label>
                <input class="formField" type="password" name="confirm_password" placeholder="Confirm password" required><br><br>
                <button class="followUs_subscribe" type="submit">SIGN UP</button>
                <div class="SignUpLink">Already have an account? <a href="#" id="switchToLogin">Log In</a></div>
            </form>
        </div>
    </div>


    <div id="toast" style="display:none;">Signup successful!</div>



    <!-- Log in modal -->
    <div id="myModalLogin" class="modalLog">
        <div class="modal-content">
            <div class="followUsTitle">Log in
                <div class="close">X</div>
            </div>
            <form id="contactForm" action="index.php" method="POST">

                <label>Email</label>
                <input class="formField" type="email" name="login" placeholder="Enter email address" required><br><br>
                <label>Password</label>
                <input class="formField" type="password" name="password" placeholder="Enter password" required><br><br>
                <button class="followUs_subscribe" type="submit">LOG IN</button>
                <div class="SignUpLink">Don't have an account? <a href="#" id="switchToSignUp">Sign Up</a></div>
            </form>
        </div>
    </div>
    <?php include './index-articles.php'; ?>
    <?php include './footer.php'; ?>


    <script src="./js.js"></script>

</body>

</html>