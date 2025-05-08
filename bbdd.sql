CREATE DATABASE IF NOT EXISTS gestion_proyectos;
USE gestion_proyectos;

CREATE TABLE IF NOT EXISTS usuarios (
	usuario_id int auto_increment primary key,
    nombre_u varchar(100) not null unique,
    contraseña_u varchar(100) not null
);

CREATE TABLE IF NOT EXISTS proyectos (
	proyecto_id int auto_increment primary key,
    nombre_p varchar(100) not null,
    descripcion text,
    fecha_inicio date,
    fecha_fin date
);

CREATE TABLE IF NOT EXISTS roles (
	rol_id int auto_increment primary key,
    nombre_r varchar(50) not null unique
);

CREATE TABLE IF NOT EXISTS proyectos_usuarios (
	proyecto_usuario_id int auto_increment primary key,
    proyecto_id int not null,
    usuario_id int not null,
    rol_id int not null,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos (proyecto_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios (usuario_id),
    FOREIGN KEY (rol_id) REFERENCES roles (rol_id)
);

CREATE TABLE IF NOT EXISTS estados (
	estado_id int auto_increment primary key,
    nombre_e varchar(50) not null unique
);

CREATE TABLE IF NOT EXISTS prioridades (
	prioridad_id int auto_increment primary key,
    nombre_p varchar(50) not null unique
);

CREATE TABLE IF NOT EXISTS tareas (
	tarea_id int auto_increment primary key,
    proyecto_id int not null,
    usuario_id int not null,
    titulo varchar(100) not null,
    estado_id int not null,
    prioridad_id int not null,
    FechaCreacion timestamp default current_timestamp,
    FechaLimite date,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos (proyecto_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios (usuario_id),
    FOREIGN KEY (estado_id) REFERENCES estados (estado_id),
    FOREIGN KEY (prioridad_id) REFERENCES prioridades (prioridad_id)
);

-- Insertar usuarios con contraseñas cifradas
INSERT INTO usuarios (nombre_u, contraseña_u) VALUES
('usuario1', SHA2('user1', 256)),
('usuario2', SHA2('user2', 256)),
('usuario3', SHA2('user3', 256)),
('usuario4', SHA2('user4', 256));

-- Insertar proyectos
INSERT INTO proyectos (nombre_p, descripcion, fecha_inicio, fecha_fin) VALUES
('Sistema de Gestión', 'Desarrollo de un sistema para la gestión de proyectos', '2024-01-10', '2024-06-30'),
('E-commerce', 'Creación de una tienda en línea', '2024-02-15', '2024-07-15');

-- Insertar roles
INSERT INTO roles (nombre_r) VALUES ('Creador'), ('Colaborador');

-- Insertar prioridades
INSERT INTO prioridades (nombre_p) VALUES ('Leve'), ('Moderado'), ('Urgente');

-- Insertar estados
INSERT INTO estados (nombre_e) VALUES ('Pendiente'), ('En Proceso'), ('Finalizado');

-- Insertar usuarios en proyectos con roles
INSERT INTO proyectos_usuarios (proyecto_id, usuario_id, rol_id) VALUES
(1, 1, 1),  -- usuario1 es Creador del proyecto 1
(1, 2, 2),  -- usuario2 es Colaborador en el proyecto 1
(2, 3, 1),  -- usuario3 es Creador del proyecto 2
(2, 4, 2);  -- usuario4 es Colaborador en el proyecto 2

-- Insertar tareas
INSERT INTO tareas (proyecto_id, usuario_id, titulo, estado_id, prioridad_id, FechaLimite) VALUES
(1, 1, 'Diseñar la base de datos', 1, 2, '2024-02-01'),
(1, 2, 'Crear la interfaz de usuario', 2, 3, '2024-03-01'),
(2, 3, 'Configurar pasarela de pago', 1, 3, '2024-04-15'),
(2, 4, 'Optimizar SEO', 2, 1, '2024-05-10');

-- Consultar los datos insertados
SELECT * FROM estados ORDER BY estado_id;
SELECT * FROM prioridades ORDER BY prioridad_id;
SELECT * FROM proyectos ORDER BY proyecto_id;
SELECT * FROM proyectos_usuarios ORDER BY proyecto_usuario_id;
SELECT * FROM roles ORDER BY rol_id;
SELECT * FROM tareas ORDER BY tarea_id;
SELECT * FROM usuarios ORDER BY usuario_id;
