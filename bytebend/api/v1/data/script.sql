create database fashion;


create table enterprice(
    id int primary key not null auto_increment,
    codigo varchar(50),
    nit varchar(50),
    nombreEmpresa varchar(150),
    telefono varchar(15),
    direccion varchar(250),
    correoElectronico varchar(150)
);


create table locals(
    id int primary key not null auto_increment,
    codigo varchar(50),
    nombreLocal varchar(150),
    telefono varchar(15),
    direccion varchar(250),
    correoElectronico varchar(150),
    empresaPertenece int,
    FOREIGN KEY (empresaPertenece) REFERENCES enterprice(empresaPertenece)
);


create table cash_registers(
    id int primary key not null auto_increment,
    codigo varchar(50),
    localPertenece int,
    FOREIGN KEY (localPertenece) REFERENCES locals(id)
);


create table clients(
    id int primary key not null auto_increment,
    codigo varchar(50),
    membresia varchar(25),
    codigoMembresia varchar(25),
    nit varchar(25),
    nombreCompleto varchar(150),
    direccion varchar(250),
    telefono varchar(15),
    correoElectronico varchar(150),
    puntosDisponibles varchar(50)
);


create table employees(
    id int primary key not null auto_increment,
    codigo varchar(50),
    departamento varchar(50),
    nombreCompleto varchar(150),
    dpiNit varchar(50),
    telefono varchar(15),
    direccion varchar(250),
    correoElectronico varchar(150),
    fechaNacimiento varchar(50),
    puesto varchar(50),
    salario varchar(50),
    usuario varchar(50),
    clave varchar(50),
    localPertenece int,
    cajaPertenece int,
    FOREIGN KEY (localPertenece) REFERENCES locals(id),
    FOREIGN KEY (cajaPertenece) REFERENCES cash_registers(id)
);

create table banks(
    id int primary key not null auto_increment,
    nommbreBancoEntidad varchar(150),
    tipoCuenta varchar(50),
    numeroCuenta varchar(150),
    aliasNombreCuenta varchar(50)
);

create table treasury(
    id int primary key not null auto_increment,
    tipoOperacion varchar(10),
    fechaYHoraInicio varchar(50),
    fechaYHoraFin varchar(50),
    noBoletaDeposito varchar(150),
    turno varchar(50),
    monto varchar(50),
    motivo varchar(250),
    banco int,
    usuario int,
    FOREIGN KEY (banco) REFERENCES banks(id),
    FOREIGN KEY (usuario) REFERENCES employees(id)
);




