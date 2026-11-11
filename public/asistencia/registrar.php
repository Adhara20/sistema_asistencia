<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia</title>
    <!-- CSS cargado dinámicamente desde Vite -->
    <script type="module" src="http://localhost:5173/resources/css/app.css"></script>
    <script type="module" src="http://localhost:5173/resources/css/sidebar.css"></script>
    <script type="module" src="http://localhost:5173/resources/css/form.css"></script>
</head>
<body>

    <!-- Layout principal que divide el Sidebar y el contenido -->
    <div class="app-layout">

    <!-- Incluir Sidebar y Header -->
      <?php
      include('../complementos/sidebar.php');
      include('../complementos/header.php')
      ?>

      <!-- MAIN (El cuadro azul muy claro para el contenido principal) -->
      <main class="app-main-container">
        
        <!-- Tarjeta blanca central de formulario o lista-->
        <div class="card-formulario"> 

            <div class="flex flex-col items-center w-full px-4 py-6 sm:py-8">
              <h2 class="text-title font-bold text-primary text-center mb-1">Registrar</h2>
              <p class="text-description text-gris text-center mb-5">Entrada - Salida</p>
            
              <div class="w-full max-w-[260px] sm:max-w-xs flex flex-col gap-3.5">
                <div class="w-full">
                  <label class="block text-label font-medium text-gris mb-1 text-left">No. de Empleado</label>
                  <input type="number" class="text-input input-lg w-full" placeholder="Ingrese No. de Empleado...">
                </div>
            
                <div class="w-full flex justify-center mt-5">
                  <button type="submit" class="btn-registrar">Registrar</button>
                </div>
              </div>
            </div>

        </div>
      </main>   

    </div>

</body>

<script src="../../resources/js/lista_usuarios.js"></script>

</html>