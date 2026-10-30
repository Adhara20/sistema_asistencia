1. Configurar su identidad en Git (Obligatorio si es su primera vez en esa compu, si la formatearon, sino tienen su nombre como usuario de Git)

# git config --global user.name "Tu Nombre Completo"

# git config --global user.email "tu_correo@ejemplo.com"

2. Clonar el Repositorio, crear, cambiarse y conectar rama develop

# 1. Clonar el repositorio

git clone <URL_DE_TU_REPOSITORIO>
cd nombre-de-la-carpeta

# 2. Cambiar a la rama develop y enlazarla con el servidor

git checkout develop

# O si usas versiones recientes de Git:

git switch develop

# 3. Asegurarte de tener los últimos cambios de esa rama

git pull origin develop

2. Configurar las variables de entorno:

- Duplica el archivo de ejemplo .env.example y renómbralo simplemente como .env.
- Abre el archivo .env recién creado y ajusta las credenciales de tu base de datos local si es necesario.

3. Instalar las dependencias de PHP (Composer)

composer install

4. Instalar las dependencias de Node.js (NPM)

npm install

5. Levantar el entorno de desarrollo (Vite)

npm run dev

6. Crear la base de datos: En la carpeta bd está el script create_database.sql
   En caso de haber procedures, vistas y/o disparadores, ejecutarlos.

7. Flujo de trabajo diario en equipo (Git Flow básico)

# 1. Actualiza develop antes de empezar

git checkout develop
git pull origin develop

# 2. Crear una rama para tu tarea específica (feature):(Por ejemplo, si vas a programar un modulo o función grande nueva)

git checkout -b feature/nombre-modulo-nombre-funcion

# 3. Subir cambios

git add .
git commit -m "feat: descripción"
git push origin feature/nombre-modulo-nombre-funcion

8. Ramas del Proyecto

# main:

Producción o versión final estable. No se toca directamente.

# develop:

Rama principal de desarrollo donde se integran todos los avances.

# release:

Se utiliza únicamente cuando el sistema está completo y listo para una revisión final antes de pasar a producción.

# feature:

Ramas temporales para desarrollar una funcionalidad o tarea principal (ej. feature/login).

# task:

Sub-ramas que forman parte de una tarea principal (feature), ideales para dividir subtareas entre el equipo.

8. Tipos de Commits y Ejemplos

Usaremos prefijos estandarizados al escribir nuestros mensajes de commit para identificar rápidamente el propósito de cada cambio:

# feat:

Para agregar una nueva característica o funcionalidad.

# Ejemplo: git commit -m "feat: implementar conexion a la base de datos con PDO"

# fix:

Para corregir errores o bugs.

# Ejemplo: git commit -m "git commit -m "fix: corregir ruta de redireccion en el login""

# remove:

Para eliminar código, archivos o recursos que ya no se usan.

# Ejemplo: git commit -m "remove: eliminar archivo de prueba antiguo"

# docs:

Para cambios o actualizaciones en la documentación o README.

# Ejemplo: git commit -m "docs: actualizar instrucciones de instalacion en el readme"

# refactor:

Para reestructurar el código sin cambiar su funcionalidad (mejorar limpieza u orden).

# Ejemplo: git commit -m "refactor: reorganizar consultas sql en la clase conexion"

# chore:

Para tareas de mantenimiento, dependencias o configuración general.

# Ejemplo: git commit -m "chore: instalar vlucas/phpdotenv con composer"

# style:

Para cambios de estilo visual, formato o diseño (espacios, punto y coma, Tailwind, etc.).

# Ejemplo: git commit -m "style: aplicar clases de tailwind al formulario de asistencia"
