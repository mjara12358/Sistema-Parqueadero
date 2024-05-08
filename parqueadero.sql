drop database if exists parqueadero;
create database parqueadero;
use parqueadero;

CREATE TABLE Tarifa (
    id INT (5) PRIMARY KEY AUTO_INCREMENT,
    tipoTarifa VARCHAR(50),
    valorHora dec(10,2),
    tipoVehiculo VARCHAR(50)
);

CREATE TABLE Empleado (
    id INT (5) PRIMARY KEY AUTO_INCREMENT,
    nombres VARCHAR(255),
    apellidos VARCHAR(255),
    telefono VARCHAR(20),
    tipoDocumento VARCHAR(50),
    numeroDocumento VARCHAR(20)
);

CREATE TABLE Vehiculo (
    id INT (5) PRIMARY KEY AUTO_INCREMENT,
    placa VARCHAR(20),
    tipoVehiculo VARCHAR(50),
    idEmpleado INT,
    FOREIGN KEY (idEmpleado) REFERENCES Empleado(id)
);

CREATE TABLE Ticket (
    id INT (5) PRIMARY KEY AUTO_INCREMENT,
    placa VARCHAR(50),
    tipoVehiculo VARCHAR(50),
    empleado VARCHAR(255),
    documento VARCHAR(100),
    fechaEntrada datetime,
    fechaSalida datetime,
    tarifa VARCHAR(255),
    total dec(10,2)
);

CREATE TABLE Servicio (
    id INT (5) PRIMARY KEY AUTO_INCREMENT,
    placa VARCHAR(50),
    empleado VARCHAR(100),
    fechaEntrada datetime,
    idTarifa INT,
    espacio INT(20),
    FOREIGN KEY (idTarifa) REFERENCES Tarifa(id)
);

CREATE TABLE admin(
id int(5) primary key auto_increment,
nombre varchar (100),
celular varchar(200),
tipoDocumento varchar(200),
documento varchar(200),
userName varchar(200),
contrasena varchar(200)
);
