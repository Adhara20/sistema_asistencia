<?php

class Usuarios{
    
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function existeCorreoOCodigo(string $correoElectronico, string $codigoUsuario): bool
    {
        $sql = "SELECT id_usuario
                FROM usuarios
                WHERE correo_electronico = :correo_electronico OR codigo_usuario = :codigo_usuario
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':correo_electronico' => $correoElectronico,
            ':codigo_usuario' => $codigoUsuario,
        ]);

        return (bool) $stmt->fetchColumn();
    }

    public function obtenerDepartamentos(): array
    {
        $sql = "SELECT id_departamento, departamento
                FROM departamentos
                ORDER BY departamento ASC";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear(array $data): bool
    {
        $sql = "INSERT INTO usuarios (
                    codigo_usuario,
                    nombres,
                    apellidos,
                    puesto,
                    fk_departamento,
                    correo_electronico,
                    password,
                    rol,
                    estatus
                ) VALUES (
                    :codigo_usuario,
                    :nombres,
                    :apellidos,
                    :puesto,
                    :fk_departamento,
                    :correo_electronico,
                    :password,
                    :rol,
                    :estatus
                )";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':codigo_usuario', $data['codigo_usuario'], PDO::PARAM_STR);
        $stmt->bindValue(':nombres', $data['nombres'], PDO::PARAM_STR);
        $stmt->bindValue(':apellidos', $data['apellidos'], PDO::PARAM_STR);
        $stmt->bindValue(':puesto', $data['puesto'], PDO::PARAM_STR);
        $stmt->bindValue(':fk_departamento', (int) $data['fk_departamento'], PDO::PARAM_INT);
        $stmt->bindValue(':correo_electronico', $data['correo_electronico'], PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($data['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindValue(':rol', $data['rol'] ?? 'usuario', PDO::PARAM_STR);
        $stmt->bindValue(':estatus', (int) ($data['estatus'] ?? 1), PDO::PARAM_INT);

        return $stmt->execute();
    }
}