drop database if exists gestionpedidos;
create database gestionpedidos;
use gestionpedidos;


drop table if exists productos; -- borra campos y contenidos. truncate borra solo contenidos */
create table productos(
id_producto int auto_increment,
nombre_producto varchar (99),
precio_producto decimal (6,2), -- decimal es mas rapido que el float y funciona como string */
primary key (id_producto)
);

drop table if exists usuarios;
create table usuarios(
id_usuario int auto_increment,
nombre_usuario varchar (99), 
email_usuario varchar (99),
primary key (id_usuario)
);

drop table if exists pedidos;
create table pedidos(
id_pedido int auto_increment,
id_usuario int not null,
fecha_pedido timestamp,
confirmar_pedido char(2) default 'no', -- ponemos 2 para poder elegir entre si y no */
primary key (id_pedido),
constraint fk_usuarios_id_usuario -- Esto solo es un nombre de referencia para nosotros constrenimos la id_usuarios a pedidos con foreign key para que si se borra algo borre lo enlazado en otras tablas */
foreign key (id_usuario) references usuarios(id_usuario)
on delete CASCADE -- SI EL ADMINISTRADOR BORRA UN USUARIO DEBE BORRAR SUS PEDIDOS EN CASCADE otra cosa sería RESTRICT */
ON UPDATE restrict -- en caso de modificar no dejamos hacerlo con RESTRICT */
);

drop table if exists detalles; -- podemos imaginarnos que es un carrito en la vista pero no en el dato */
create table detalles (
id_detalle int auto_increment,
id_pedido int not null,
id_producto int,
cantidad int not null,
primary key (id_detalle),
constraint fk_detalles_pedido -- fk nombre puesto por nosotros para que podamos identificar el foreign key que usa*/
foreign key (id_pedido) references pedidos(id_pedido)
on delete CASCADE
on update restrict,
constraint fk_detalles_producto -- fk nombre puesto por nosotros para que podamos identificar el foreign key que usa*/
foreign key (id_producto) references productos(id_producto)
on delete cascade -- nos interesa conservar el pedido que se hizo pero sin valor alguno, sólo para tenerlo de referencia*/
on update restrict
);



-- ///////////// DESDE AQUÍ CÓDIGO DE cano cuadra //////////////////

drop database if exists gestionpedidos;
create database gestionpedidos;
use gestionpedidos;
drop table if exists productos; 
create table productos (
    id_producto int auto_increment,
    nombre_producto varchar(99),
    precio_producto decimal(6,2),
    primary key (id_producto)
);
drop table if exists usuarios; 
create table usuarios (
    id_usuario int auto_increment,
    nombre_usuario varchar(99),
    email_usuario varchar(99),
     primary key (id_usuario)
);
drop table if exists pedidos; 
create table pedidos (
    id_pedido int auto_increment,
    id_usuario int not null,
    fecha_pedido timestamp,
    confirmar_pedido char(2) default 'no',
     primary key (id_pedido),
     constraint fk_pedido_usuarios
     foreign key (id_usuario) references usuarios(id_usuario)
     on delete CASCADE
     on update RESTRICT
);
drop table if exists detalles; 
create table detalles(
    id_detalle int auto_increment,
    id_pedido  int not null,
    id_producto  int not null,
    cantidad  int not null,
     primary key (id_detalle),
     constraint `fk_detalles_pedido`
     foreign key (id_pedido) references pedidos(id_pedido)
    on delete CASCADE
     on update RESTRICT,
     constraint fk_detalles_producto
     foreign key (id_producto)references productos(id_producto)
     on delete cascade
     on update RESTRICT
);drop database if exists gestionpedidos;
create database gestionpedidos;
use gestionpedidos;
drop table if exists productos; 
create table productos (
    id_producto int auto_increment,
    nombre_producto varchar(99),
    precio_producto decimal(6,2),
    primary key (id_producto)
);
drop table if exists usuarios; 
create table usuarios (
    id_usuario int auto_increment,
    nombre_usuario varchar(99),
    email_usuario varchar(99),
     primary key (id_usuario)
);
drop table if exists pedidos; 
create table pedidos (
    id_pedido int auto_increment,
    id_usuario int not null,
    fecha_pedido timestamp,
    confirmar_pedido char(2) default 'no',
     primary key (id_pedido),
     constraint fk_pedido_usuarios
     foreign key (id_usuario) references usuarios(id_usuario)
     on delete CASCADE
     on update RESTRICT
);
drop table if exists detalles; 
create table detalles(
    id_detalle int auto_increment,
    id_pedido  int not null,
    id_producto  int not null,
    cantidad  int not null,
     primary key (id_detalle),
     constraint `fk_detalles_pedido`
     foreign key (id_pedido) references pedidos(id_pedido)
    on delete CASCADE
     on update RESTRICT,
     constraint fk_detalles_producto
     foreign key (id_producto)references productos(id_producto)
     on delete cascade
     on update RESTRICT
);









