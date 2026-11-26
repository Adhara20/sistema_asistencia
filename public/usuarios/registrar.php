<?php

session_start();

require_once dirname(__DIR__, 2) . '/app/models/Conexion.php';
require_once dirname(__DIR__, 2) . '/app/controllers/UsuariosController.php';

$conexion = new Conexion();
$conn = $conexion->conectar();

$controller = new UsuariosController($conn);
$departamentos = $controller->obtenerDepartamentos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['flash_mensaje'] = $controller->registrar($_POST);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$mensaje = $_SESSION['flash_mensaje'] ?? '';
unset($_SESSION['flash_mensaje']);

?>

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
        include('../complementos/sidebar.php');
        include('../complementos/header.php')
        ?>

        <!-- MAIN (El cuadro azul muy claro para el contenido principal) -->
        <main class="app-main-container">
            
            <!-- Tarjeta blanca central de formulario o lista-->
            <div class="card-formulario"> <!-- ///Ajustar la clase a card-listas o card-formulario///--> 

                <!-- **LO UNICO QUE SE VA A CAMBIAR ES DE AQUÍ: **-->
                
                <h2 class="text-title font-bold text-primary text-center mb-1">Registrar Usuario</h2>
                <p class="text-description text-gris text-center mb-6">Formulario de Registro de Usuarios</p>
                
                <div class="space-y-6">
                    <!-- Bloque 1 -->
                     <?php if ($mensaje !== ''): ?>
                        <div class="p-3 mb-4 rounded-lg border text-sm font-medium bg-blue-50 border-blue-200 text-blue-800">
                            <?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    <?php endif; ?>

                    <form id="formRegistroUsuario" action="" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nombres" class="block text-label font-medium text-gris mb-1">Nombres</label>
                            <input type="text" id="nombres" name="nombres" class="text-input input-lg" placeholder="Ingresa nombres..." required>
                        </div>
                        <div>
                            <label for="apellidos" class="block text-label font-medium text-gris mb-1">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" class="text-input input-lg" placeholder="Ingresa apellidos..." required>
                        </div>
                        <div>
                            <label for="departamento" class="block text-label font-medium text-gris mb-1">Departamento</label>
                            <select id="departamento" name="departamento" class="text-input input-lg" required>
                                <option value="" disabled selected hidden>Selecciona un departamento...</option>
                                <?php foreach ($departamentos as $dept): ?>
                                    <option value="<?= (int) $dept['id_departamento'] ?>">
                                        <?= htmlspecialchars($dept['departamento'], ENT_QUOTES, 'UTF-8') ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label for="puesto" class="block text-label font-medium text-gris mb-1">Puesto</label>
                            <input type="text" id="puesto" name="puesto" class="text-input input-lg" placeholder="Ingresa tu puesto..." required>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <!-- Bloque 2 -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="num_empleado" class="block text-label font-medium text-gris mb-1">Numero de empleado</label>
                            <input type="text" id="num_empleado" name="num_empleado" class="text-input input-lg" placeholder="Ingresa número de empleado..." required>
                        </div>
                        <div>
                            <label for="correo" class="block text-label font-medium text-gris mb-1">Correo electrónico</label>
                            <input type="email" id="correo" name="correo" class="text-input input-lg" placeholder="Ingresa tu correo electrónico..." required>
                        </div>
                        <div>
                            <label for="password" class="block text-label font-medium text-gris mb-1">Contraseña</label>
                            <input type="password" id="password" name="password" class="text-input input-lg" placeholder="Ingresa una contraseña..." required>
                        </div>
                    </div>
                    <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-4 border-t border-gray-200">
                        <button type="button" class="px-5 py-2.5 text-sm font-bold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 transition-all cursor-pointer">
                            Cancelar
                        </button>
                        
                        <button type="submit" class="px-6 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition-all cursor-pointer">
                            Registrar
                        </button>
                    </div>
                    </form>
                </div>
            
                <!--** HASTA AQUÍ **-->

            </div>
        </main>

    </div>

</body>
</html>