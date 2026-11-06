<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia</title>
    <!-- CSS cargado dinámicamente desde Vite -->
    <script type="module" src="http://localhost:5173/resources/css/app.css"></script>
    <script type="module" src="http://localhost:5173/resources/css/sidebar.css"></script>
</head>
<body>

    <!-- Layout principal que divide el Sidebar y el contenido -->
    <div class="app-layout">

    <!-- Incluir Sidebar y Header -->
      <?php
      include('sidebar.php');
      include('header.php')
      ?>

      <!-- MAIN (El cuadro azul muy claro para el contenido principal) -->
      <main class="app-main-container">
        
        <!-- Tarjeta blanca central de formulario o lista-->
        <div class="card-formulario"> <!-- ///Ajustar la clase a card-listas o card-formulario///--> 

<!-- **LO UNICO QUE SE VA A CAMBIAR ES DE AQUÍ: **-->
        
          <h2 class="text-title font-bold text-primary text-center mb-1">Registrar Usuario</h2>
          <p class="text-description text-gris text-center mb-6">Formulario de Registro de Usuarios</p>
          
          <div class="grid grid-cols-2 gap-4">
            <div> 
              <label class="block text-label font-medium text-gris mb-1">Nombres</label>
              <input type="text" class="text-input input-lg" placeholder="Ingresa nombres...">
            </div>
            <div>
              <label class="block text-label font-medium text-gris mb-1">Apellidos</label>
              <input type="text" class="text-input input-lg" placeholder="Ingresa apellidos...">
            </div>
          </div>
          
<!--** HASTA AQUÍ **-->

        </div>
      </main>

    </div>

</body>
</html>