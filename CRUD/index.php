<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   
   header('Location: http://localhost/Diseño Web Facturación MD/login_php/login.php');//redirige a la pÃ¡gina de login si el usuario quiere ingresar sin iniciar sesion


exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();
header('Location: http://localhost/Diseño Web Facturación MD/login_php/login.php');//redirige a la pÃ¡gina de login, modifica la url a tu conveniencia
echo "Tu sesion a expirado,
<a href='login.php'>Inicia Sesion</a>";
exit;
}
?>

  <!DOCTYPE html>
   <html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio  - FactuRappi</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <script type="text/javascript" src="js/componentes.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    </head>
    <body> 
      <!--CABECERA-->
    <header id="cabecera" style="background: url(img/banner.png)">
       <div class="welcome">
           <p>Bienvenido <strong><?php echo  $_SESSION['username'];?></strong><p>
           <a href="http://localhost/Diseño Web Facturación MD/login_php/logout.php"><img src="img/logout.png" width="20px"></a>
       </div>
        <img src="img/logo.png" width="600">
    </header>
       <!--MENU-->
        <nav id="menu">
            <ul>
              <li><a class="icon-home" href="index.php">Inicio</a></li>
              <!--<li><a href="#">Cliente</a></li>-->
              <li class="icon-user-add">Registro <i class="fas fa-angle-down"></i> 
                <ul>
                  <li><a class="icon-user" href="cliente.php">Cliente</a></li>
                  <li><a class="icon-shopping-bag" href="producto.php">Producto</a></li>
                  <!--
                  <li><a href="#">texto</a></li>
                  <li><a href="#">texto</a></li>
                  -->
                </ul>
              </li>
              <!--
              <li>Blog <i class="fas fa-angle-down"></i> 
                <ul>
                  <li><a href="#">HTML</a> <span>22 Posts</span></li>
                  <li><a href="#">CSS</a> <span>16 Posts</span></li>
                  <li><a href="#">JavaScript</a> <span>10 Posts</span></li>
                  <li><a href="#">Python</a> <span>13 Posts</span></li>
                  <li><a href="#">PHP</a> <span>10 Posts</span></li>
                  <li><a href="#">Design</a> <span>21 Posts</span></li>
                </ul>
              </li>
              -->
              <li><a class="icon-doc-text-inv" href="factura.php">Factura</a></li>
              <li><a class="icon-doc-text-inv" href="listaCliente.php">Lista de clientes</a></li>
               <li><a class="icon-doc-text-inv" href="listaProducto.php">Lista de Productos</a></li>
            </ul>
        </nav>
        <!--CONTENIDO-->
        <div id="contenido" style="background: url(img/backgroundblue.png)">
            
        <div class="publi-index">
           
        
            
        </div>
        
        
        
        </div>
        <!--PIE DE PAGINA-->
        <footer>
            <div class="footer1">
                <div id="Joshua">
                    <h4>Joshua Ramirez</h4>
                    <p style="margin: 0px; text-align: center">Contactos</p>
                    <!--<hr style="margin: 0px; padding: 0px; border-top: 0.5px dashed">-->
                    <div class="social">
                    <a class="icon-facebook-official"></a>
                    <a class="icon-instagram"></a>
                    <a class="icon-youtube-play"></a>
                    <a class="icon-mail-alt"></a>
                    </div>
                </div>
                <div id="Gema">
                    <h4>Gema Castillo</h4>
                    <p style="margin: 0px; text-align: center">Contactos</p>
                    <!--<hr style="margin: 0px; padding: 0px; border-top: 0.5px dashed">-->
                    <div class="social">
                    <a class="icon-facebook-official"></a>
                    <a class="icon-instagram"></a>
                    <a class="icon-youtube-play"></a>
                    <a class="icon-mail-alt"></a>
                    </div>
                </div>
                <div id="Angie">
                    <h4>Angie Moyota</h4>
                    <p style="margin: 0px; text-align: center">Contactos</p>
                    <!--<hr style="margin: 0px; padding: 0px; border-top: 0.5px dashed">-->
                    <div class="social">
                    <a class="icon-facebook-official"></a>
                    <a class="icon-instagram"></a>
                    <a class="icon-youtube-play"></a>
                    <a class="icon-mail-alt"></a>
                    </div>
                </div>
                <div id="UFAESPE">
                    <h4 style="text-align: center">UNIVERSIDAD DE LAS FUERZAS ARMADAS ESPE</h4>
                    <h5 style="text-align: center ; margin: 2px;">INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN</h5>
                    <h5 style="text-align: center; margin: 0px;">DESARROLLO WEB</h5>
                </div>
            </div>
            <div class="footer2">
                <p>2019 &copy; FactuRappi. Todos los derechos reservados.</p>
            </div>
        </footer>
    </body>
</html>