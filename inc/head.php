<!DOCTYPE html>
<html lang="en">
<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=  $sayfa ?> | Anthony Html5 Template</title>
    <!--======= css here =======-->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/venobox.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <!--======= header-part start ======-->
    <header class="header-part sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="logo" href="index.html">
                    <img src="images/logo/white-logo.png" alt="white-logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?php if($sayfa=='Anasayfa') echo "active" ?>">
                            <a class="nav-link" href="anasayfa">Home</a>
                        </li>
                        <li class="nav-item <?php if($sayfa=='Hakkımızda') echo "active" ?>">
                            <a class="nav-link" href="hakkimizda">about</a>
                        </li>
                        <li class="nav-item <?php if($sayfa=='Hizmetler') echo "active" ?>">
                            <a class="nav-link" href="hizmetler">service</a>
                        </li>
                        <li class="nav-item <?php if($sayfa=='Projeler') echo "active" ?>">
                            <a class="nav-link" href="projeler">project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="team.php">team</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                blog
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="blog-grid.php">blog grid</a>
                                <a class="dropdown-item" href="blog-20-details.php">blog details</a>
                                <a class="dropdown-item" href="blog-sidebar.php">blog sidebar</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--======= header-part end ======-->
    </header>