insert into usuarios values (null,'pepe','pepe@gmail.com');
select * from usuarios;

insert into pedidos values (null,1,null,'no');
select * from pedidos;


-- 1 Insertamos productos
insert into productos 
values 
(1, 'margarita',61.50),
(2, 'capriciosa',31.50),
(3, 'cuatro quesos',20.50),
(4, 'puttanesca',51.50),
(5, 'barbacoa',3.50)
;
-- 2 comprobamos productos - Empieza la aplicaicon para visitante
select * from productos;
-- 3 Insertar dos usuario un usuario
Insert into usuarios values (null, 'Paco','paco@gmail.com');
select * from usuarios;
select id_usuario from usuarios order by id_usuario  limit 1;
--
Insert into usuarios values (null, 'Perico','perico@gmail.com');
select id_usuario from usuarios order by id_usuario desc  limit 1;
select * from usuarios;
--4 Iniciamos un pedido sin confirmar
insert into pedidos values (null, 1,null,'no');
select * from pedidos;
--  5 Ver productos y seleccionamos detalles
select * from productos;
insert into detalles values 
(null, 1,3,2),
(null, 1,4,1);
-- 6 Ver productos seleccionados
select * 
from productos 
join detalles
on productos.id_producto = detalles.id_producto
join pedidos
on pedidos.id_pedido = detalles.id_pedido;
-- 6 Acabmos de momento
--7
-- CREATE VIEW pedidoDetalle AS
select 
pedidos.id_pedido as Pedido, 
productos.nombre_producto as Artículos,
detalles.cantidad as CANT, 
productos.precio_producto as Precio
from pedidos
join detalles
on pedidos.id_pedido = detalles.id_pedido
join productos
on productos.id_producto = detalles.id_producto;
where pedido =1;










