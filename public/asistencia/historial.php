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

    <div class="app-layout">

      <?php
      include('../complementos/sidebar.php');
      include('../complementos/header.php')
      ?>

      <main class="app-main-container">
        <div class="card-listas"> 

            <div class="lista-titulos">
                <h2 class="lista-titulo">Historial de Asistencia</h2>
                <p class="lista-descripcion">Consulta y filtra los registros de entrada, salida y retardos del personal.</p>
            </div>

            <div style="display: flex; align-items: center; justify-content: flex-end; gap: 0.5rem; margin-bottom: 1rem;">
                <label class="lista-busqueda">
                    <svg viewBox="0 0 24 24"
                         aria-hidden="true"
                         class="icono-busqueda">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m16 16 4 4"></path>
                    </svg>
                    <input type="search" name="buscar" placeholder="Buscar..." aria-label="Buscar">
                </label>

                <summary class="boton-filtros" aria-label="Mostrar u ocultar filtros" title="Filtros adicionales">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="icono-filtro">
                        <path d="M4 5h16l-6.5 7.5V19l-3 1v-7.5L4 5Z"></path>
                    </svg>
                </summary>
            </div>

            <div class="lista-tabla-contenedor">
                <table class="lista-tabla">
                    <thead>
                      <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">No. Empleado</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Depto</th>
                        <th scope="col">Entrada</th>
                        <th scope="col">Salida</th>
                        <th scope="col">Est. Entrada</th>
                        <th scope="col">Est. Salida</th>
                        <th scope="col">Retardos</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>06/11/2026</td>
                            <td class="dato-identificador">000001</td>
                            <td class="dato-nombre">Juan Pérez</td>
                            <td>Tecnología</td>
                            <td>08:00 AM</td>
                            <td>05:00 PM</td>
                            <td>A tiempo</td>
                            <td>Horas completas</td>
                            <td>0</td>
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
                            <td>06/11/2026</td>
                            <td class="dato-identificador">000002</td>
                            <td class="dato-nombre">María López</td>
                            <td>RRHH</td>
                            <td>08:15 AM</td>
                            <td>06:00 PM</td>
                            <td>Retardo</td>
                            <td>Horas extras</td>
                            <td>1</td>
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
                            <td>06/11/2026</td>
                            <td class="dato-identificador">000003</td>
                            <td class="dato-nombre">Carlos Gómez</td>
                            <td>Ventas</td>
                            <td>08:00 AM</td>
                            <td>05:00 PM</td>
                            <td>A tiempo</td>
                            <td>Horas completas</td>
                            <td>0</td>
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
                    </tbody>
                </table>
            </div>
       
          
        </div>
      </main>

    </div>

</body>
<script src="../../resources/js/lista_usuarios.js"></script>
</html>