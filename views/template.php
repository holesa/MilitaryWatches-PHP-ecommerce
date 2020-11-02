<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?= $metaDescription ?>"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/css/style.css" type="text/css"/>
        <link rel="icon" href="./public/images/favicon.ico">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
                    <a class="navbar-brand d-none d-md-block" href="/">
                        <img src="../public/images/logo.png">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Products</a>
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/cart">
                                <i class="fas fa-shopping-cart fa-lg"></i>
                                <span id="cart-quantity-icon" class="circular-button"><?=$_SESSION["totalQuantity"]?></span>
                            </a>
                        </li>
                    </ul>
            </nav>
        </header>
        <main class="mt-5">
        <?=$this->controller->renderView()?>
        </main>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="../public/js/script.js"></script>
        <footer></footer>
    </body>
</html>