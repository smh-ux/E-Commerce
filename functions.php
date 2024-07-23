<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = ''; 
    $DATABASE_NAME = 'databaseproject1'; 

    try {
        return new PDO('mysql:host='. $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        exit('Failed to connet to database!');
    }
}

function template_header($title) {
    if (isset($_SESSION['loggedinCustomer'])) {
        echo <<<EOT
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>$title</title>
                <link href="style.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> 
            </head>

            <body>

                <header>
                    <div class="content-wrapper">
                        <h1>Empire of Worldly Products</h1>
                        <nav>
                            <a href="index.php">Home Page</a>
                            <a href="index.php?page=products">Products</a>
                        </nav>

                        <div class="link-icons">
                            <a href="index.php?page=cart">
                                <i class="fas fa-shopping-cart"></i>
                            </a>

                            <a href="index.php?page=logout">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                        
                    </div>
                </header>
                <main>
        EOT;
    } elseif (isset($_SESSION['loggedinAdmin'])) {
        echo <<<EOT
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>$title</title>
                <link href="style.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> 
                
            </head>

            <body>

                <header>
                    <div class="content-wrapper">
                        <h1>Empire of Worldly Products</h1>
                        <nav>
                            <a href="index.php">Home Page</a>
                            <a href="index.php?page=products">Products</a>
                            <a href="index.php?page=admin">Admin</a>
                        </nav>

                        <div class="link-icons">
                            <a href="index.php?page=logout">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                    </div>
                </header>
                <main>
        EOT;
    } elseif (isset($_SESSION['loggedinVendor'])) {
        echo <<<EOT
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>$title</title>
                <link href="style.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> 
                
            </head>

            <body>

                <header>
                    <div class="content-wrapper">
                        <h1>Empire of Worldly Products</h1>
                        <nav>
                            <a href="index.php">Home Page</a>
                            <a href="index.php?page=products">Products</a>
                            <a href="index.php?page=vendor">Vendor</a>
                        </nav>

                        <div class="link-icons">
                            <a href="index.php?page=logout">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                    </div>
                </header>
                <main>
        EOT; 
    } else {
        echo <<<EOT
        <!DOCTYPE html>
        <html>
            <head> 
                <meta charset="utf-8">
                <title>$title</title>
                <link href="style.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> 
            </head>

            <body>

                <header>
                    <div class="content-wrapper">
                        <h1>Empire of Worldly Products</h1>
                        <nav>
                            <a href="index.php">Home Page</a>
                            <a href="index.php?page=products">Products</a>
                            <a href="index.php?page=login">Login</a>
                        </nav>

                        <div class="link-icons">
                            <a href="index.php?page=cart">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </div>
                        
                    </div>
                </header>
                <main>
        EOT;
    }
}
        function template_footer() {
        $year = date('Y');
            echo <<<EOT
                </main>
                <footer>
                    <div class="content-wrapper">
                        <p>&copy; $year <b>Semih Okumuş</b> and <b>Zübeyir Dönmez</b></p>
                    </div>
                </footer>
            </body>
        </html>
        EOT;
    }
?>