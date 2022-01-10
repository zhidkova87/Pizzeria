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
    <link rel="stylesheet" href="css/sidebar.css">
    <title>Pizzeria</title>
</head>
<body>
<header>
        <div class="row justify-content-end">
            <div class="col-5 d-flex flex-wrap justify-content-end">
                <ul class="nav">
                    <?php if ($aangemeld) { ?>
                       <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Afmelden</a></li>
                    <?php } else { ?>
                       <li class="nav-item"><a href="login.php" class="nav-link link-dark px-4">Aanmelden</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="row justify-content-between">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand fs-2 ms-5" href="indexPagina.php">
                        <img src="../img/Pizzeria.png" alt="Pizzeria" width="100" id="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                        <ul class="navbar-nav" id="menu">
                            <li class="px-5"><a href="index.php" class="nav-link link-dark">Home</a></li>
                            <li class="px-5"><a href="menu.php" class="nav-link link-dark">Menu</a></li>
                            <li class="px-5"><a href="about.php" class="nav-link link-dark">About</a></li>
                            <?php if ($aangemeld) { ?>
                            <li class="px-5"><a href="profiel.php" class="nav-link link-dark">Profiel</a></li>
                            <?php } ?>
<!--                            <li class="px-5"><a href="#" class="nav-link link-dark">Gastenboek</a></li>-->
                            <li class="px-5"><a href="contact.php" class="nav-link link-dark">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
</header>
<main>









