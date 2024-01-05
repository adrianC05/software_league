create database software_league_diagrama;

CREATE TABLE equipos (
        id INT PRIMARY KEY auto_increment,
        nombre VARCHAR(50) NOT NULL,
        inscripcion DECIMAL(5, 2),
        estado TINYINT NOT NULL,
        descripcion VARCHAR(150)
    );

CREATE TABLE jugadores (
        id INT PRIMARY KEY auto_increment,
        nombre VARCHAR(50) NOT NULL,
        apellido VARCHAR(50) NOT NULL,
        cedula INT NOT NULL,
        telefono VARCHAR(50) NOT NULL,
        genero TINYINT not null;
        semestre VARCHAR(50) NOT NULL,
        equipo_id INT,

        FOREIGN KEY (equipo_id) REFERENCES equipos(id)
    );

CREATE TABLE tipoSanciones (
        id INT PRIMARY key auto_increment,
        nombre VARCHAR(50) NOT NULL,
        numPartido_suspension INT NOT NULL,
        valor DECIMAL(5, 2) NOT NULL,
        descripcion VARCHAR(150)
    );

CREATE TABLE sanciones (
    id INT PRIMARY key auto_increment,
    tipoSancion_id INT NOT NULL,
    jugador_id INT NOT NULL,
    equipo_id INT NOT NULL,
    estado TINYINT NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY (tipoSancion_id) REFERENCES tipoSanciones(id),
    FOREIGN KEY (jugador_id) REFERENCES jugadores(id),
    FOREIGN KEY (equipo_id) REFERENCES equipos(id),
    unique key unique_sancion (
        tipoSancion_id,
        jugador_id,
        equipo_id,
        fecha
    )
);

CREATE TABLE horarios (
        id INT PRIMARY KEY auto_increment,
        dia DATE NOT NULL,
        hora TIME NOT NULL,
        equipo1_id INT NOT NULL,
        equipo2_id INT NOT NULL,
        descripcion VARCHAR(150),
        FOREIGN KEY (equipo1_id) REFERENCES equipos(id),
        FOREIGN KEY (equipo2_id) REFERENCES equipos(id)
    );

CREATE TABLE resultados (
        id INT PRIMARY KEY auto_increment,
        equipo_id INT NOT NULL,
        partidosJugados INT NOT NULL,
        partidosGanados INT NOT NULL,
        partidosEmpatados INT NOT NULL,
        partidosPerdidos INT NOT NULL,
        golesFavor INT NOT NULL,
        golesContra INT NOT NULL,
        diferenciaGoles INT NOT NULL,
        puntos INT NOT NULL,
        FOREIGN KEY (equipo_id) REFERENCES equipos(id),
        FOREIGN KEY (horario_id) REFERENCES horarios(id) ON DELETE CASCADE
    );

-- Grupos de equipos
CREATE TABLE grupos (
        id INT PRIMARY KEY auto_increment,
        nombre VARCHAR(50) NOT NULL,
        descripcion VARCHAR(150)
    );

-- Tabla intermedia para la relación muchos a muchos entre grupos y equipos
CREATE TABLE grupos_equipos (
        grupo_id INT NOT null,
        equipo_id INT NOT NULL,
        PRIMARY KEY (grupo_id, equipo_id),
        FOREIGN KEY (grupo_id) REFERENCES grupos_equipos(id),
        FOREIGN KEY (equipo_id) REFERENCES equipos(id)
    );

CREATE TABLE usuarios (
    id INT PRIMARY key auto_increment,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tipo_usuario VARCHAR(50) NOT NULL CHECK (tipo_usuario IN ('tesorero', 'administrador')),
    estado TINYINT NOT NULL
);

CREATE TABLE gastos (
    id INT PRIMARY key auto_increment,
    descripcion VARCHAR(150) NOT NULL,
    valor DECIMAL(5, 2) NOT NULL,
    fecha DATE NOT NULL,
);

CREATE TABLE egresos (
    id INT PRIMARY key auto_increment,
    descripcion VARCHAR(150) NOT NULL,
    valor DECIMAL(5, 2) NOT NULL,
    fecha DATE NOT NULL,
);
