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
                        <h2 class="lista-titulo">Configuracion</h2>
                        <p class="lista-descripcion">
                            Configuracion de horarios y semestres
                        </p>
                    </div>

                </div>

                <!-- Barra de búsqueda, filtros y acción principal -->
                <div class="lista-barra-acciones">

                    <div class="lista-controles">

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
                                    Filtrar semestres
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

                        <span>Agregar semestre</span>
                    </button>

                </div>
                <!-- Tabla de semestres -->
                <div class="lista-tabla-contenedor" id="tabla-semestres">
                    <table class="lista-tabla">
                        <thead>
                            <tr>
                                <!-- 4. AJUSTAR A LOS CAMPOS QUE LLEVEN SUS LISTAS -->
                                <th scope="col">Semestre</th>
                                <th scope="col">Inicio</th>
                                <th scope="col">Cierre</th>
                                <th scope="col">Cerrado por</th>
                                <th scope="col">Estatus</th>
                                <th scope="col" class="columna-acciones">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <!-- 5. AJUSTAR DATOS DE DEMOSTRACIÓN -->
                                <td class="dato-identificador">2026-1</td>
                                <td class="dato-nombre">2026/01/01</td>
                                <td>2026/06/01</td>
                                <td>Adhara</td>
                                <td>
                                    <span class="estado-registro estado-activo">
                                        <span class="estado-indicador"></span>
                                        Completado
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
                                <!-- 5. AJUSTAR DATOS DE DEMOSTRACIÓN -->
                                <td class="dato-identificador">2026-2</td>
                                <td class="dato-nombre">2026/07/01</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <span class="estado-registro estado-inactivo">
                                        <span class="estado-indicador"></span>
                                        En curso
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

                        </tbody>
                    </table>
                </div>
                <div class="flex items-center gap-8 justify-center mt-4">
                    <button disabled class="rounded-md border border-slate-300 p-2.5 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    
                    <p class="text-slate-600">
                        Pagina <strong class="text-slate-800">1</strong> de&nbsp;<strong class="text-slate-800">1</strong>
                    </p>
                    
                    <button disabled class="rounded-md border border-slate-300 p-2.5 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </section>
            <hr class="border-gray-200 mt-4">
            <!-- Módulo de horario -->
            <section class="modulo-listas mt-8 px-64">

                <!-- Bloque 1 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="hora_entrada" class="block text-label font-medium text-gris mb-1">Hora de entrada</label>
                        <input type="time" id="nombres" name="nombres" class="text-input input-lg" placeholder="Ingresa nombres...">
                    </div>
                    <div>
                        <label for="hora_salida" class="block text-label font-medium text-gris mb-1">Hora de salida</label>
                        <input type="time" id="apellidos" name="apellidos" class="text-input input-lg" placeholder="Ingresa apellidos...">
                    </div>
                </div>
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="button" class="px-5 py-2.5 text-sm font-bold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 transition-all cursor-pointer">
                        Cancelar
                    </button>
                    
                    <button type="submit" class="px-6 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 transition-all cursor-pointer">
                        Aceptar
                    </button>
                </div>
            </section>
        </div>
      </main>
    </div>

</body>
<script src="../../resources/js/lista_usuarios.js"></script>
</html>