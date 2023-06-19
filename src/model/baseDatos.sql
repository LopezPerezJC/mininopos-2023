/*
********
ADMIN
********
create table tiendas(id int not null auto_increment, nombre varchar(100), direccion varchar(150), telefono varchar(12), mail varchar(50), primary key(id));
create table usuarios (id int not null auto_increment, id_tienda int, username nvarchar(20), nombre varchar(100), contrasenia varchar(50), rol varchar(100), img_usuario MEDIUMBLOB, primary key(id), foreign key(id_tienda) references tiendas(id));
create table productos (id int not null auto_increment, id_tienda int, codigo varchar(20), nombre varchar(50), precio DECIMAL, existencias int, descripción varchar(150), img_producto MEDIUMBLOB, primary key(id), foreign key(id_tienda) references tiendas(id));


********
CLIENTE
********
create table ventas(id int not null auto_increment, id_tienda int, fecha date, hora time, num_productos int, total decimal, primary key(id), foreign key(id_tienda) references tiendas(id));
****create table listasProductoVenta(id not null auto_increment, id_tienda int, id_producto int, cantidad int, primary key(id), foreign key(id_tienda) references tiendas(id), foreign key(id_producto) references productos(id));
****ingresos(id int not null auto_increment, id_tienda int, id_venta, primary key(id), foreign key(id_tienda) references tiendas(id), foreign key(id_venta) references ventas(id));



**** adicional
bitacoraUsuarios(id int not null auto_increment, id_tienda int, id_usuario int, nombre_usuario varchar(100), rol_usuario varchar(50), hora_login time, hora_logout time, primary key(id), foreign key(id_tienda) references tiendas(id), foreign key(id_usuario) references usuarios(id));

*****INSERT PRUEBAS
INSERT INTO tienda values(1, "Tres Coronas", "Santos Reyes Pápalo, Cuicatlán, Oaxaca", "9513256997", "tresCoronas@gmail.com");
INSERT INTO usuarios values(1, 1, "lopezperezjc", "Juan Carlos López Pérez", "$P4rr0w5", "super-admin", "");
