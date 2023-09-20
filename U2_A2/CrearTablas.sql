-- UnADM Programacion web 2
-- Cesar Antonio Vargas Rodriguez - ES1521204253 

 -- Create database if not EXISTS id21258147_condominiotlalpan;
 -- Use id21258147_condominiotlalpan;
 
CREATE TABLE IF NOT EXISTS Usuario(
    IDUsuario CHAR(4) NOT NULL PRIMARY KEY,
    Nombre VARCHAR(128) COLLATE utf8mb4_spanish2_ci NOT NULL,
    ApellidoPaterno VARCHAR(128) COLLATE utf8mb4_spanish2_ci NOT NULL,
    ApellidoMaterno VARCHAR(128) COLLATE utf8mb4_spanish2_ci NULL,
    Departamento VARCHAR(64) COLLATE utf8mb4_spanish2_ci NULL,
    TipoUsuario VARCHAR(2) NOT NULL, -- AD=Administrador, CO=Condómino
    Password VARCHAR(64));

CREATE TABLE IF NOT EXISTS Pagos(
    FolioPago INT(11) NOT NULL PRIMARY KEY,
    IDUsuario CHAR(4) NOT NULL,
    Concepto VARCHAR(64) COLLATE utf8mb4_spanish2_ci NULL,
    Monto DECIMAL(9,2) UNSIGNED NOT NULL,
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
    Departamento,
    TipoUsuario,
    Password)
VALUES ( '0000',
    'Administrador',
    'Unadm',
    'Prueba',
    'Oficina',
    'AD',
    'Progweb2#'),
    ( '9999',
    'Condómino',
    'Unadm',
    'Tlalpan',
    '107',
    'CO',
    'Progweb2#');
