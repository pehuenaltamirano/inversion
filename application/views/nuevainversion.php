<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Nueva Inversion </title>
    <style>
body{
    background: url(<?php echo base_url("assets/img/fondo2.jpg");?>) no-repeat center center fixed;
    background-size: cover;
    }
</style>
  </head>
  <header>
      <?php $this->load->view("barra");?>
    </header>
<body class="bg-light text-dark">
    <div class="container">
      <div class="row offset-md-3">
        <div class="col-md-8">
          <br>
          <center>
          
          <h1 >  Ingrese nueva inversion</h1></center>
          <br>
              <form method="post">
                <div class="form-group">
             
                  <input type="text" class="form-control text-dark text-center " placeholder="CONCEPTO" name="concepto">
                </div>
                <div class="form-group">
                  <input type="number" placeholder="INVERSION INICIAL" class="form-control text-center text-dark " min="1" step="any" name="monto" >
                </div>
                <center>
                <button type="submit" class="btn btn-dark">Ingresar nueva inversion</button>
                </center>
              </form>

        </div>

      </div>
      
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>

</html>