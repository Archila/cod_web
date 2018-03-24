<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <link href="css/prism.css" rel="stylesheet" />

     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>LOGUEO</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col l4 m4 offset-l4">
          <form class="" action="login.php" method="post">
            <div class="row">
              <div class="col s12">
                <div class="input-field inline">
                  <input id="name" type="text" class="validate" required="required" name="nombre">
                  <label for="name" >Usuario</label>
                </div>
                <div class="col s12">
                  <div class="input-field inline">
                    <input id="clave" type="password" class="validate" required="required" name="clave">
                    <label for="clave" >Contraseña</label>
                  </div>
                  <button class="btn waves-effect waves-light" type="submit" name="action">Ingresar
                    <i class="material-icons right">arrow_forward</i>
                  </button>
              </div>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
