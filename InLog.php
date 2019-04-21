<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pharmasys | Sistema de Ventas de Farmacia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/InLog.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  </head>
  <body>
    <div class="Loader">
      <div id="root">
        <div class="LoginApp">
          <div class="FormLogin">
            <img class="logo" src="img/2ffac600bf44b92fb9a3dde19f603ada.png" alt="Pharmasys_Isotipo">
            <form>
              <div>
                <label for="user">Usuario</label>
                <input id="user" type="text" placeholder="Ingrese su Usuario">
              </div>
              <div>
                <label for="pass">Contraseña</label>
                <input id="pass" type="password" placeholder="Ingrese su Contraseña">
              </div>
              </form>
              <div class="button">
                  <button id="LoginButton" type="submit">Siguiente</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(window).load(function() {
      $(".loader").fadeOut("slow");
      });
    </script>
    <script src="login.js"></script>
  </body>
</html>