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
        <header>
            <nav>
                <a class="logo" href="#">MNTN</a>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Equipment</a></li>
                    <li><a href="#">About</a></li>
                </ul>
                <button type="button" id="openLoginModal" class="log-reg">Log in</button>
            </nav>
        </header>

        <div class="hero">
            <div class="hero-info">
                <div class="hiking-guide"><img src="/assets/img/Rectangle 2.1.png"></div>
                <h1>Be Prepared For The Mauntains And Beyond!</h1>
                <div class="scrollDown" id="scrollButton"><a href="#"><img src="/assets/img/scrollDown.png" alt="scroll"></a></div>

            </div>
        </div>
    </div>

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







    <div class="article">
        <!-- section 01 -->
        <div class="get_started">
            <div class="section_group">
                <img class="number" src="/assets/img/Equipment.png" alt="">
                <div class="section_content">
                    <img class="longline" src="/assets/img/Tagline.png" alt="">

                    <h3>What level of hiker are you?</h3>
                    <p>Determining what level of hiker you are can be an important tool when planning
                        future hikes. This hiking level guide will help you plan hikes according to different hike
                        ratings
                        set
                        by
                        various websites like All Trails and Modern Hiker. What type of hiker are you – novice,
                        moderate,
                        advanced moderate, expert, or expert backpacker?</p>
                    <a href="#"><img src="/assets/img/More.png" alt=""></a>
                </div>
            </div>
            <img class="main_photo" src="/assets/img/01.png" alt="">
        </div>
        <!-- section 02 -->
        <div class="get_started">
            <img class="main_photo" src="/assets/img/02.png" alt="">
            <div class="section_group">
                <div class="absolute_block">
                    <img class="number" src="/assets/img/Equipment-02.png" alt="">
                    <div class="section_content">
                        <img class="longline" src="/assets/img/Tagline-02.png" alt="">

                        <h3>Picking the right Hiking Gear!</h3>
                        <p>The nice thing about beginning hiking is that you don’t really need any special gear, you can
                            probably get away with things you already have.
                            Let’s start with clothing. A typical mistake hiking beginners make is wearing jeans and
                            regular clothes, which will get heavy and chafe wif they get sweaty or wet.</p>
                        <a href="#"><img src="/assets/img/More.png" alt=""></a>
                    </div>
                </div>
            </div>

        </div>
        <!-- section 03 -->
        <div class="get_started">
            <div class="section_group">
                <img class="number" src="/assets/img/Equipment-03.png" alt="">
                <div class="section_content">
                    <img class="longline" src="/assets/img/Tagline-03.png" alt="">

                    <h3>Understand Your Map & Timing</h3>
                    <p>To start, print out the hiking guide and map. If it’s raining, throw them in a Zip-Lock bag. Read
                        over the guide, study the map, and have a good idea of what to expect. I like to know what my
                        next landmark is as I hike. For example, I’ll read the guide and know that say, in a mile, I
                        make a right turn at the junction..</p>
                    <a href="#"><img src="/assets/img/More.png" alt=""></a>
                </div>
            </div>
            <img class="main_photo" src="/assets/img/03.png" alt="">
        </div>
        <!-- article end -->
    </div>

    </div>
    <footer>
        <div class="footer_one">
            <a class="logo" href="#">MNTN</a>
            <p>Get out there & discover your next slope, mountain & destination!
            </p>
            <div class="copyrights">Copyright 2023 MNTN, Inc. Terms & Privacy</div>
        </div>
        <div class="links">
            <div class="footer_link">
                <ul>
                    <li>
                        <p class="footer_title">More on The Blog</p>
                    </li>
                    <li><a href="#">About MNTN</a></li>
                    <li><a href="#">Contributors & Writers</a></li>
                    <li><a href="#">Write For Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#" class="last_link">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer_link">
                <ul>
                    <li>
                        <p class="footer_title">More on MTNT</p>
                        </p>
                    </li>
                    <li><a href="#">The Team</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#" class="last_link">Press</a></li>
                </ul>
            </div>

        </div>
    </footer>

    <script src="./js.js"></script>

</body>

</html>