<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página web del Reto1 del Grupo 1 WWW">
    <meta name="author" content="Ieltxu Albin, Erlaitz Alonso, Andoni Alonso, Juan Garcia e Ibai Garcia">
    <link rel="icon" href="../img/Logo_muskiz.svg">
    <title>Biblioteca de Muskiz</title>
    <link rel="stylesheet" href="../css/account/account.css">
    <link rel="stylesheet" href="../css/common.css">
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: login.php');
    }
    ?>
    <header class="header">
        <!--este es el titulo-->
        <section class="title">
            <img src="../img/muskiz_udala.jpg" alt="Logo Muskiz">
            <h1> BIBLIOTECA DE MUSKIZ</h1>
            <!--Aparatado para la pagina de inicio que te redige hacia otro lado-->
        </section>
        <nav class="menu">
            <ul>
                <li><a href="/index.html">Inicio</a></li>
                <li><a href="/views/noticias.html">Noticias</a></li>
                <li><a href="/views/catalogo_1.html">Catalogo</a></li>
                <li><a href="/views/acercade.html">Acerca de</a></li>
                <li><a href="/views/login.php">Mi cuenta</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2 class="title-info">Mi Cuenta</h2>
        <section class="global-account">
            <article class="account-box">
                <div class="user-info">
                    <h2>Datos personales y de contacto</h2>
                    <p><strong>Nombre:</strong> <?php
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        echo 'admin';
                    }
                    ?></p>
                    <p><strong>Pseudónimo:</strong> <?php
                    if (isset($_SESSION['user_name'])) {
                        echo $_SESSION['user_name'];
                    } else {
                        echo 'admin';
                    }
                    ?></p>
                    <p><strong>Email:</strong> <?php
                    if (isset($_SESSION['user_email'])) {
                        echo $_SESSION['user_email'];
                    } else {
                        echo 'admin@muskiz.eus';
                    }
                    ?></p>
                    <p><strong>Teléfono:</strong> <?php
                    if (isset($_SESSION['user_telf'])) {
                        echo $_SESSION['user_telf'];
                    } else {
                        echo '000000000';
                    }
                    ?></p>
                    <p><strong>Penalización:</strong> <?php
                    if (isset($_SESSION['user_pen'])) {
                        echo $_SESSION['user_pen'];
                    } else {
                        echo '0';
                    }
                    ?></p>
                    <form action="account.php" method="post">
                        <button class="logout" name="logout">Cerrar Sesión</button>
                    </form>
                </div>

                <div class="change-password">
                    <h2>Datos de acceso</h2>
                    <p><strong>Email:</strong> <?php
                    if (isset($_SESSION['user_email'])) {
                        echo $_SESSION['user_email'];
                    } else {
                        echo 'admin@muskiz.eus';
                    }
                    ?></p>
                    <form action="" method="post">
                        <label for="old-password">Contraseña Actual:</label>
                        <input type="password" id="old-password" name="password_old" required>

                        <label for="new-password">Nueva Contraseña:</label>
                        <input type="password" id="new-password" name="password" required>

                        <label for="confirm-password">Confirmar Nueva Contraseña:</label>
                        <input type="password" id="confirm-password" name="password_sec" required>

                        <button type="submit">Cambiar Contraseña</button>

                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $password_old = $_POST['password_old'];
                            $password = $_POST['password'];
                            $password_sec = $_POST['password_sec'];

                            if ($password !== $password_sec) {
                                echo "La nueva contraseña no coinciden. Por favor, inténtalo de nuevo." ;
                            } elseif ($password_old == $password) {
                                echo("No se puede poner la antigua contraseña. Por favor, inténtalo de nuevo.");
                            }else {
                                echo "Se cambio la contraseña!";
                            }
                        }
                        ?>
                    </form>
                </div>
            </article>

            <article class="books-box">
                <h2>Libros Prestados</h2>
                <hr>
                <div class="book-box">
                    <div class="book-img"><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages.vexels.com%2Fmedia%2Fusers%2F3%2F140908%2Fisolated%2Fpreview%2Fbdc30bbe3c022a11e2d7fd0e642c61ae-icono-de-libro-abierto.png&f=1&nofb=1&ipt=d0831dcfe1d3c14dcfff8aa9d4c51b47e2e1a8185ed577aa8f07abcff55f7bff&ipo=images" alt="Libro"></div>
                    <p>Libro: Sin préstamo<br><br>Autor: Sin préstamo</p>
                </div>
                <hr>
                <div class="book-box">
                    <div class="book-img"><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages.vexels.com%2Fmedia%2Fusers%2F3%2F140908%2Fisolated%2Fpreview%2Fbdc30bbe3c022a11e2d7fd0e642c61ae-icono-de-libro-abierto.png&f=1&nofb=1&ipt=d0831dcfe1d3c14dcfff8aa9d4c51b47e2e1a8185ed577aa8f07abcff55f7bff&ipo=images" alt="Libro"></div>
                    <p>Libro: Sin préstamo<br><br>Autor: Sin préstamo</p>
                </div>
                <hr>
                <div class="book-box">
                    <div class="book-img"><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages.vexels.com%2Fmedia%2Fusers%2F3%2F140908%2Fisolated%2Fpreview%2Fbdc30bbe3c022a11e2d7fd0e642c61ae-icono-de-libro-abierto.png&f=1&nofb=1&ipt=d0831dcfe1d3c14dcfff8aa9d4c51b47e2e1a8185ed577aa8f07abcff55f7bff&ipo=images" alt="Libro"></div>
                    <p>Libro: Sin préstamo<br><br>Autor: Sin préstamo</p>
                </div>
            </article>
        </section>
    </main>
    <footer class="footer">
        <section class="footer-content">
            <article class="footer-section">
                <h2>Biblioteca de Muskiz</h2>
                <p>Tu fuente de conocimiento y entretenimiento en Muskiz.</p>
                <div class="footer-images">
                    <div><img src="../img/muskiz_udala.jpg" alt="Logo Muskiz"></div>
                    <div><img src="../img/Logo_govierno vasco.png" alt="Logo Gobierno Vasco"></div>
                    <div><img src="../img/Logo_WWW.jpg" alt="Logo WWW"></div>
                </div>
            </article>
            <article class="footer-section">
                <h2>Enlaces Rápidos</h2>
                <ul>
                    <li><a href="/index.html">Inicio</a></li>
                    <li><a href="/views/noticias.html">Noticias</a></li>
                    <li><a href="/views/catalogo_1.html">Catalogo</a></li>
                    <li><a href="/views/acercade.html">Acerca de</a></li>
                    <li><a href="/views/login.php">Mi cuenta</a></li>
                </ul>
            </article>
            <article class="footer-section">
                <h2>Contacto</h2>
                <p>Email: biblioteca@muskiz.eus</p>
                <p>Teléfono: +34 946 707 275</p>
                <p>Dirección: Cendeja 29. Muskiz, 48550 </p>
            </article>
        </section>
        <article class="footer-bottom">
            &copy; 2024 Biblioteca de Muskiz | Todos los derechos reservados
        </article>
    </footer>
</body>
</html>