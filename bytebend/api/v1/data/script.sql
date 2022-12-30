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
    nombreCaja varchar(80),
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
    nombreBancoEntidad varchar(150),
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


create table providers(
    id int primary key not null auto_increment,
    codigo varchar(50),
    tipoProveedor varchar(50),
    tipoPago varchar(50),
    telefono varchar(15),
    direccion varchar(250),
    correoElectronico varchar(150)
);


create table price_list(
    id int primary key not null auto_increment,
    nombreListaPrecio varchar(150),
    precio varchar(150)
);


create table discount_list(
    id int primary key not null auto_increment,
    nombreListaDescuento varchar(150),
    opcionDescuento varchar(10),
    porcentajeDescuento varchar(50),
    descuentoEspecifico varchar(50)
);


create table categories(
    id int primary key not null auto_increment,
    nombreCategoria varchar(80),
    listaDescuento int,
    FOREIGN KEY (listaDescuento) REFERENCES discount_list(id)
);


create table products(
    id int primary key not null auto_increment,
    codigo varchar(50),
    nombre varchar(150),
    descripcion varchar(250),
    cantidad varchar(150),
    estado int,
    localPertenece int,
    categoria int,
    proveedor int,
    precio int,
    FOREIGN KEY (localPertenece) REFERENCES locals(id),
    FOREIGN KEY (categoria) REFERENCES categories(id),
    FOREIGN KEY (proveedor) REFERENCES providers(id),
    FOREIGN KEY (precio) REFERENCES price_list(id)
);

create table return_clothes(
    id int primary key not null auto_increment,
    motivoCambio varchar(250),
    fotografia varchar(250),
    fechaYHora varchar(100),
    estado int,
    producto int,
    usuarioRecibe int,
    usuarioAutoriza int,
    FOREIGN KEY (producto) REFERENCES products(id),
    FOREIGN KEY (usuarioRecibe) REFERENCES employees(id),
    FOREIGN KEY (usuarioAutoriza) REFERENCES employees(id)
);


create table sale(
    id int primary key not null auto_increment,
    subtotal varchar(150),
    descuento varchar(150),
    totalPago varchar(150),
    metodoPago varchar(50),
    fechaFacturacion varchar(50),
    serieFactura varchar(250),
    numeroFactura varchar(250),
    noAutorizacion varchar(250),
    noAcceso varchar(250),
    dteFactura varchar(250),
    cliente int,
    productos int,
    empleadoFactura int,
    usuarioAutorizaDescuento int,
    empresa int,
    FOREIGN KEY (cliente) REFERENCES clients(id),
    FOREIGN KEY (productos) REFERENCES products(id),
    FOREIGN KEY (empleadoFactura) REFERENCES employees(id),
    FOREIGN KEY (usuarioAutorizaDescuento) REFERENCES employees(id),
    FOREIGN KEY (empresa) REFERENCES enterprice(id)
);







