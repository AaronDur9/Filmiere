<?php

require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="<?= $app->resuelve('/css/general.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= $app->resuelve('/css/gestion.css') ?>">        
  <link rel="icon" type="image/x-icon" href="img/logotipo.png" />
  <script type="text/javascript" src="<?= $app->resuelve('/js/jquery-2.2.4.min.js') ?>"></script>
          <title>Cambiar precio butacas</title>


   <script>
   $(document).ready(function()
    {
      function get(name)
      {
         if(name = (new RegExp('[?&]' + encodeURIComponent(name) + '=([^&]*)')).exec(location.search))
          return decodeURIComponent(name[1]);
      }
      $seleccionado = document.getElementById('tipoButacas').value;
      $.get("includes/PrecioButaca.php?precio=" + $seleccionado, mostrarPrecioActual);
    
      $("#tipoButacas").change(function()
      {
         $seleccionado = document.getElementById('tipoButacas').value;
      $.get("includes/PrecioButaca.php?precio=" + $seleccionado, mostrarPrecioActual);
        
      });
      
      function mostrarPrecioActual(data, status)
      {
      
        document.getElementById("precioAnterior").innerHTML = data;
        
      }

     
    });

    </script>
  </head>
<body>
  <div class="contenedor">
      <?php if(\es\ucm\fdi\aw\Aplicacion::getSingleton()->usuarioLogueado()
        && \es\ucm\fdi\aw\Aplicacion::getSingleton()->rolUsuario() === "ADMIN"): ?>
      <div class="c_ag">
          <div class="c_gestion_ag">
            <div class="estilo_bloque_grande">
                <h2>PRECIOS BUTACAS</h2>
                <div class="estilo_centrado">
                     <?php $formCambiarPrecioButacas = new \es\ucm\fdi\aw\FormularioCambiarPrecioButacas();
                      $formCambiarPrecioButacas->gestiona(); ?>
                </div>
             </div>
            </div>
          <?php include 'into_menu_admin.php'; ?>
        </div>
    
      <?php else: ?>
        <div class="estilo_bloque">
          <h2>Acceso restringido.</h2>
        </div>
      <?php endif; ?>
        </div>
</body>
</html>