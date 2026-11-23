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
    <script type="module" src="http://localhost:5173/resources/css/dash.css"></script>
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
                            <h2 class="lista-titulo">Notificaciones</h2>
                            <p class="lista-descripcion">
                                Avisos y Advertencias por retardos
                            </p>
                        </div>

                        <!-- 2.QUITAR EL NAV, SUS LISTAS NO LAS OCUPARÁN -->
                        <nav class="lista-categorias" aria-label="Tipo de notificacion">
                            <button type="button"
                                    class="categoria-lista categoria-activa" data-tabla="tabla-avisos">
                                AVISOS
                                <span class="categoria-contador">42</span>
                            </button>

                            <button type="button" class="categoria-lista" data-tabla="tabla-advertencias">
                                ADVERTENCIAS
                                <span class="categoria-contador">5</span>
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
                                    placeholder="Buscar por empleado, No. Empleado..."
                                    aria-label="Buscar por..">
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
                                        Filtrar notificación
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
                                            <label for="filtro-fecha">Fecha</label>
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

                        <!-- <button type="button" class="boton-agregar-registro">
                            <svg viewBox="0 0 24 24"
                                 aria-hidden="true"
                                 class="icono-agregar">
                                <path d="M12 5v14M5 12h14"></path>
                            </svg>

                            <span>Agregar usuario</span>
                        </button> -->

                    </div>
                    <!-- Tabla de empleados -->
                    <div class="lista-tabla-contenedor" id="tabla-avisos">
                        <table class="lista-tabla">
                            <thead>
                                <tr>
                                    <!-- 4. AJUSTAR A LOS CAMPOS QUE LLEVEN SUS LISTAS -->
                                    <th scope="col">Fecha</th>
                                    <th scope="col">No. Empleado</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Retardos</th>
                                    <th scope="col">Atendido por</th>
                                    <th scope="col">Fecha de resolución</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col" class="columna-acciones">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <!-- 5. AJUSTAR DATOS DE DEMOSTRACIÓN -->
                                    <td>10/10/2010</td>
                                    <td class="dato-identificador">00000001</td>
                                    <td class="dato-nombre">Gaspar Antunes</td>
                                    <td>6</td>
                                    <td class="dato-fecha">Ramón Valdez</td>
                                    <td>...</td>
                                    <td>
                                        <span class="estado-registro estado-inactivo">
                                            <span class="estado-indicador"></span>
                                            Pendiente
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-notificar">Marcar Resuelto</button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <!-- 5. AJUSTAR DATOS DE DEMOSTRACIÓN -->
                                    <td>10/10/2010</td>
                                    <td class="dato-identificador">00000001</td>
                                    <td class="dato-nombre">Gaspar Antunes</td>
                                    <td>6</td>
                                    <td class="dato-fecha">Ramón Valdez</td>
                                    <td>...</td>
                                    <td>
                                        <span class="estado-registro estado-inactivo">
                                            <span class="estado-indicador"></span>
                                            Pendiente
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-notificar">Marcar Resuelto</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- 5. AJUSTAR DATOS DE DEMOSTRACIÓN -->
                                    <td>10/10/2010</td>
                                    <td class="dato-identificador">00000001</td>
                                    <td class="dato-nombre">Gaspar Antunes</td>
                                    <td>6</td>
                                    <td class="dato-fecha">Ramón Valdez</td>
                                    <td>...</td>
                                    <td>
                                        <span class="estado-registro estado-inactivo">
                                            <span class="estado-indicador"></span>
                                            Pendiente
                                        </span>
                                    </td>
                                    <td class="celda-acciones">
                                        <div class="acciones-lista">
                                            <button type="button" class="boton-notificar">Marcar Resuelto</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabla de administradores -->
                    <div class="lista-tabla-contenedor" id="tabla-advertencias" hidden>
                        <table class="lista-tabla">
                            <thead>
                                <tr>
                                    <!-- 4. AJUSTAR A LOS CAMPOS QUE LLEVEN SUS LISTAS -->
                                    <th scope="col">Fecha</th>
                                    <th scope="col">No. Empleado</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Mensaje</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <!-- 5. AJUSTAR DATOS DE DEMOSTRACIÓN -->
                                    <td>10/10/2010</td>
                                    <td class="dato-identificador">00000001</td>
                                    <td class="dato-nombre">Gaspar Antunes</td>
                                    <td class="dato-mensaje mensaje-aviso">ADVERTENCIA: Alcanzó el limite de retardos permitidos (5)</td>
                                </tr>

                                <tr>
                                    <!-- 5. AJUSTAR DATOS DE DEMOSTRACIÓN -->
                                    <td>10/10/2010</td>
                                    <td class="dato-identificador">00000001</td>
                                    <td class="dato-nombre">Gaspar Antunes</td>
                                    <td class="dato-mensaje mensaje-aviso">ADVERTENCIA: Alcanzó el limite de retardos permitidos (5)</td>
                                </tr>
                                                                <tr>
                                    <!-- 5. AJUSTAR DATOS DE DEMOSTRACIÓN -->
                                    <td>10/10/2010</td>
                                    <td class="dato-identificador">00000001</td>
                                    <td class="dato-nombre">Gaspar Antunes</td>
                                    <td class="dato-mensaje mensaje-aviso">ADVERTENCIA: Alcanzó el limite de retardos permitidos (5)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

            </section>

        </div>
      </main>
    </div>

</body>
<script src="../../resources/js/lista_notificaciones.js"></script>
</html>