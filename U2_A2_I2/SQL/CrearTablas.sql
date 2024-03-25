-- UnADM Programacion web 2
-- Cesar Antonio Vargas Rodriguez - ES1521204253 

-- base de datos en 000webhost: id21258147_progweb2 - Administrador - Progweb2#

 Create database if not EXISTS id21258147_progweb2;
 Use id21258147_progweb2;
 
CREATE TABLE IF NOT EXISTS Usuario(
    IDUsuario CHAR(4) NOT NULL PRIMARY KEY,
    Nombre VARCHAR(128) COLLATE utf8mb4_spanish2_ci NOT NULL,
    ApellidoPaterno VARCHAR(128) COLLATE utf8mb4_spanish2_ci NOT NULL,
    ApellidoMaterno VARCHAR(128) COLLATE utf8mb4_spanish2_ci NULL,
    Edad INT,
    Sexo VARCHAR(25),
    Email VARCHAR(128) NULL,
    TipoUsuario VARCHAR(3) NOT NULL, -- PDC=Personal del depto. de crédito y cobranza, PF=Padre de familia
    Password VARCHAR(64));

CREATE TABLE IF NOT EXISTS Pagos(
    FolioPago VARCHAR(10) NOT NULL PRIMARY KEY,
    IDUsuario CHAR(4) NOT NULL,
    Concepto VARCHAR(64) COLLATE utf8mb4_spanish2_ci NULL,
    Monto DECIMAL(9,2) UNSIGNED NOT NULL,
    MesPagado int not null,
    FechaPago DATETIME NOT NULL
    -- Not supported on free 000webhost database
    -- , FOREIGN KEY Pagos_Usuario IDUsuario REFERENCES Usuario(IDUsusario)
);

-- Not supported on free 000webhost database
-- Alter table pagos add FOREIGN KEY Pagos_Usuario (IDUsuario) REFERENCES usuario(IDUsuario)

INSERT INTO Usuario (
    IDUsuario,
    Nombre,
    ApellidoPaterno,
    ApellidoMaterno,
    Edad,
    Sexo,
    Email,
    TipoUsuario,
    Password)
VALUES ( '0000',
    'Administrador',
    'UnADM',
    'Prueba',
    27,
    'Hombre',
    'cesar.av.rodriguez@gmail.com',
    'PDC', -- Personal del depto. de cobranza
    'Progweb2#'),
    ( '9999',
    'Padre',
    'De',
    'Familia',
    24,
    'Hombre',
    'cesar.av.rodriguez@gmail.com',
    'PF', -- Padre de familia
    'Progweb2#');

-- https://stackoverflow.com/questions/1720244/create-new-user-in-mysql-and-give-it-full-access-to-one-database
-- answer by Kenorb
-- CREATE USER 'id21258147_administrador'@'localhost' IDENTIFIED BY 'Progewb2#';
-- GRANT ALL ON id21258147_progweb2.* TO 'id21258147_administrador'@'localhost';
-- User: id21258147_administrador (asignado por 000webhost) pwd: Progweb2# (configurado por usuario)
-- Alter user id21258147_administrador@localhost identified by 'Progweb2#';