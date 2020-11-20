CREATE DATABASE tienda_master;
use tienda_master;



CREATE TABLE categorias(
id int (255) auto_increment not null,
nombre varchar (100) not null,
CONSTRAINT pk_categorias PRIMARY KEY (id)


)ENGINE=InnoDb;
INSERT INTO categorias VALUES(null,'Franela');
INSERT INTO categorias VALUES(null,'Zapatos');
INSERT INTO categorias VALUES(null,'Chemise');
INSERT INTO categorias VALUES(null,'pantalones');
INSERT INTO categorias VALUES(null,'Chaquetas');
INSERT INTO categorias VALUES(null,'Camisas');


CREATE TABLE usuarios(
    id int (255) auto_increment not null,
    nombre varchar(100) not null,
    apellido varchar(255),
    pass varchar(255) not null,
    email varchar(255) not null ,
    fecha_registro date not null,
    rol varchar(20),
    img varchar(255),

    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)

)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(null,'Admin','Admin','pass','admin@admin',CURDATE(),'admin',null);


CREATE TABLE productos(
id int (255) auto_increment not null,
categoria_id int (255)not null,
nombre varchar(100) not null,
descripcion text,
stock int(100),
precio float(100,2),
img varchar(255),
fecha date not null,
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_productos_categorias FOREIGN KEY(categoria_id) REFERENCES categorias(id) 
)ENGINE=InnoDb;

CREATE TABLE pedidos(
    id int(255) auto_increment not null,
    usuario_id int(255) not null,
    Provincia varchar(255)not null,
    municipio varchar(255) not null,
    direccion varchar(255) not null,
    estado_pedido varchar(20) not null,
    fecha date,
    hora time,
    total_pedido float(200,2),

CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id) 

)ENGINE=InnoDb;



CREATE TABLE productos_pedido(
    id int(255) auto_increment not null,
    pedido_id int(255) not null,
    producto_id int(255) not null,
    unidades int(100) not null,

CONSTRAINT pk_linea_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_productos_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_productos_pedido FOREIGN KEY(producto_id) REFERENCES productos(id)

)ENGINE=InnoDb;