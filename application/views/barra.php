<nav class="navbar navbar-expand navbar-light bg-dark ">
  <a class="navbar-brand text-white" href="<?php echo site_url("App/inversiones"); ?>"><i class="bi bi-cash-coin "></i></i> Mis Inversiones</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white " href="<?php echo site_url("home"); ?>"><i class="bi bi-house"></i> Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-person-lines-fill"></i> <?php echo $usuario_logueado; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?php echo site_url("App/inversiones"); ?>">Mis Inversiones</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url("App/nuevainversion"); ?>">Iniciar Nueva Inversion</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url("App/calculadora1"); ?>">Calculadora</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url("App/porqueinvertir"); ?>">¿Por qué Invertir?</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url("auth/cambiarpass"); ?>">Cambiar Contraseña</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item "  href="<?php echo site_url("auth/salir"); ?>">Salir Cuenta</a>
        </div>
      </li>

    </ul>
  </div>
</nav>