<?php

require_once __DIR__ . '/../models/Usuarios.php';

class UsuariosController
{
    private Usuarios $usuarioModel;

    public function __construct(PDO $conn)
    {
        $this->usuarioModel = new Usuarios($conn);
    }

    public function obtenerDepartamentos(): array
    {
        return $this->usuarioModel->obtenerDepartamentos();
    }

    public function registrar(array $post): string
    {
        $codigoUsuario = trim($post['num_empleado'] ?? '');
        $nombres = trim($post['nombres'] ?? '');
        $apellidos = trim($post['apellidos'] ?? '');
        $puesto = trim($post['puesto'] ?? '');
        $fkDepartamento = filter_var(
            $post['departamento'] ?? '',
            FILTER_VALIDATE_INT,
            ['options' => ['min_range' => 1]]
        );
        $correo = filter_var(trim($post['correo'] ?? ''), FILTER_SANITIZE_EMAIL);
        $password = (string) ($post['password'] ?? '');

        if ($codigoUsuario === '' || $nombres === '' || $apellidos === '' || $puesto === '') {
            return "Completa todos los campos obligatorios.";
        }

        if ($fkDepartamento === false) {
            return "Selecciona un departamento válido.";
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            return "Correo electrónico inválido.";
        }

        if (strlen($password) < 6) {
            return "La contraseña debe tener al menos 6 caracteres.";
        }

        try {
            $creado = $this->usuarioModel->crear([
                'codigo_usuario' => $codigoUsuario,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'puesto' => $puesto,
                'fk_departamento' => $fkDepartamento,
                'correo_electronico' => $correo,
                'password' => $password,
                'rol' => 'usuario',
                'estatus' => 1,
            ]);

            return $creado
                ? "Usuario registrado correctamente."
                : "No se pudo registrar el usuario.";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                return "El correo electrónico o código de usuario ya está registrado.";
            }

            return "Error al registrar el usuario.";
        }
    }
}