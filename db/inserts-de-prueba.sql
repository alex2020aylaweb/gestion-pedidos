insert into usuarios values (null,'pepe','pepe@gmail.com');
select * from usuarios;


insert into pedidos values (null,1,null,'no');
select * from pedidos;


insert into productos values (2,'pantalon','31.50'),(3,'camisa','20.50'),(4,'chaqueta','51.50'),(5,'calcetines','3.50');
select * from productos;


insert into detalles values (1,1,3,2),(2,1,4,1);




select 
 pedidos.id_pedido as Pedido,
 productos.nombre_producto As Articulo,
 detalles.cantidad as Cant,
 productos.precio_producto as Precio
 from pedidos
 join detalles
 on pedidos.id_pedido = detalles.id_pedido
 join productos
 on productos.id_producto = detalles.id_producto;

 where Pedido =1;



