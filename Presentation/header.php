<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="js/sidebar.js" defer>
    </script> <link rel="icon" href="/img/pizzaIcon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/carousel.css">
    <title>Pizzeria</title>
</head>
<body>
<header class="bg-dark">
    <div class="container">
        <div class="row justify-content-between">
            <nav class="navbar navbar-expand-lg px-0 ">
                <div class="container-fluid px-0">
                    <a class="navbar-brand p-0" href="index.php">
                        <img src="../img/Pizzeria.png" alt="Pizzeria" width="100" id="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                        <ul class="navbar-nav" id="menu">
                            <li class="px-5"><a href="index.php" class="nav-link link-light">Home</a></li>
                            <li class="px-5"><a href="menu.php" class="nav-link link-light">Menu</a></li>
                            <li class="px-5"><a href="about.php" class="nav-link link-light">About</a></li>
                            <?php if ($aangemeld) { ?>
                            <li class="px-5"><a href="profiel.php" class="nav-link link-light">Profiel</a></li>
                            <?php } ?>
                            <li class="px-5"><a href="contact.php" class="nav-link link-light">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-1 d-flex flex-wrap justify-content-end">
                            <ul class="nav">
                                <?php if ($aangemeld) { ?>
                                    <li class="nav-item"><a href="logout.php" class="nav-link link-light px-2">Afmelden</a></li>
                                <?php }  ?>
                            </ul>

                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<main>









