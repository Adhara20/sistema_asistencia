<?php

require_once __DIR__ . '/../vendor/autoload.php';

$titulo = "Sistema de Asistencia";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia</title>

    <!-- Esto conecta Vite con tu PHP en tiempo real durante el desarrollo -->
    <script type="module" src="http://localhost:5173/@vite/client"></script>
    <script type="module" src="http://localhost:5173/resources/js/app.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-xl shadow-md text-center max-w-md w-full">
        <h1 class="text-2xl font-bold text-blue-600 mb-2">¡Todo listo! 🚀</h1>
        <p class="text-gray-600 mb-6">Tu estructura de PHP puro + Vite + Tailwind v4 + Axios está en pie.</p>
        
        <button id="btnPrueba" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg transition">
            Probar Consola / Axios
        </button>
    </div>

    <!-- Script rápido para probar que Axios responde -->
    <script>
        document.getElementById('btnPrueba').addEventListener('click', () => {
            console.log("Axios está listo:", typeof axios !== 'undefined' ? "¡Sí! 🟢" : "No 🔴");
            alert("¡Revisa la consola del navegador (F12) para ver los mensajes de Vite y Axios!");
        });
    </script>
</body>
</html>