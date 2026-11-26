-- PROCEDURES PARA USUARIOS

-- 1. CREAR-REGISTRAR EMPLEADOS, ADMINISTRADORES Y REGISTRADORAS
-- REGISTRAR EMPLEADO
DELIMITER $$
CREATE PROCEDURE registrar_empleado (
    IN e_codigo VARCHAR(10),
    IN e_nombre VARCHAR(80),
    IN e_apellido VARCHAR(80),
    IN e_puesto VARCHAR(30),
    IN e_departamento INT,
    IN e_correo VARCHAR(100),
    IN e_pass TEXT
    )
BEGIN
    INSERT INTO usuarios(codigo_usuario, nombres, apellidos, puesto, fk_departamento, correo_electronico, password, rol) 
    VALUES(e_codigo, e_nombre, e_apellido, e_puesto, e_departamento, e_correo, e_pass, "Empleado");
END $$
-- REGISTRAR ADMINISTRADOR
-- Por default, su departamento será RH (PK 1 de la tabla departamentos)
DELIMITER $$
CREATE PROCEDURE registrar_admin (
    IN a_codigo VARCHAR(10),
    IN a_nombre VARCHAR(80),
    IN a_apellido VARCHAR(80),
    IN a_puesto VARCHAR(30),
    IN a_correo VARCHAR(100),
    IN a_pass TEXT
    )
BEGIN
    INSERT INTO usuarios(codigo_usuario, nombres, apellidos, puesto, fk_departamento, correo_electronico, password, rol) 
    VALUES(a_codigo, a_nombre, a_apellido, a_puesto, 1, a_correo, a_pass, "Administrador");
END $$
-- REGISTRAR REGISTRADORA
DELIMITER $$
CREATE PROCEDURE registrar_registradora (
    IN r_codigo VARCHAR(10),
    IN r_unicacion VARCHAR(80),
    IN r_pass TEXT
    )
BEGIN
    INSERT INTO usuarios(codigo_usuario, nombres, password, rol) 
    VALUES(r_codigo, r_unicacion, r_pass, "Registradora");
END $$

-- 2. EDITAR-ACTUALIZAR REGISTROS

-- EDITAR EMPLEADO
DELIMITER $$
CREATE PROCEDURE actualizar_empleado(
    IN e_id INT,
    IN e_codigo VARCHAR(10),
    IN e_nombre VARCHAR(80),
    IN e_apellido VARCHAR(80),
    IN e_puesto VARCHAR(30),
    IN e_departamento INT,
    IN e_correo VARCHAR(100)
    )
BEGIN
    UPDATE usuarios SET codigo_usuario = e_codigo, nombres = e_nombre, apellidos = e_apellido, puesto = e_puesto, fk_departamento = e_departamento, correo_electronico = e_correo
    WHERE id_usuario = e_id;
END $$

-- EDITAR ADMIN
DELIMITER $$
CREATE PROCEDURE actualizar_admin(
    IN a_id INT,
    IN a_codigo VARCHAR(10),
    IN a_nombre VARCHAR(80),
    IN a_apellido VARCHAR(80),
    IN a_puesto VARCHAR(30),
    IN a_correo VARCHAR(100)
    )
BEGIN
    UPDATE usuarios SET 
    codigo_usuario = a_codigo, 
    nombres = a_nombre, 
    apellidos = a_apellido, 
    puesto = a_puesto,
    correo_electronico = a_correo 
    WHERE id_usuario = a_id;
END $$
-- EDITAR REGISTRADORA
DELIMITER $$
CREATE PROCEDURE actualizar_registradora(
    IN r_id INT,
    IN r_ubicacion VARCHAR(80)
    )
BEGIN
    UPDATE usuarios SET 
    nombres = r_ubicacion
    WHERE id_usuario = r_id;
END $$


-- 3. CREDENCIALES
-- VALIDAR CONTRASEÑA ACTUAL
DELIMITER $$
CREATE PROCEDURE validar_pass(
    IN u_id INT
)
BEGIN
    SELECT password
    FROM usuarios
    WHERE id_usuario = u_id
    LIMIT 1;
END $$
DELIMITER ;
-- ACTUALIZAR CORREO
-- Actualiza el correo de un empleado o administrador activo,
-- siempre que el nuevo correo no esté registrado en otra cuenta.
DELIMITER $$
CREATE PROCEDURE actualizar_correo(
    IN p_id_usuario INT,
    IN p_correo_nuevo VARCHAR(100)
)
BEGIN
    IF EXISTS (
        SELECT 1
        FROM usuarios
        WHERE id_usuario = p_id_usuario
          AND rol IN ('Empleado', 'Administrador')
          AND estatus = 'Activo'
    )
    AND NOT EXISTS (
        SELECT 1
        FROM usuarios
        WHERE correo_electornico = p_correo_nuevo
          AND id_usuario <> p_id_usuario
    ) THEN

        UPDATE usuarios
        SET correo_electornico = p_correo_nuevo
        WHERE id_usuario = p_id_usuario;

        SELECT ROW_COUNT() AS filas_actualizadas;

    ELSE

        SELECT 0 AS filas_actualizadas;

    END IF;
END $$
DELIMITER ;

-- ACTUALIZAR CONTRASEÑA
-- Guarda la nueva contraseña de un usuario identificado por su ID.
-- La contraseña recibida debe estar previamente cifrada mediante un hash seguro en PHP.
DELIMITER $$
CREATE PROCEDURE actualizar_pass(
    IN u_id INT,
    IN new_pass VARCHAR(255)
)
BEGIN
    UPDATE usuarios
    SET password = new_pass
    WHERE id_usuario = u_id;
END $$
DELIMITER ;

-- CREAR SOLICITUD DE RECUPERACIÓN DE CONTRASEÑA
-- Busca una cuenta activa de empleado o administrador que coincida
-- con el código y correo proporcionados. Invalida las solicitudes
-- pendientes anteriores y registra una nueva solicitud con un token
-- hasheado y una fecha de expiración.

-- Cómo funciona:
-- 1. Busca al usuario mediante su código y correo registrados.
-- 2. Comprueba que la cuenta esté activa y tenga un rol permitido.
-- 3. Si encuentra la cuenta, marca como utilizadas las solicitudes pendientes anteriores.
-- 4. Registra el nuevo token hasheado y su fecha de expiración.

DELIMITER $$
CREATE PROCEDURE crear_recuperacion_contrasena(
    IN p_codigo VARCHAR(10),
    IN p_correo VARCHAR(100),
    IN p_token_hash CHAR(64),
    IN p_expira_en DATETIME
)
BEGIN
    DECLARE v_id_usuario INT DEFAULT NULL;

    SELECT id_usuario
    INTO v_id_usuario
    FROM usuarios
    WHERE codigo_usuario = p_codigo
      AND correo_electornico = p_correo
      AND estatus = 'Activo'
      AND rol IN ('Empleado', 'Administrador')
    LIMIT 1;

    IF v_id_usuario IS NOT NULL THEN

        UPDATE recuperaciones_contrasena
        SET utilizado_en = CURRENT_TIMESTAMP
        WHERE fk_usuario = v_id_usuario
          AND utilizado_en IS NULL;

        INSERT INTO recuperaciones_contrasena(
            fk_usuario,
            token_hash,
            expira_en
        )
        VALUES (
            v_id_usuario,
            p_token_hash,
            p_expira_en
        );

    END IF;
END $$
DELIMITER ;

-- COMPLETAR LA RECUPERACIÓN DE CONTRASEÑA
-- Verifica que el token exista, no haya sido utilizado y no haya expirado.
-- Si es válido, actualiza la contraseña del usuario y marca sus solicitudes
-- pendientes como utilizadas dentro de una transacción.

DELIMITER $$
CREATE PROCEDURE completar_recuperacion_pass(
    IN p_token_hash CHAR(64),
    IN p_nuevo_hash TEXT
)
BEGIN
    DECLARE v_id_recuperacion INT DEFAULT NULL;
    DECLARE v_id_usuario INT DEFAULT NULL;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        RESIGNAL;
    END;

    DECLARE CONTINUE HANDLER FOR NOT FOUND
    BEGIN
        SET v_id_recuperacion = NULL;
        SET v_id_usuario = NULL;
    END;

    START TRANSACTION;

    SELECT r.id_recuperacion, r.fk_usuario
    INTO v_id_recuperacion, v_id_usuario
    FROM recuperaciones_contrasena r
    INNER JOIN usuarios u
        ON u.id_usuario = r.fk_usuario
    WHERE r.token_hash = p_token_hash
      AND r.utilizado_en IS NULL
      AND r.expira_en > CURRENT_TIMESTAMP
      AND u.estatus = 'Activo'
      AND u.rol IN ('Empleado', 'Administrador')
    LIMIT 1
    FOR UPDATE;

    IF v_id_recuperacion IS NOT NULL THEN

        UPDATE usuarios
        SET password = p_nuevo_hash
        WHERE id_usuario = v_id_usuario;

        UPDATE recuperaciones_contrasena
        SET utilizado_en = CURRENT_TIMESTAMP
        WHERE fk_usuario = v_id_usuario
          AND utilizado_en IS NULL;

        COMMIT;

        SELECT 1 AS actualizado;

    ELSE

        ROLLBACK;

        SELECT 0 AS actualizado;

    END IF;
END $$
DELIMITER ;

-- 5. BUSQUEDAS
-- BUSCAR CORREO Y USUARIO
-- Obtiene el ID del usuario asociado al correo electrónico proporcionado.
DELIMITER $$
CREATE PROCEDURE buscar_usuario_correo(
    IN correo VARCHAR(100)
)
BEGIN
    SELECT id_usuario
    FROM usuarios
    WHERE correo_electronico = correo
    LIMIT 1;
END $$
DELIMITER;

-- BUSCAR/OBTENER USUARIOS
-- Consulta los datos generales de un usuario mediante su ID e incluye
-- el nombre de su departamento cuando tiene uno asignado.
DELIMITER $$
CREATE PROCEDURE obtener_por_id(
    IN u_id INT
)
BEGIN
    SELECT u.codigo_usuario, u.nombres, u.apellidos, u.rol, d.departamento, u.fk_departamento, u.puesto, u.correo_electronico
    FROM usuarios u INNER JOIN departamentos d ON u.fk_departamento = d.id_departamento
    WHERE u.id_usuario = u_id
    LIMIT 1;
END $$
DELIMITER;

-- OBTENER ID POR CÓDIGO DE USUARIO
-- Busca y devuelve el ID interno del usuario que coincide con el código proporcionado.
DELIMITER $$
CREATE PROCEDURE obtener_id_por_codigo_usuario(
    IN u_codigo VARCHAR(10),
    OUT u_id_usuario INT
)
BEGIN
    SELECT id_usuario
    FROM usuarios
    WHERE codigo_usuario = u_codigo
    LIMIT 1;
END $$
DELIMITER;

-- 6. LISTAS
-- ADMINS
DELIMITER $$
CREATE PROCEDURE index_administradores()
BEGIN
    SELECT
        codigo_usuario,
        CONCAT_WS(' ',nombres, apellidos)
            AS nombre_completo,
        correo_electronico,
        puesto,
        estatus
    FROM usuarios
    WHERE rol = 'Administrador' AND estatus = 'Activo';
END $$
DELIMITER ;
-- EMPLEADOS
DELIMITER $$
CREATE PROCEDURE index_empleados()
BEGIN
    SELECT
        u.codigo_usuario,
        CONCAT_WS(' ', u.nombres, u.apellidos)
            AS nombre_completo,
        d.departamento,
        u.puesto,
        u.estatus
    FROM usuarios u INNER JOIN departamentos d ON u.fk_departamento=d.id_departamento
    WHERE u.rol = 'Empleado' AND u.estatus = 'Activo';
END $$
DELIMITER ;
-- REGISTRADORAS
DELIMITER $$
CREATE PROCEDURE index_registradoras()
BEGIN
    SELECT
        codigo_usuario,
        nombres,
        estatus
    FROM usuarios
    WHERE rol = 'Registradora' AND estatus = 'Activo';
END $$

DELIMITER ;

-- 7. FILTROS 
-- ADMINS
DELIMITER $$
CREATE PROCEDURE filtrar_administradores(
    IN p_busqueda VARCHAR(100),
    IN p_estatus VARCHAR(20)
)
BEGIN
    SELECT
        codigo_usuario,
        CONCAT_WS(' ', nombres, apellidos)
            AS nombre_completo,
        correo_electronico,
        puesto,
        estatus
    FROM usuarios
    WHERE rol = 'Administrador'
      AND (
          p_busqueda IS NULL
          OR codigo_usuario LIKE CONCAT('%', p_busqueda, '%')
          OR CONCAT_WS(' ', nombres, apellidos)
                LIKE CONCAT('%', p_busqueda, '%')
      )
      AND (
          (p_estatus IS NULL AND estatus = 'Activo')
          OR (p_estatus IS NOT NULL AND estatus = p_estatus)
      );
END $$
DELIMITER;
-- EMPLEADOS
DELIMITER $$
CREATE PROCEDURE filtrar_empleados(
    IN p_busqueda VARCHAR(100),
    IN p_estatus VARCHAR(20),
    IN p_departamento INT
)
BEGIN
    SELECT
        u.codigo_usuario,
        CONCAT_WS(' ', u.nombres, u.apellidos)
            AS nombre_completo,
        d.departamento,
        u.puesto,
        u.estatus
    FROM usuarios u INNER JOIN departamentos d ON u.fk_departamento = d.id_departamento
    WHERE rol = 'Empleado'
      AND (
          p_busqueda IS NULL
          OR u.codigo_usuario LIKE CONCAT('%', p_busqueda, '%')
          OR CONCAT_WS(' ', u.nombres, u.apellidos)
                LIKE CONCAT('%', p_busqueda, '%')
      )
      AND (
          p_estatus IS NULL AND u.estatus = 'Activo'
          OR p_estatus IS NOT NULL AND u.estatus = p_estatus
      )
      AND (
          p_departamento IS NULL
          OR u.fk_departamento = p_departamento
      );
END $$
DELIMITER ;
-- REGISTRADORAS
DELIMITER $$
CREATE PROCEDURE filtrar_registradoras(
    IN p_busqueda VARCHAR(100),
    IN p_estatus VARCHAR(20)
)
BEGIN
    SELECT
        codigo_usuario,
        nombres,
        estatus
    FROM usuarios
    WHERE rol = 'Registradora'
        AND (
            p_busqueda IS NULL
            OR codigo_usuario LIKE CONCAT('%', p_busqueda, '%')
            OR nombres LIKE CONCAT('%', p_busqueda, '%')
        )
      AND (
          (p_estatus IS NULL AND estatus = 'Activo')
          OR (p_estatus IS NOT NULL AND estatus = p_estatus)
      );
END $$
DELIMITER ;

-- DAR DE BAJA
DELIMITER $$
CREATE PROCEDURE dar_baja(
    IN u_id INT
    )
BEGIN
    UPDATE usuarios SET estatus = "Baja"
    WHERE id_usuario = u_id;
END $$

-- LOGIN
-- Con credenciales
DELIMITER $$

CREATE PROCEDURE login_credenciales(
    IN p_codigo_usuario VARCHAR(50)
)
BEGIN
    SELECT
        id_usuario,
        codigo_usuario,
        password,
        rol,
        estatus
    FROM usuarios
    WHERE codigo_usuario = p_codigo_usuario
    LIMIT 1;
END $$
DELIMITER ;
-- Con Google: Verificar que el correo exista en la bd y sea de un admin
DELIMITER $$
CREATE PROCEDURE login_google(
    IN p_correo VARCHAR(255)
)
BEGIN
    SELECT
        id_usuario,
        correo_electronico,
        rol,
        estatus
    FROM usuarios
    WHERE correo_electronico = p_correo
      AND rol = 'Administrador'
      AND estatus = 'Activo'
    LIMIT 1;
END $$
DELIMITER ;

-- EEXISTE CODIGO DEL USUARIO
DELIMITER $$
-- Verificar si un código de usuario ya existe
CREATE PROCEDURE existeCodigoUsuario(
    IN p_codigo VARCHAR(10)
)
BEGIN
    SELECT EXISTS(
        SELECT 1
        FROM usuarios
        WHERE codigo_usuario = p_codigo
    ) AS existe;
END $$

-- EXISTE CORREO
-- Verificar si un correo pertenece a otra cuenta
-- p_id_excluir = NULL para registro
-- p_id_excluir = ID del usuario para actualización
DELIMITER $$
CREATE PROCEDURE existeCorreo(
    IN p_correo VARCHAR(100),
    IN p_id_excluir INT
)
BEGIN
    SELECT EXISTS(
        SELECT 1
        FROM usuarios
        WHERE correo_electornico = p_correo
          AND (
              p_id_excluir IS NULL
              OR id_usuario <> p_id_excluir
          )
    ) AS existe;
END $$
DELIMITER ;


