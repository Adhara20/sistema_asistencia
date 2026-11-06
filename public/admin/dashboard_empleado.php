<?php
//DATOS DE EJEMPLO
$miAsistencia = [
  ['fecha' => '01/01/26', 'entrada' => '07:52', 'retardo' => false, 'salida' => '00:00', 'hora_completa' => '...'],
  ['fecha' => '01/01/26', 'entrada' => '07:52', 'retardo' => false, 'salida' => '13:52', 'hora_completa' => false],
  ['fecha' => '01/01/26', 'entrada' => '07:52', 'retardo' => false, 'salida' => '17:52', 'hora_completa' => true],
  ['fecha' => '01/01/26', 'entrada' => '08:50', 'retardo' => true,  'salida' => '17:52', 'hora_completa' => true],
  ['fecha' => '01/01/26', 'entrada' => '07:52', 'retardo' => false, 'salida' => '17:52', 'hora_completa' => true]
];

$misNotificaciones = [
  ['despido' => true,'tipo' => 'Aviso: Riesgo de Despido', 'detalle' => 'Has superado el limite de 5 retardos. Estás en riesgo de ser despedido. Acude a RH por favor.', 'fecha' => '12-12-25'],
  ['despido' => false,'tipo' => 'Advertenia: Has Llegado al Limite', 'detalle' => 'Has llegado al limite de 5 retardos. Por favor, sea puntual. Superar este limite puede ser causa de despido.', 'fecha' => '12-12-25'],
];

$asistenciaTotal = ['a_tiempo' => 182, 'retardos' => 23];

//CALCULOS
$totalHoy        = count($miAsistencia);
$retardosHoy     = count(array_filter($miAsistencia, fn ($u) => $u['retardo']));
$aTiempoHoy      = $totalHoy - $retardosHoy;
$pctATiempoHoy   = $totalHoy ? round($aTiempoHoy / $totalHoy * 100) : 0;
$pctRetardosHoy  = $totalHoy ? round($retardosHoy / $totalHoy * 100) : 0;
$totalAsistencia = $asistenciaTotal['a_tiempo'] + $asistenciaTotal['retardos'];
// CALCULOS AVISOS
$totalAvisos = count($misNotificaciones);
$avisos = count(array_filter($misNotificaciones, fn ($u) => $u['despido']));
$pctAvisos = round(($avisos * 100) / $totalAvisos);
$advertencias = $totalAvisos - $avisos;
$pctAdvertencias = round(100 - $pctAvisos);
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

                    <!-- Card: Contador de retardos -->
                    <div class="dashboard-card">
                        <!-- 2. CAMBIAR TITULO Y DESCRIPCIÓN DE CADA CARD -->
                        <h2 class="dashboard-card-titulo">Mi Puntualidad</h2>
                        <p class="dashboard-card-descripcion">Mis asistencias, puntualidad y retardos del Semestre</p>

                        <!-- 3. MÉTRICAS: .metrica / .metrica-exito / .metrica-alerta -->
                        <div class="metricas">
                            <div class="metrica">
                                <p class="metrica-etiqueta">Total</p>
                                <p class="metrica-valor"><?= $totalHoy ?></p>
                            </div>
                            <div class="metrica metrica-exito">
                                <p class="metrica-etiqueta">A tiempo</p>
                                <p class="metrica-valor"><?= $aTiempoHoy ?> <span class="metrica-porcentaje">(<?= $pctAvisos ?>%)</span></p>
                            </div>
                            <div class="metrica metrica-alerta">
                                <p class="metrica-etiqueta">Retardos</p>
                                <p class="metrica-valor"><?= $retardosHoy ?> <span class="metrica-porcentaje">(<?= $pctRetardosHoy ?>%)</span></p>
                            </div>
                        </div>                        
                        <ul class="dashboard-lista">
                            <?php foreach ($miAsistencia as $u): ?>
                                <li class="dashboard-item">
                                    <p class="item-nombre"><?= htmlspecialchars($u['fecha']) ?></p>
                                    <div class="item-meta">
                                        <div>
                                            <span>Entrada: <?= $u['entrada'] ?></span>
                                            <span class="dashboard-badge <?= $u['retardo'] ? 'badge-alerta' : 'badge-exito' ?>">
                                                <?= $u['retardo'] ? 'Retardo' : 'A tiempo' ?>
                                            </span>
                                        </div>
                                        <div>
                                            <span>Salida: <?= $u['salida'] ?></span>
                                            <span class="dashboard-badge <?= $u['hora_completa'] ? 'badge-exito' : 'badge-alerta' ?>">
                                                <?= $u['hora_completa'] ? 'Completo' : 'Incompleto' ?>
                                            </span>
                                        </div>
                                        
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Card: Contador de retardos -->
                    <div class="dashboard-card">
                        <!-- 2. CAMBIAR TITULO Y DESCRIPCIÓN DE CADA CARD -->
                        <h2 class="dashboard-card-titulo">Notificaciones</h2>
                        <p class="dashboard-card-descripcion">Avisos y Advertencias</p>

                        <!-- 3. MÉTRICAS: .metrica / .metrica-exito / .metrica-alerta -->
                        <div class="metricas">
                            <div class="metrica">
                                <p class="metrica-etiqueta">Total</p>
                                <p class="metrica-valor"><?= $totalAvisos ?></p>
                            </div>
                            <div class="metrica metrica-advertencia">
                                <p class="metrica-etiqueta">Limite de retardos</p>
                                <p class="metrica-valor"><?= $advertencias ?> <span class="metrica-porcentaje">(<?= $pctAdvertencias ?>%)</span></p>
                            </div>
                            <div class="metrica metrica-alerta">
                                <p class="metrica-etiqueta">Posible despido</p>
                                <p class="metrica-valor"><?= $avisos ?> <span class="metrica-porcentaje">(<?= $pctAvisos ?>%)</span></p>
                            </div>
                        </div>                        
                        <?php if (empty($misNotificaciones)): ?>
                            <p class="dashboard-vacio">Nadie está en riesgo por ahora.</p>
                        <?php else: ?>
                            <ul class="dashboard-lista">
                                <?php foreach ($misNotificaciones as $u): ?>
                                    <li class="dashboard-item">
                                        <div class="item-datos">
                                            <p class="item-tipo <?= $u['despido'] ? 'badge-alerta' : 'badge-advertencia' ?>"> <?= htmlspecialchars($u['tipo']) ?> </p>
                                            <p class="item-detalle"><?= htmlspecialchars($u['detalle']) ?></p>
                                        </div>
                                        <div class="item-fecha">
                                            <span class="text-fecha">Fecha</span>
                                            <p class="dato-fecha"><?= htmlspecialchars($u['fecha']) ?></p>
                                        </div>
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
<script src="../../resources/js/sidebar.js"></script>

</html>