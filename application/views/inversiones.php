<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <title>Mis Inversiones</title>

  </head>
  <header>
  <?php $this->load->view("barra");?>
  </header>
  <body >
      <br>
      <div>
    <center>
        <h1>Mis Inversiones</h1>
    </center>
      </div>

      <br><br>


            <?php if ($inversiones)  { 
            
            foreach ($inversiones as $i) { ?>
                
                <div class="container">
                            
                    <div class="row">
                        <div class="col-md-12 ">
                            
                        <h1 class="offset-md-3">Estado de inversion <?php echo $i["nombre"];?>: <a href="<?php echo site_url('App/borrarinv/'.$i['inversion_id']); ?>"><i class="bi bi-trash text-danger"></i></a></h1>
                        <br>
                            
                            <form class="form-inline offset-md-4" action="<?php echo site_url("App/inversiones/").$i["inversion_id"];?>" method="post" action="">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$

                                        </div>
                                    </div>
                                    <input type="text" placeholder="MONTO" class="form-control" id="monto" name="monto">
                            
                                </div>
                        
                    
                                <button type="submit" class="btn btn-dark mb-2">ACTUALIZAR</button>
                            </form>
                            <?php echo form_error("monto","<small class=\"text-danger\">","</small>")?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                        <br>
                            
                            <div class="table-responsive text-light offset-3 ">
                                
                                <table class="table table-bordered text-center">
                                    <tbody>
                                    <?php foreach($montos as $m){ 
                                    if ($m["inversion_id"]==$i["inversion_id"]) {?>
                                        <tr>
                                            <center>
                                            <td class="text-dark"><?php echo $m["fecha"];?> </td></center>
                                            <td class="text-dark">$<?php echo $m["monto"];?></td>
                                            <td class=" text-light">
                                            <?php if($m["diferencia"]){?>
                                                <?php echo $m["diferencia"];?>
                                                <?php if($m["diferencia"]<=0){?>
                                                    <i class="bi bi-caret-down-fill text-danger"></i>
                                                <?php  }else{ ?>
                                                    <i class="bi bi-caret-up-fill text-success"></i>
                                                <?php } ?>
                                            <?php } ?>
                                            </td>
                                            <td class="col-sm-1"><a href="<?php echo site_url("App/borrar/".$m["monto_id"]); ?>" class="text-danger"><i class="bi bi-x-circle"></i></a></td>
                                        </tr>
                                    <?php }} ?>
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ">
                            <center>
                            <h4>Total acumulado desde el principio <strong>$<?php echo $i["resultado"]; ?></strong></h4></center><br>
                        <hr class="bg-light">
                        <br>
                        </div>
                        
                    </div>
                </div>

            
                

            <?php   } } else { ?>
            <center>
            <div class="row">
                <div class="col">
                        <div>
                            NO TENES INVERSIONES HECHAS AUN
                    </div>
                </div>
            </div>
            </center>
        <?php   } ?>



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
    <?php $this->load->view("footer");?>
  </body>
</html>