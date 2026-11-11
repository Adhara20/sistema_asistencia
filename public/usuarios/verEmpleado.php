<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia</title>
    <!-- CSS cargado dinámicamente desde Vite -->
    <script type="module" src="http://localhost:5173/resources/css/app.css"></script>
    <script type="module" src="http://localhost:5173/resources/css/sidebar.css"></script>
    <script type="module" src="http://localhost:5173/resources/css/listas.css"></script>
    <script type="module" src="http://localhost:5173/resources/css/perfil.css"></script>
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
        <div class="card-listas">

<!-- Módulo de perfil de usuario -->
            <section class="modulo-perfil">

                <a href="" class="perfil-volver">← Volver al dashboard</a>

                <!-- Encabezado del perfil -->
                <div class="perfil-encabezado">

                    <div class="perfil-identidad">
                        <!-- 1. INICIALES, NOMBRE, PUESTO Y ROL DEL USUARIO -->
                        <div class="perfil-avatar">GA</div>
                        <div>
                            <h2 class="perfil-nombre">Gaspar Antunes</h2>
                            <p class="perfil-subtitulo">Gerente de RH · Administrador</p>
                            <span class="estado-registro estado-activo">
                                <span class="estado-indicador"></span>
                                Activo
                            </span>
                        </div>
                    </div>

                </div>

                <!-- Información del usuario -->
                <h3 class="perfil-seccion-titulo">Información del usuario</h3>

                <!-- 3. AJUSTAR A LOS CAMPOS QUE LLEVE EL PERFIL -->
                <div class="perfil-datos">
                    <div class="perfil-dato">
                        <p class="perfil-dato-etiqueta">No. Empleado</p>
                        <p class="perfil-dato-valor">ADM-001</p>
                    </div>
                    <div class="perfil-dato">
                        <p class="perfil-dato-etiqueta">Nombres</p>
                        <p class="perfil-dato-valor">Gaspar</p>
                    </div>
                    <div class="perfil-dato">
                        <p class="perfil-dato-etiqueta">Apellidos</p>
                        <p class="perfil-dato-valor">Antunes</p>
                    </div>
                    <div class="perfil-dato">
                        <p class="perfil-dato-etiqueta">Correo electrónico</p>
                        <p class="perfil-dato-valor">gaspar@empresa.mx</p>
                    </div>
                    <div class="perfil-dato">
                        <p class="perfil-dato-etiqueta">Puesto</p>
                        <p class="perfil-dato-valor">Gerente de RH</p>
                    </div>
                    <div class="perfil-dato">
                        <p class="perfil-dato-etiqueta">Departamento</p>
                        <p class="perfil-dato-valor">Recursos Humanos</p>
                    </div>
                    <div class="perfil-dato">
                        <p class="perfil-dato-etiqueta">Rol</p>
                        <p class="perfil-dato-valor">Administrador</p>
                    </div>
                    <div class="perfil-dato">
                        <p class="perfil-dato-etiqueta">Fecha de alta</p>
                        <p class="perfil-dato-valor">2025-08-18</p>
                    </div>
                </div>

            </section>

        </div>
      </main>
    </div>

</body>
</html>