<!doctype html>
<html lang="es">
<head>
    <title>LogIn</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css" th:href="@{/css/login.css}">
<style>
    body{
    background: url(https://www.bankmagazine.com.ar/wp-content/uploads/2018/09/inversiones5.jpg) no-repeat center center fixed;
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
    color:white;
}

</style>



</head>
  <body>
  
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
        
            <div class="modal-content">
                <div class="col-12 user-img">
                <img src="<?php echo base_url("assets/img/avatar.png"); ?>" th:src="@{/assets/img/user.png}" >
                </div>
                <h2  >Iniciar Sesión</h2>
               
                <br>
                <form class="col-12"  method="post">
                    <br>
                    <div class="form-group" id="user-group">
                        <input for="usuario" type="text" class="form-control" placeholder="Nombre de usuario" name="usuario"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input for ="password" type="password" class="form-control" placeholder="Contrasena" name="password"/>
                    </div>
                    <?php echo validation_errors(); ?>
                    <?php
              if(isset($OP)){
                switch($OP){
                  case "MAL":
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Complete los datos del fomulario
                  </div>
                    <?php
                    break;

                  case "INCORRECTO":
                    ?>
                      <div class="alert alert-danger" role="alert">
                      Usuario o Password Incorrecta
                      </div>
                    <?php
                    break;
                }
              }
              ?>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>
                </form>
                <div class="col-12 forgot">
                    <a href="<?php echo site_url("auth/usuarionuevo"); ?>">Registrarse</a>
                </div>

            </div>
        </div>
    </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>