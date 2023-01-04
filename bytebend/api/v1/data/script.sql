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
    FOREIGN KEY (empresaPertenece) REFERENCES enterprice(id)
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

create table modules(
    id int primary key not null auto_increment,
    nombreModulo varchar(80),
    descripcionModulo varchar(80),
    rutaModulo varchar(500)
);

INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('treasury','Financiero','<a href="treasury"> <div class="p-2 green zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-money-bill h1 text-white"></i> </div><p class="card-text text-white text-center">Tesorería</p></div></div></a>');
INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('employees','Empleados','<a href="employees"> <div class="p-2 oranje zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-users h1 text-white"></i> </div><p class="card-text text-white text-center">Empleados</p></div></div></a>');
INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('products','Productos','<a href="products"> <div class="p-2 gray-card zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-list h1 text-white"></i> </div><p class="card-text text-white text-center">Inventario</p></div></div></a>');
INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('cash_registers','Cajas Registradoras','<a href="cash_registers"> <div class="p-2 blue zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-cash-register h1 text-white"></i> </div><p class="card-text text-white text-center">Cajas</p></div></div></a>');
INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('sale','Venta','<a href="sale"> <div class="p-2 green zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-cart-arrow-down h1 text-white"></i> </div><p class="card-text text-white text-center">Venta</p></div></div></a>');
INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('return_clothes','Devolución de Prendas','<a href="return_clothes"> <div class="p-2 oranje zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-shirt h1 text-white"></i> </div><p class="card-text text-white text-center">Devolución</p></div></div></a>');
INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('providers','Proveedores','<a href="providers"> <div class="p-2 gray-card zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-people-carry-box h1 text-white"></i> </div><p class="card-text text-white text-center">Proveedores</p></div></div></a>');
INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('clients','Clientes','<a href="clients"> <div class="p-2 purple zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-user-tie h1 text-white"></i> </div><p class="card-text text-white text-center">Clientes</p></div></div></a>');
INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('discount_list','Lista de Descuentos','<a href="discount_list"> <div class="p-2 purple zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-tag h1 text-white"></i> </div><p class="card-text text-white text-center">Lista Descuentos</p></div></div></a>');
INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('price_list','Lista de Precios','<a href="price_list"> <div class="p-2 blue zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-hand-holding-dollar h1 text-white"></i> </div><p class="card-text text-white text-center">Listas Precios</p></div></div></a>');
INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('locals','Locales','<a href="locals"> <div class="p-2 green zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-store h1 text-white"></i> </div><p class="card-text text-white text-center">Locales</p></div></div></a>');
INSERT INTO `modules`(`nombreModulo`, `descripcionModulo`, `rutaModulo`) VALUES ('reports','Reportes','<a href="reports"> <div class="p-2 oranje zoom-out rounded rounded-3"> <div class="card-body"> <div class="icon text-center p-4"> <i class="fa-solid fa-chart-pie h1 text-white"></i> </div><p class="card-text text-white text-center">Reportes</p></div></div></a>');


create table permissions(
    id int primary key not null auto_increment,
    nombrePermiso varchar(80),
    accionPermiso varchar(80),
    botonesHabilitados varchar(100)
);

INSERT INTO `permissions`(`nombrePermiso`, `accionPermiso`, `botonesHabilitados`) VALUES ('Administradores','Acciones Básicas','{"borrar":1,"editar":1}');
INSERT INTO `permissions`(`nombrePermiso`, `accionPermiso`, `botonesHabilitados`) VALUES ('Usuarios','Acciones Básicas','{"borrar":0,"editar":0}');


create table rol(
    id int primary key not null auto_increment,
    nombreRol varchar(100),
    descripcion varchar(250),
    moduloPertenece int,
    permisosPertenece int,
    FOREIGN KEY (moduloPertenece) REFERENCES modules(id),
    FOREIGN KEY (permisosPertenece) REFERENCES permissions(id)
);

INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',1,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',2,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',3,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',4,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',5,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',6,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',7,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',8,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',9,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',10,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',11,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('superAdmin','Super Administrador',12,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('bodega','Bodega',3,2);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('recursosHumanos','RRHH',2,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('finanzas','Contadores',1,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('finanzas','Contadores',12,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('ventas','Vendedores',5,1);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('ventas','Vendedores',6,2);
INSERT INTO `rol`(`nombreRol`, `descripcion`, `moduloPertenece`, `permisosPertenece`) VALUES ('ventas','Vendedores',8,2);


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
    rol int,
    FOREIGN KEY (localPertenece) REFERENCES locals(id),
    FOREIGN KEY (cajaPertenece) REFERENCES cash_registers(id),
    FOREIGN KEY (rol) REFERENCES rol(id)
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







