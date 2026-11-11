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
      include('../complementos/header.php');
      ?>

      <!-- MAIN (El cuadro azul muy claro para el contenido principal) -->
      <main class="app-main-container">

        <!-- Tarjeta 1: perfil del empleado -->
        <div class="card-listas">

<!-- Módulo de perfil de empleado -->
            <section class="modulo-perfil">

                <a href="../usuarios/lista_usuarios.php" class="perfil-volver">← Volver a la lista</a>

                <!-- Encabezado del perfil -->
                <div class="perfil-encabezado">

                    <div class="perfil-identidad">
                        <!-- 1. INICIALES, NOMBRE, PUESTO Y DEPARTAMENTO DEL EMPLEADO -->
                        <div class="perfil-avatar">GA</div>
                        <div>
                            <h2 class="perfil-nombre">Gaspar Antunes</h2>
                            <p class="perfil-subtitulo">Analista de personal · Ventas</p>
                            <span class="estado-registro estado-activo">
                                <span class="estado-indicador"></span>
                                Activo
                            </span>
                        </div>
                    </div>

                    <!-- 2. ACCIONES (Editar perfil, Dar de baja) -->
                    <div class="perfil-acciones">
                        <button type="button" class="boton-peligro">Dar de baja</button>
                        <button type="button" class="boton-agregar-registro">Editar perfil</button>
                    </div>

                </div>

                <!-- Información del empleado -->
                <h3 class="perfil-seccion-titulo">Información del empleado</h3>

                <!-- 3. AJUSTAR A LOS CAMPOS QUE LLEVE EL PERFIL -->
                <div class="perfil-datos">
                    <div class="perfil-dato">
                        <p class="perfil-dato-etiqueta">No. Empleado</p>
                        <p class="perfil-dato-valor">EMP-001</p>
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
                        <p class="perfil-dato-valor">Analista de personal</p>
                    </div>
                    <div class="perfil-dato">
                        <p class="perfil-dato-etiqueta">Departamento</p>
                        <p class="perfil-dato-valor">Ventas</p>
                    </div>
                </div>

                <!-- 4. CONTADORES: cambiar la clase de nivel según la cantidad
                        nivel-verde (0) | nivel-amarillo (menos de 5) | nivel-naranja (5) | nivel-rojo (más de 5)
                        y ajustar --progreso (cantidad / 5 x 100) -->
                <div class="perfil-contadores">

                    <div class="contador-card nivel-amarillo">
                        <p class="contador-titulo">Retardos (semestre actual)</p>
                        <p class="contador-valor">3 <span class="contador-total">de 5</span></p>
                        <div class="contador-barra" style="--progreso: 60%"></div>
                        <p class="contador-estado">En seguimiento</p>
                    </div>

                    <div class="contador-card nivel-amarillo">
                        <p class="contador-titulo">Advertencias</p>
                        <p class="contador-valor">1 <span class="contador-total">de 5</span></p>
                        <div class="contador-barra" style="--progreso: 20%"></div>
                        <p class="contador-estado">En seguimiento</p>
                    </div>

                </div>

            </section>

        </div>

        <!-- Tarjeta 2: historial de asistencia del empleado -->
        <div class="card-listas">

<!-- Módulo de historial individual -->
            <section class="modulo-listas">

                <!-- Encabezado -->
                <div class="lista-encabezado">
                    <div class="lista-titulos">
                        <h2 class="lista-titulo">Historial de asistencia</h2>
                        <p class="lista-descripcion">
                            Entradas, salidas y retardos de Gaspar Antunes
                        </p>
                    </div>
                </div>

                <!-- Barra de filtros (sin buscador: el historial ya es de un solo empleado) -->
                <div class="lista-barra-acciones">

                    <div class="lista-controles">

                        <details class="filtros-desplegables">

                            <summary
                                class="boton-filtros"
                                aria-label="Mostrar u ocultar filtros"
                                title="Filtros adicionales">

                                <svg viewBox="0 0 24 24" aria-hidden="true" class="icono-filtro">
                                    <path d="M4 5h16l-6.5 7.5V19l-3 1v-7.5L4 5Z"></path>
                                </svg>

                            </summary>

                            <div class="panel-filtros">
                                <h3 class="filtros-titulo">Filtrar historial</h3>

                                <div class="filtros-campos">

                                    <div class="campo-filtro">
                                        <label for="filtro-fecha">Fecha</label>
                                        <input type="date" id="filtro-fecha" name="fecha" class="control-filtro">
                                    </div>

                                    <div class="campo-filtro">
                                        <label for="filtro-entrada">Estatus de entrada</label>
                                        <select id="filtro-entrada" name="estatus_entrada" class="control-filtro">
                                            <option value="">Todos</option>
                                            <option value="a-tiempo">A tiempo</option>
                                            <option value="retardo">Retardo</option>
                                        </select>
                                    </div>

                                    <div class="campo-filtro">
                                        <label for="filtro-salida">Estatus de salida</label>
                                        <select id="filtro-salida" name="estatus_salida" class="control-filtro">
                                            <option value="">Todos</option>
                                            <option value="completas">Horas completas</option>
                                            <option value="incompletas">Horas incompletas</option>
                                            <option value="extras">Horas extras</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="filtros-acciones">
                                    <button type="button" class="boton-limpiar-filtros">Limpiar</button>
                                    <button type="button" class="boton-aplicar-filtros">Aplicar filtros</button>
                                </div>
                            </div>

                        </details>

                    </div>

                </div>

                <!-- Tabla del historial -->
                <div class="lista-tabla-contenedor">
                    <table class="lista-tabla">
                        <thead>
                            <tr>
                                <!-- 5. AJUSTAR A LOS CAMPOS DEL HISTORIAL -->
                                <th scope="col">Fecha</th>
                                <th scope="col">Entrada</th>
                                <th scope="col">Salida</th>
                                <th scope="col">Estatus entrada</th>
                                <th scope="col">Estatus salida</th>
                                <th scope="col">Retardos acumulados</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- 6. AJUSTAR DATOS DE DEMOSTRACIÓN -->
                            <tr>
                                <td class="dato-identificador">2026-11-05</td>
                                <td>07:52</td>
                                <td>—</td>
                                <td>
                                    <span class="estado-registro estado-activo">
                                        <span class="estado-indicador"></span>
                                        A tiempo
                                    </span>
                                </td>
                                <td>—</td>
                                <td>3</td>
                            </tr>

                            <tr>
                                <td class="dato-identificador">2026-11-04</td>
                                <td>08:21</td>
                                <td>17:05</td>
                                <td>
                                    <span class="estado-registro estado-inactivo">
                                        <span class="estado-indicador"></span>
                                        Retardo
                                    </span>
                                </td>
                                <td>
                                    <span class="estado-registro estado-activo">
                                        <span class="estado-indicador"></span>
                                        Horas completas
                                    </span>
                                </td>
                                <td>3</td>
                            </tr>

                            <tr>
                                <td class="dato-identificador">2026-11-03</td>
                                <td>07:58</td>
                                <td>19:10</td>
                                <td>
                                    <span class="estado-registro estado-activo">
                                        <span class="estado-indicador"></span>
                                        A tiempo
                                    </span>
                                </td>
                                <td>
                                    <span class="estado-registro estado-extra">
                                        <span class="estado-indicador"></span>
                                        Horas extras
                                    </span>
                                </td>
                                <td>2</td>
                            </tr>

                            <tr>
                                <td class="dato-identificador">2026-11-02</td>
                                <td>08:03</td>
                                <td>15:30</td>
                                <td>
                                    <span class="estado-registro estado-activo">
                                        <span class="estado-indicador"></span>
                                        A tiempo
                                    </span>
                                </td>
                                <td>
                                    <span class="estado-registro estado-inactivo">
                                        <span class="estado-indicador"></span>
                                        Horas incompletas
                                    </span>
                                </td>
                                <td>2</td>
                            </tr>

                            <tr>
                                <td class="dato-identificador">2026-10-30</td>
                                <td>08:35</td>
                                <td>17:00</td>
                                <td>
                                    <span class="estado-registro estado-inactivo">
                                        <span class="estado-indicador"></span>
                                        Retardo
                                    </span>
                                </td>
                                <td>
                                    <span class="estado-registro estado-activo">
                                        <span class="estado-indicador"></span>
                                        Horas completas
                                    </span>
                                </td>
                                <td>2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>

        </div>

      </main>
    </div>

</body>
<script src="../../resources/js/sidebar.js"></script>
</html>