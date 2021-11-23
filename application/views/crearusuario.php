<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css" th:href="@{/css/login.css}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Usuario Nuevo</title>
    <style>
    body{
    background: url(<?php echo base_url("assets/img/fondo.jpg");?>) no-repeat center center fixed;
    background-size: cover;
}

.main-section{
    margin:0 auto;
    margin-top:25%;
    padding: 0;
}

.modal-content{
    background-color: #3b4652;
    opacity: .85;
    padding: 0 20px;
    box-shadow: 0px 0px 3px #848484;
}
.user-img{
    margin-top: -50px;
    margin-bottom: 35px;
}

.user-img img{
    width: 100xp;
    height: 100px;
    box-shadow: 0px 0px 3px #848484;
    border-radius: 50%;
}

.form-group input{
    height: 42px;
    font-size: 18px;
    border:0;
    padding-left: 54px;
    border-radius: 5px;
}

.form-group::before{
    font-family: "Font Awesome\ 5 Free";
    position: absolute;
    left: 28px;
    font-size: 22px;
    padding-top:4px;
}

.form-group#user-group::before{
    content: "\f007";
}

.form-group#contrasena-group::before{
    content: "\f023";
}

button{
    width: 60%;
    margin: 5px 0 25px;
}

.forgot{
    padding: 5px 0;
}

.forgot a{
    color: white;
}

h2{
    color: white;
}

</style>
  </head>

  <body class="bg-info">

  <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                <img src="<?php echo base_url("assets/img/avatar.png"); ?>" th:src="@{/assets/img/user.png}" >
                   
                </div>
                <h2>Usuario Nuevo</h2>
                <?php
                  if(isset($OP)){
                    switch($OP){
                      case "MAL":
                        ?>
                          <div class="alert alert-danger" role="alert">
                            Complete todos los campos.
                          </div>
                        <?php
                        break;
                      
                      case "REPETIDO":
                          ?>
                            <div class="alert alert-danger" role="alert">
                            Usuario o Email ya se encuentran utilizados.
                            </div>
                          <?php
                          break;
                    }

                  }
                ?>
                <form class="col-12"  method="post">
                    <br>
                    <div class="form-group" id="user-group">
                        <input for="usuario" type="text" class="form-control" placeholder="Nombre de usuario" name="nombre"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input for="password" type="password" class="form-control" placeholder="Contrasena" name="password"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input for="confirmacion" type="password" class="form-control" placeholder="Repetir Contrasena" name="confirmacion"/>
                    </div>
                    <div class="form-group" id="user-group">
                        <input for="email"  type="email" class="form-control" placeholder="Email" name="email"/>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="ingresar"> <i class="fas fa-sign-in-alt"></i>  Crear Usuario </button>
                </form>

                <div class="col-12 forgot">
                    <a href="<?php echo site_url("auth/login"); ?>">Cancelar</a>
                </div>

            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>