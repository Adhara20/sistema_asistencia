<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="http://localhost:5173/resources/css/app.css"></script>
    <title>Login</title>
</head>
<body>

    <div class="min-h-screen flex items-center justify-center p-4">
        <div id="card-empleados" class="bg-[var(--color-background)] rounded-2xl shadow-xl w-full max-w-sm p-12 text-center border border-[var(--color-card-bg)]">

            <h1 class="text-[length:var(--text-header-title)] font-bold text-[var(--color-primary)] mb-1">Iniciar Sesión</h1>
            <p class="text-[length:var(--text-description)] text-[var(--color-gris)] mb-6 font-medium">Empleados y Registradoras</p>

            <form class="space-y-4 text-left">
            <div>
              <label class="block text-label font-medium text-gris mb-1">No. Empleado</label>
              <input type="number" class="text-input input-lg" placeholder="Ingrese su número" required/>
            </div>

            <div>
              <label class="block text-label font-medium text-gris mb-1">Contraseña</label>
              <input type="password" class="text-input input-lg" placeholder="••••••••" required/>
            </div>

            <div class="pt-4">
              <button type="submit" class="w-full bg-[var(--color-primary)] hover:opacity-90 text-[var(--color-background)] text-[length:var(--text-button)] font-medium py-3 rounded-full shadow-md transition-all duration-200">
                Iniciar Sesión</button>
            </div>
            </form>

            <div class="mt-6">
              <button type="button" onclick="toggleForm('admin')" class="text-[length:var(--text-description)] font-medium text-[var(--color-secondary)] hover:text-[var(--color-primary)] inline-flex items-center gap-1.5 transition-colors cursor-pointer">
                Soy Administrador 
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
              </button>
              </div>
        </div>

        <div id="card-admin" class="hidden bg-[var(--color-background)] rounded-2xl shadow-xl w-full max-w-sm p-16 text-center border border-[var(--color-card-bg)]">
            <h1 class="text-[length:var(--text-header-title)] font-bold text-[var(--color-primary)] mb-1">Iniciar Sesión como Administrador</h1>

            <p class="text-[length:var(--text-description)] text-[var(--color-gris)] mb-6 font-medium">Inicia sesión con tu cuenta de Google</p>

            <button type="button" class="w-full flex items-center justify-center gap-3 border-2 border-black rounded-xl py-2.5 px-4 font-medium text-[var(--color-negro)] hover:bg-gray-50 transition-colors mb-6">
              <svg class="w-5 h-5" viewBox="0 0 24 24">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
              </svg>
              Iniciar sesión con Google
            </button>
 
            <div class="space-y-2 text-left text-xs text-[var(--color-gris)] mb-6">
              <p>Solo Administradores pueden iniciar sesión con Google.*</p>
              <p>La cuenta debe estar registrada previamente en el sistema.*</p>
            </div>
            <div>
              <button type="button" onclick="toggleForm('empleados')" class="text-[length:var(--text-description)] font-medium text-[var(--color-secondary)] hover:text-[var(--color-primary)] inline-flex items-center gap-1.5 transition-colors cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                No soy Administrador
              </button>
            </div>
        </div>
    </div>

    <!-- ALTERNA LAS TARJETAS -->
    <script>
      function toggleForm(vista) {
        const cardEmpleados = document.getElementById('card-empleados');
        const cardAdmin = document.getElementById('card-admin');

        if (vista === 'admin') {
          cardEmpleados.classList.add('hidden');
          cardAdmin.classList.remove('hidden');
        } else {
          cardAdmin.classList.add('hidden');
          cardEmpleados.classList.remove('hidden');
        }
      }
    </script>
</body>
</html>