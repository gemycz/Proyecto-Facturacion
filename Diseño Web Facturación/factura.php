<html>
    <head>
        <meta charset="UTF-8">
        <title>Producto  - FactuRappi</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <script type="text/javascript" src="js/componentes.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    </head>
    <body> 
      <!--CABECERA-->
    <header id="cabecera" style="background: url(img/banner.png)">
        <img src="img/logo.png" width="600">
    </header>
       <!--MENU-->
        <nav id="menu">
            <ul>
              <li><a class="icon-home" href="index.html">Inicio</a></li>
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
            </ul>
        </nav>
        <!--CONTENIDO-->
        <div id="contenido-factura" style="background: url(img/backgroundblue.png); background-repeat: no-repeat;">
        <div class="title-contenido">
        <h2>Factura</h2>
        </div>
        <!--FORMULARIO REGISTRO-->
        <div class="registro-factura">
        
            <h5>Datos Factura</h5>
            <div class="formulario-registro-factura">
            <p style="position: relative; top: 10px; left:-390px; font-size:17px;">Cliente</p>
            <div class="casilla1">
               <div class="casilla1-1">
               <input type="text" name="nombre" placeholder="Nombre... ">
                </div>
                <div class="casilla1-2">
               <input type="text" name="email" placeholder="CÃ©dula... ">
               </div>
               <div class="casilla1-3">
               <input type="date" name="fecha" placeholder="Fecha... ">
               </div>
               
            </div> 
                
            <div class="casilla2">
                <div class="casilla2-1">
               <input type="text" name="telefono" placeholder="TelÃ©fono... ">
                </div>
               <div class="casilla2-2">
               <input type="text" name="direccion" placeholder="DirecciÃ³n... ">
               </div>
               <div class="casilla2-3">
                    <button>Buscar</button>
                </div>
            </div>

            <p style="position: relative; top: 10px; left:-390px; font-size:17px;">Producto</p>
            <div class="casilla4">
                <div class="casilla4-1">
               <input type="text" name="codigo" placeholder="CÃ³digo... ">
                </div>
                <div class="casilla4-2">
                   <input type="number" name="cantidad" placeholder="Cantidad... ">
                </div>
            </div>
            
            <div class="detalles">
               <table id="tablafactura">
                <tr>
                    <th>Cantidad</th>
                    <th>Decripción</th>
                    <th>Valor Unitario</th>
                    <th>Valor Total</th>
                </tr>
                <tr>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>

                </tr>
                <tr>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>

                </tr>
                <tr>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>

                </tr>
                <tr>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>

                </tr>
                </table>
            </div>
            <!--TOTALES-->
            FALTA LOS TOTALES
            </div>     
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
                    <h5 style="text-align: center ; margin: 2px;">INGENIERÃ�A EN TECNOLOGÃ�AS DE LA INFORMACIÃ“N</h5>
                    <h5 style="text-align: center; margin: 0px;">DESARROLLO WEB</h5>
                </div>
            </div>
            <div class="footer2">
                <p>2019 &copy; FactuRappi. Todos los derechos reservados.</p>
            </div>
        </footer>
    </body>
</html>