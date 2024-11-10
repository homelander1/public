<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: index.php");
    exit();
}

$first_name = $_SESSION['first_name'] ?? '';
$last_name = $_SESSION['last_name'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/about.css">

    <title>Dashboard</title>
</head>

<body>
    <?php include './header.php'; ?>



    <div class="article2">
        <!-- section 01 -->
        <div class="get_started">

            <div class="section_group">
                <h1>Welcome, <?php echo htmlspecialchars($first_name . ' ' . $last_name); ?>!</h1>
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
        <a href="logout.php">Log out</a>
    </div>


</body>

</html>