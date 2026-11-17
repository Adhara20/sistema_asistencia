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
            <form action="">
            <div class="flex flex-col items-center w-full px-4 py-6 sm:py-8">
              <h2 class="text-title font-bold text-primary text-center mb-1">Actualizar Contraseña</h2>
              <p class="text-description text-gris text-center mb-6">Ingresa tu contraseña actual y define una nueva.</p>
            
              <div class="w-full max-w-[260px] sm:max-w-xs flex flex-col gap-3.5">

                <div class="w-full">
                  <label class="block text-label font-medium text-gris mb-3 text-left">Contraseña Actual</label>
                  <input type="password" class="text-input input-lg w-full mb-4" placeholder="Ingrese contraseña actual..." required>
                </div>
                <div class="w-full">
                  <label class="block text-label font-medium text-gris mb-1 text-left">Nueva Contraseña</label>
                  <input type="password" class="text-input input-lg w-full mb-3" placeholder="Ingrese nueva contraseña..." required>
                </div>
            
                <div class="w-full flex justify-center mt-5">
                  <button type="submit" class="btn-registrar">Actualizar</button>
                </div>
              </div>
            </div>
            </form>

        </div>
      </main>   

    </div>

</body>

<script src="../../resources/js/lista_usuarios.js"></script>

</html>