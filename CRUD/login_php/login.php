<html>
    <head>
        <title>FactuRappi - Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilos.css">
        <meta name="viewport" content="width=device-width">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    </head>
    <body id="login-body" style="background: url(../img/backgroundblue.png)">
       <div class="Logo-log">
       <img src="../img/FactuRappiLogo.png" width="200px">
       </div>
        <div class="login-box">
        <form class="modal-content animate" method="POST" action="SesionDB.php"><br>
            <h1>Login</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Usuario" name="username" >
            </div>

            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="password" >
            </div>
            <br>
            <input type="submit" class="btn" name="submit" value="Entrar">
        </form>
        </div>
    </body>
</html>