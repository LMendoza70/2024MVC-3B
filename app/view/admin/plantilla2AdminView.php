<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTHH por ser siempre los mejores...</title>
    <link rel="stylesheet" href="app/view/style.css">
</head>
<body>
    <header class="header">
        <h1>UTHH Por ser siempre los mejores...</h1>
        <nav class="navbar">
            <ul>
                <li><a href="http://localhost/php-3b/">Inicio</a></li>
                <li><a href="http://localhost/php-3b?C=usuarioController&M=callLoginForm">Login</a></li>
            </ul>
        </nav>
    </header>
    <section class="container" style="background-color: lightblue;">
        <?php include_once($vista); ?>
    </section>
    <footer class="footer">
        <h3>Pie de pagina...</h3>
    </footer>
</body>
</html>