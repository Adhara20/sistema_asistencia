<?php
//DATOS DE EJEMPLO
$llegaronHoy = [
  ['nombre' => 'Ana López',     'hora' => '07:52', 'retardo' => false],
  ['nombre' => 'Carlos Ruiz',   'hora' => '08:03', 'retardo' => false],
  ['nombre' => 'María Pérez',   'hora' => '08:21', 'retardo' => true],
  ['nombre' => 'Jorge Herrera', 'hora' => '08:35', 'retardo' => true],
  ['nombre' => 'Lucía Torres',  'hora' => '07:58', 'retardo' => false],
];

$enRiesgo = [
  ['nombre' => 'Jorge Herrera', 'detalle' => '4 retardos este mes'],
  ['nombre' => 'Pedro Gómez',   'detalle' => '3 faltas este mes'],
];

$enDespido = [
  ['nombre' => 'Rafael Soto', 'detalle' => '6 faltas injustificadas'],
];

$asistenciaTotal = ['a_tiempo' => 182, 'retardos' => 23];

//CALCULOS
$totalHoy        = count($llegaronHoy);
$retardosHoy     = count(array_filter($llegaronHoy, fn($u) => $u['retardo']));
$aTiempoHoy      = $totalHoy - $retardosHoy;
$pctATiempoHoy   = $totalHoy ? round($aTiempoHoy / $totalHoy * 100) : 0;
$pctRetardosHoy  = $totalHoy ? round($retardosHoy / $totalHoy * 100) : 0;
$totalAsistencia = $asistenciaTotal['a_tiempo'] + $asistenciaTotal['retardos'];
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
    <script type="module" src="http://localhost:5173/resources/css/dash.css"></script>
    <script type="module" src="http://localhost:5173/resources/js/app.js"></script>
</head>
<body>

    <!-- Layout principal que divide el Sidebar y el contenido -->
    <div class="app-layout">

    <!-- Incluir Sidebar y Header -->
      <?php
      include('../sidebar.php');
      include('../header.php')
      ?>

      <!-- MAIN (El cuadro azul muy claro para el contenido principal) -->
      <main class="app-main-container">

<!-- Módulo de dashboard -->
            <section class="modulo-dashboard">

                <!-- 1. CUADRÍCULA: .dashboard-grid (2 columnas) o .dashboard-grid dashboard-grid-3 (3 columnas) -->
                <div class="dashboard-grid">

                    <!-- Card: ¿Quiénes llegaron hoy? -->
                    <div class="dashboard-card">
                        <!-- 2. CAMBIAR TITULO Y DESCRIPCIÓN DE CADA CARD -->
                        <h2 class="dashboard-card-titulo">¿Quiénes llegaron hoy?</h2>
                        <p class="dashboard-card-descripcion">Registro de entradas del día</p>

                        <!-- 3. MÉTRICAS: .metrica / .metrica-exito / .metrica-alerta -->
                        <div class="metricas">
                            <div class="metrica">
                                <p class="metrica-etiqueta">Total</p>
                                <p class="metrica-valor"><?= $totalHoy ?></p>
                            </div>
                            <div class="metrica metrica-exito">
                                <p class="metrica-etiqueta">A tiempo</p>
                                <p class="metrica-valor"><?= $aTiempoHoy ?> <span class="metrica-porcentaje">(<?= $pctATiempoHoy ?>%)</span></p>
                            </div>
                            <div class="metrica metrica-alerta">
                                <p class="metrica-etiqueta">Retardos</p>
                                <p class="metrica-valor"><?= $retardosHoy ?> <span class="metrica-porcentaje">(<?= $pctRetardosHoy ?>%)</span></p>
                            </div>
                        </div>                        
                        <ul class="dashboard-lista">
                            <?php foreach ($llegaronHoy as $u): ?>
                                <li class="dashboard-item">
                                    <p class="item-nombre"><?= htmlspecialchars($u['nombre']) ?></p>
                                    <div class="item-meta">
                                        <span><?= $u['hora'] ?></span>
                                        <span class="dashboard-badge <?= $u['retardo'] ? 'badge-alerta' : 'badge-exito' ?>">
                                            <?= $u['retardo'] ? 'Retardo' : 'A tiempo' ?>
                                        </span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Card: Asistencia total -->
                    <div class="dashboard-card">
                        <h2 class="dashboard-card-titulo">Asistencia total</h2>
                        <p class="dashboard-card-descripcion">Acumulado del periodo</p>

                        <div class="metricas metricas-1">
                            <div class="metrica metrica-grande">
                                <p class="metrica-etiqueta">Total de asistencias</p>
                                <p class="metrica-valor"><?= $totalAsistencia ?></p>
                            </div>
                        </div>

                        <div class="metricas metricas-2">
                            <div class="metrica metrica-exito metrica-grande">
                                <p class="metrica-etiqueta">A tiempo</p>
                                <p class="metrica-valor"><?= $asistenciaTotal['a_tiempo'] ?></p>
                            </div>
                            <div class="metrica metrica-alerta metrica-grande">
                                <p class="metrica-etiqueta">Retardos</p>
                                <p class="metrica-valor"><?= $asistenciaTotal['retardos'] ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Card: ¿Quiénes están en riesgo? -->
                    <div class="dashboard-card">
                        <h2 class="dashboard-card-titulo">¿Quiénes están en riesgo?</h2>
                        <p class="dashboard-card-descripcion">Personal con acumulación de faltas o retardos</p>

                        <?php if (empty($enRiesgo)): ?>
                            <p class="dashboard-vacio">Nadie está en riesgo por ahora.</p>
                        <?php else: ?>
                            <ul class="dashboard-lista">
                                <?php foreach ($enRiesgo as $u): ?>
                                    <li class="dashboard-item">
                                        <div class="item-datos">
                                            <p class="item-nombre"><?= htmlspecialchars($u['nombre']) ?></p>
                                            <p class="item-detalle"><?= htmlspecialchars($u['detalle']) ?></p>
                                        </div>
                                        <button type="button" class="boton-notificar">Notificar riesgo</button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Card: ¿Quiénes están en proceso de despido? -->
                    <div class="dashboard-card">
                        <h2 class="dashboard-card-titulo">¿Quiénes están en proceso de despido?</h2>
                        <p class="dashboard-card-descripcion">Deben presentarse en Recursos Humanos</p>

                        <?php if (empty($enDespido)): ?>
                            <p class="dashboard-vacio">No hay procesos de despido abiertos.</p>
                        <?php else: ?>
                            <ul class="dashboard-lista">
                                <?php foreach ($enDespido as $u): ?>
                                    <li class="dashboard-item">
                                        <div class="item-datos">
                                            <p class="item-nombre"><?= htmlspecialchars($u['nombre']) ?></p>
                                            <p class="item-detalle"><?= htmlspecialchars($u['detalle']) ?></p>
                                        </div>
                                        <button type="button" class="boton-notificar">Notificar: acudir a RH</button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                </div>

            </section>

      </main>
    </div>

</body>

</html>