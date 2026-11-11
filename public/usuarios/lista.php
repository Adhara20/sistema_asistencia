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


<!-- Módulo de listas de usuarios -->
            <section class="modulo-listas">

                    <!-- Encabezado y categorías -->
                    <div class="lista-encabezado">

                        <div class="lista-titulos">
                            <!-- 1.CAMBIAR TITULO Y DESCRIPCIÓN -->
                            <h2 class="lista-titulo">Usuarios</h2>
                            <p class="lista-descripcion">
                                Usuarios registrados en el sistema
                            </p>
                        </div>

                        <!-- 2.QUITAR EL NAV, SUS LISTAS NO LAS OCUPARÁN -->
                        <nav class="usuarios-categorias" aria-label="Tipo de usuario">
                            <button type="button"
                                    class="categoria-usuario categoria-activa" data-tabla="tabla-empleados">
                                Empleados
                                <span class="categoria-contador">42</span>
                            </button>

                            <button type="button" class="categoria-usuario" data-tabla="tabla-admins">
                                Administradores
                                <span class="categoria-contador">5</span>
                            </button>

                            <button type="button" class="categoria-usuario" data-tabla="tabla-registradoras">
                                Registradoras
                                <span class="categoria-contador">3</span>
                            </button>
                        </nav>

                    </div>

                    <!-- Barra de búsqueda, filtros y acción principal -->
                    <div class="lista-barra-acciones">

                        <div class="lista-controles">

                            <!-- Búsqueda rápida -->
                            <label class="lista-busqueda">
                                <svg viewBox="0 0 24 24"
                                     aria-hidden="true"
                                     class="icono-busqueda">
                                    <circle cx="11" cy="11" r="7"></circle>
                                    <path d="m16 16 4 4"></path>
                                </svg>

                                <!-- 3. CAMBIAR LO QUE DIGA USUARIOS -->
                                <input
                                    type="search"
                                    name="buscar_usuario"
                                    placeholder="Buscar usuarios..."
                                    aria-label="Buscar usuarios">
                            </label>

                            <!-- Panel desplegable de filtros -->
                            <details class="filtros-desplegables">

                                <summary
                                    class="boton-filtros"
                                    aria-label="Mostrar u ocultar filtros"
                                    title="Filtros adicionales">

                                    <svg viewBox="0 0 24 24"
                                         aria-hidden="true"
                                         class="icono-filtro">
                                        <path d="M4 5h16l-6.5 7.5V19l-3 1v-7.5L4 5Z"></path>
                                    </svg>

                                </summary>

                                <div class="panel-filtros">
                                    <h3 class="filtros-titulo">
                                        Filtrar usuarios
                                    </h3>

                                    <div class="filtros-campos">

                                        <div class="campo-filtro">
                                            <label for="filtro-estado">Estado</label>
                                            <select id="filtro-estado"
                                                    name="estado"
                                                    class="control-filtro">
                                                <option value="">Todos los estados</option>
                                                <option value="activo">Activo</option>
                                                <option value="inactivo">Inactivo</option>
                                            </select>
                                        </div>

                                        <div class="campo-filtro">
                                            <label for="filtro-fecha">Fecha de alta</label>
                                            <select id="filtro-fecha"
                                                    name="fecha_alta"
                                                    class="control-filtro">
                                                <option value="">Todas las fechas</option>
                                                <option value="mes">Último mes</option>
                                                <option value="tres-meses">Últimos 3 meses</option>
                                                <option value="anio">Último año</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="filtros-acciones">
                                        <button type="button" class="boton-limpiar-filtros">
                                            Limpiar
                                        </button>

                                        <button type="button" class="boton-aplicar-filtros">
                                            Aplicar filtros
                                        </button>
                                    </div>
                                </div>

                            </details>

                        </div>

                        <button type="button" class="boton-agregar-registro">
                            <svg viewBox="0 0 24 24"
                                 aria-hidden="true"
                                 class="icono-agregar">
                                <path d="M12 5v14M5 12h14"></path>
                            </svg>

                            <span>Agregar usuario</span>
                        </button>

                    </div>
                    <!-- Tabla de empleados -->
                    <div class="lista-tabla-contenedor" id="tabla-empleados">
                        <table class="lista-tabla">
                            <thead>
                                <tr>
                                    <!-- 4. AJUSTAR A LOS CAMPOS QUE LLEVEN SUS LISTAS -->
                                    <th scope="col">No. Empleado</th>
                                    <th scope="col">Nombre completo</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Puesto</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col" class="columna-acciones">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <!-- 5. AJUSTAR DATOS DE DEMOSTRACIÓN -->
                                    <td class="dato-identificador">00000001</td>
                                    <td class="dato-nombre">Gaspar Antunes</td>
                                    <td>RRHH</td>
                                    <td>Analista de personal</td>
                                    <td>
                                        <span class="estado-registro estado-activo">
                                            <span class="estado-indicador"></span>
                                            Activo
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-icono boton-editar"
                                                    aria-label="Editar empleado Gaspar Antunes"
                                                    title="Editar empleado">
                                                <!-- Icono de edición -->
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L9 17l-4 1 1-4Z"></path>
                                                </svg>
                                            </button>

                                            <button type="button" class="boton-icono boton-eliminar"
                                                    aria-label="Eliminar empleado Gaspar Antunes"
                                                    title="Eliminar empleado">
                                                <!-- Icono de eliminación -->
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="dato-identificador">00000002</td>
                                    <td class="dato-nombre">Trienke van Aartsen</td>
                                    <td>Contabilidad</td>
                                    <td>Auxiliar contable</td>
                                    <td>
                                        <span class="estado-registro estado-activo">
                                            <span class="estado-indicador"></span>
                                            Activo
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-icono boton-editar"
                                                    aria-label="Editar empleado Trienke van Aartsen"
                                                    title="Editar empleado">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L9 17l-4 1 1-4Z"></path>
                                                </svg>
                                            </button>

                                            <button type="button" class="boton-icono boton-eliminar"
                                                    aria-label="Eliminar empleado Trienke van Aartsen"
                                                    title="Eliminar empleado">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="dato-identificador">00000003</td>
                                    <td class="dato-nombre">Trashae Hubbard</td>
                                    <td>Operaciones</td>
                                    <td>Coordinadora</td>
                                    <td>
                                        <span class="estado-registro estado-inactivo">
                                            <span class="estado-indicador"></span>
                                            Inactivo
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-icono boton-editar"
                                                    aria-label="Editar empleado Trashae Hubbard"
                                                    title="Editar empleado">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L9 17l-4 1 1-4Z"></path>
                                                </svg>
                                            </button>

                                            <button type="button" class="boton-icono boton-eliminar"
                                                    aria-label="Eliminar empleado Trashae Hubbard"
                                                    title="Eliminar empleado">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabla de administradores -->
                    <div class="lista-tabla-contenedor" id="tabla-admins" hidden>
                        <table class="lista-tabla">
                            <thead>
                                <tr>
                                    <th scope="col">ID administrador</th>
                                    <th scope="col">Nombre completo</th>
                                    <th scope="col">Correo electrónico</th>
                                    <th scope="col">Puesto</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col" class="columna-acciones">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="dato-identificador">ADM-001</td>
                                    <td class="dato-nombre">Gaspar Antunes</td>
                                    <td>gaspar@empresa.mx</td>
                                    <td>Administrador general</td>
                                    <td>
                                        <span class="estado-registro estado-activo">
                                            <span class="estado-indicador"></span>
                                            Activo
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-icono boton-editar"
                                                    aria-label="Editar administrador Gaspar Antunes"
                                                    title="Editar administrador">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L9 17l-4 1 1-4Z"></path>
                                                </svg>
                                            </button>

                                            <button type="button" class="boton-icono boton-eliminar"
                                                    aria-label="Eliminar administrador Gaspar Antunes"
                                                    title="Eliminar administrador">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="dato-identificador">ADM-002</td>
                                    <td class="dato-nombre">Trienke van Aartsen</td>
                                    <td>trienke@empresa.mx</td>
                                    <td>Supervisora</td>
                                    <td>
                                        <span class="estado-registro estado-activo">
                                            <span class="estado-indicador"></span>
                                            Activo
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-icono boton-editar"
                                                    aria-label="Editar administradora Trienke van Aartsen"
                                                    title="Editar administradora">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L9 17l-4 1 1-4Z"></path>
                                                </svg>
                                            </button>

                                            <button type="button" class="boton-icono boton-eliminar"
                                                    aria-label="Eliminar administradora Trienke van Aartsen"
                                                    title="Eliminar administradora">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="dato-identificador">ADM-003</td>
                                    <td class="dato-nombre">Trashae Hubbard</td>
                                    <td>trashae@empresa.mx</td>
                                    <td>Administradora de área</td>
                                    <td>
                                        <span class="estado-registro estado-inactivo">
                                            <span class="estado-indicador"></span>
                                            Inactivo
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-icono boton-editar"
                                                    aria-label="Editar administradora Trashae Hubbard"
                                                    title="Editar administradora">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L9 17l-4 1 1-4Z"></path>
                                                </svg>
                                            </button>

                                            <button type="button" class="boton-icono boton-eliminar"
                                                    aria-label="Eliminar administradora Trashae Hubbard"
                                                    title="Eliminar administradora">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabla de registradoras -->
                    <div class="lista-tabla-contenedor" id="tabla-registradoras" hidden>
                        <table class="lista-tabla">
                            <thead>
                                <tr>
                                    <th scope="col">ID registradora</th>
                                    <th scope="col">Nombre del dispositivo</th>
                                    <th scope="col">Ubicación</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col" class="columna-acciones">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="dato-identificador">REG-001</td>
                                    <td class="dato-nombre">Registradora principal</td>
                                    <td>Entrada principal</td>
                                    <td>
                                        <span class="estado-registro estado-activo">
                                            <span class="estado-indicador"></span>
                                            Activa
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-icono boton-editar"
                                                    aria-label="Editar registradora principal"
                                                    title="Editar registradora">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L9 17l-4 1 1-4Z"></path>
                                                </svg>
                                            </button>

                                            <button type="button" class="boton-icono boton-eliminar"
                                                    aria-label="Eliminar registradora principal"
                                                    title="Eliminar registradora">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="dato-identificador">REG-002</td>
                                    <td class="dato-nombre">Registradora de almacén</td>
                                    <td>Almacén</td>
                                    <td>
                                        <span class="estado-registro estado-activo">
                                            <span class="estado-indicador"></span>
                                            Activa
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-icono boton-editar"
                                                    aria-label="Editar registradora de almacén"
                                                    title="Editar registradora">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L9 17l-4 1 1-4Z"></path>
                                                </svg>
                                            </button>

                                            <button type="button" class="boton-icono boton-eliminar"
                                                    aria-label="Eliminar registradora de almacén"
                                                    title="Eliminar registradora">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="dato-identificador">REG-003</td>
                                    <td class="dato-nombre">Registradora secundaria</td>
                                    <td>Recepción</td>
                                    <td>
                                        <span class="estado-registro estado-inactivo">
                                            <span class="estado-indicador"></span>
                                            Inactiva
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-icono boton-editar"
                                                    aria-label="Editar registradora secundaria"
                                                    title="Editar registradora">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L9 17l-4 1 1-4Z"></path>
                                                </svg>
                                            </button>

                                            <button type="button" class="boton-icono boton-eliminar"
                                                    aria-label="Eliminar registradora secundaria"
                                                    title="Eliminar registradora">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

            </section>

        </div>
      </main>
    </div>

</body>
<script src="../../resources/js/lista_usuarios.js"></script>
</html>