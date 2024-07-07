<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Josip Sokol - Portfolio</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/f31be06999.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="navigation-include">
        <nav class="kmetovi">
            <ul class="kmet">
                <a href="index.php" class="inactive">WELCOME</a>
            </ul>
            <div class="dropdown">
                <ul class="kmet">
                    <a id="portfolio" class="inactive">PORTFOLIO
                        <i id="arrow" class="fas fa-caret-down" style="transform: rotate(0deg);"></i>
                    </a>
                    
                    <div class="dropdown-content">
                        <li><a href="../colorGallery.php">MAIN GALLERY</a></li>
                        <li><a href="../blackWhiteGallery.php">BLACK & WHITE GALLERY</a></li>
                        <li><a href="">COVER ARTS</a></li>
                        <li><a href="../videoGallery.php">MUSIC SPOTS</a></li>
                    </div>
                </ul>
            </div>
            <ul class="kmet">
                <a href="" class="inactive">ABOUT ME</a>
            </ul>
            <div class="hamburger-wrapper">
                <div class="hamburger-menu"></div>
                <div id="bitchborgar" class="clickable-area"></div>
            </div>
        </nav><br>
    </section>
    <div class="content">
        <div class="gradient">
            
        </div>
        <div class="hero-content">
            <h4>Welcome to</h4>
            <h1>TIN JOSIP SOKOL</h1>
            <h1>PHOTOGRAPHY</h1>
            <h5>My name is Tin Josip Sokol, I’m a dedicated photographer with the purpose of capturing moments, memories and the essence of every moment </h5>
            <div class="button-container">
                <button class="about-me-btn" >ABOUT ME</button>
                <button class="my-work-btn">MY WORK</button>
            </div>
        </div>
    </div>
    <script src="js/Navigation.js"></script>
</body>

</html>