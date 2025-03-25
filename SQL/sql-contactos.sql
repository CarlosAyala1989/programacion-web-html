CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido_paterno VARCHAR(100) NOT NULL,
    apellido_materno VARCHAR(100) NOT NULL,
    correo_electronico VARCHAR(255) NOT NULL UNIQUE,
    telefono VARCHAR(20) NOT NULL,
    ubicacion VARCHAR(150) NOT NULL,
    empresa VARCHAR(150),
    puesto VARCHAR(100),
    mensaje TEXT NOT NULL
);
