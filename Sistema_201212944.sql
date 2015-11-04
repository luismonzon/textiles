SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
SET SQL_SAFE_UPDATES = 0;

drop schema if exists textiles;
create schema textiles;
use textiles;
create table if not exists empresa(
empresa int not null Auto_INCREMENT,
nombre varchar (50) not null,
mensaje varchar(100) not null,
Descripcion varchar(1000) not null,
Mision varchar(1000) not null,
Vision varchar(1000) not null,
Slogan  varchar(1000) not null,
Historia varchar(1000) not null,
Logo varchar (50) not null,
portada1 varchar (50) not null,
portada2 varchar (50) not null,
portada3 varchar (50) not null,
direccion varchar (50) not null,
telefono varchar (50) not null,
email varchar (50) not null,
Constraint pk_Empresa Primary Key (empresa)
)ENGINE=InnoDB;



create table if not exists art(
id int not null,
nombre varchar (50) not null,
precio numeric not null,
Constraint pk_art Primary Key (id)
)ENGINE=InnoDB;



create table if not exists red(
red int not null AUTO_INCREMENT,
nombre varchar(50) not null,
tipo int not null,
enlace varchar(50) not null,
Constraint pk_Red Primary Key (red),
empresa int not null,
Constraint fk_Asigna_Red_e foreign  Key (empresa) references textiles.empresa(empresa)
) ENGINE=InnoDB;


create table if not exists rol
(
rol int not null AUTO_INCREMENT,
nombre varchar(50) not null,
Constraint pk_Rol Primary Key (rol)
)ENGINE=InnoDB;


create table if not exists usuario(
usuario int not null Auto_INCREMENT,
nombre varchar(50) not null,
correo varchar(50) not null,
contrasenia varchar(50) not null,
rol int not null,
empresa int,
constraint pk_usuario Primary Key (usuario),
constraint fk_usuario_rol foreign key (rol) references textiles.rol(rol),
constraint fk_usuario_emp foreign key (empresa) references textiles.empresa(empresa)
)ENGINE=InnoDB;



create table if not exists categoria(
categoria int not null AUTO_INCREMENT ,
nombre_categoria varchar(50) not null,
imagen varchar(50) not null,
Constraint pk_categoria Primary Key (categoria)
)ENGINE=InnoDB;


create table if not exists articulo(
articulo int not null ,
nombre varchar(50) not null,
imagen varchar(50) not null,
descripcion varchar(200) not null,
precio float not null,
empresa int not null,
Constraint pk_articulo Primary Key (articulo),
Constraint fk_articulo_empresa Foreign Key (empresa) references textiles.empresa(empresa)
)ENGINE=InnoDB;



create table if not exists asigna_articulo(
categoria int not null,
articulo int not null,
constraint pk_Asigna_Articulo Primary Key (categoria,articulo),
Constraint fk_asigna_cat Foreign key (categoria) references textiles.categoria(categoria),
Constraint fk_asigna_art Foreign key (articulo) references textiles.articulo(articulo)

)ENGINE=InnoDB;


create table if not exists  sesion(
registro int not null Auto_increment,
usuario int not null,
activo bool not null default false,
fecha_inicio datetime not null,
fecha_fin datetime,
constraint pk_sesion Primary Key (registro),
constraint fk_sesion_user Foreign Key (usuario) references textiles.usuario(usuario)
)ENGINE=InnoDB;


Drop procedure if exists  Iniciar_Sesion;
Delimiter $
create procedure  Iniciar_Sesion (  correo varchar(50),  pass varchar(50)) 
Begin
Declare user,sess INT DEFAULT null;

set pass=sha1(pass);
set user = (select usuario from usuario where usuario.correo = correo and usuario.contrasenia = pass);
set sess=(select usuario from sesion where usuario=user and activo=1 and fecha_fin is null);

if (user is not null) then
		if (sess is  null) then
			insert into sesion (usuario, fecha_inicio, activo) values (user,now(),true);
			select '1' as resultado;
		else
			select '2' as resultado;
		end if;
ELSE
	select '3' as resultado;
END IF;
End 
$

Drop procedure if exists Cerrar_Sesion;
Delimiter $
create procedure Cerrar_Sesion (in user int)
BEGIN
Declare us int default null;
CREATE or REPLACE VIEW activos AS SELECT usuario  FROM sesion where activo=1;
select usuario from activos where usuario=user into us;
if(us is not null) then
	update sesion set activo=0, fecha_fin=now() where usuario=user and activo=1 and fecha_fin is null;
    select 'Sesion finalizada';
else
	select 'Sesion no ha sido iniciada';
end if;
END $





Drop procedure if exists Registrar;
Delimiter $

Create procedure Registrar (in pass varchar(50), in nombr varchar(50), in email varchar(50), in rol_u int,in emp int)
Begin
Declare var,id_rol int default null;
set pass=sha1(pass);
set id_rol= (select rol from rol where rol=rol_u);
set var = (select  usuario from usuario where usuario.correo = email and usuario.contrasenia = pass);

	##CREAR
	if (var is null and id_rol is not null) then
		insert  into usuario (nombre,correo,contrasenia,rol, empresa) values (nombr,email, pass,id_rol, emp);
	elseif (id_rol is null) then
		select 'Error, El rol no existe';
	ELSE 
		select 'Error, Usuario Ya Existe';
	END IF;

End $


Drop procedure if exists Crear_Categoria;
Delimiter $

Create procedure Crear_Categoria (in nom varchar(50), in url varchar(50))
BEGIN

Declare cat int default null;
set cat = (select categoria from categoria where categoria.nombre_categoria= nom);

if(cat is null) then
	insert into categoria (nombre_categoria,imagen) values(nom,url);
    select '1' as resultado;
else	
	select '2' as resultado;
end if;
END $




Drop procedure if exists Modificar_Categoria;
Delimiter $

Create procedure Modificar_Categoria (in nom varchar(50), in url varchar(50), in cat int)
BEGIN


	if url is null then
		update categoria
        set nombre_categoria=nom
        where categoria=cat;
		select '1' as resultado;
	else
		update categoria
        set nombre_categoria=nom,
        imagen=url
        where categoria=cat;
		select '1' as resultado;

	end if;

END $

use textiles;

select * from categoria
Drop procedure if exists Crear_Articulo;
Delimiter $

Create procedure Crear_Articulo (in codigo int, in nomb varchar(50), in url varchar(50), in  des varchar(50), in prec float, in emp int)
BEGIN
Declare  cond  int  default null;
set cond = ( select articulo from articulo where articulo.articulo=codigo);

if(cond is null) then
	insert into articulo (articulo, nombre, imagen, descripcion, precio, empresa) values (codigo, nomb,url,des,prec, emp);
    select '1' as resultado;
else
	select '2' as resultado;
end if;

END $



Drop procedure if exists Asignar_Articulo_Categoria;
Delimiter $
Create procedure Asignar_Articulo_Categoria (in cat int, in art int)
BEGIN
Declare existe , tupla int default null;
set existe =( select  categoria from categoria,articulo where categoria.categoria= cat and articulo.articulo=art);
set tupla = (select categoria from asigna_articulo where asigna_articulo.categoria=cat and asigna_articulo.articulo=art);

if (existe is  not null and tupla is null)
then
	insert into asigna_articulo (articulo, categoria) values (art,cat);
	select '1' as resultado;
elseif(tupla is not null) 
then
	select '3' as resultado;
else
	select '2' as resultado;
End if;
END $

select * from articulo

Drop procedure if exists Desasignar_Articulo_Categoria;
Delimiter $
Create procedure Desasignar_Articulo_Categoria (in cat int, in art int)
BEGIN
Declare existe , tupla int default null;
set existe =( select  categoria from categoria,articulo where categoria.categoria= cat and articulo.articulo=art);
set tupla = (select categoria from asigna_articulo where asigna_articulo.categoria=cat and asigna_articulo.articulo=art);

if (existe is  not null and tupla is not null)
then
    DELETE FROM textiles.asigna_articulo
	WHERE articulo=art and categoria=cat;
	select '1' as resultado;
elseif(tupla is not null) 
then
	select '3' as resultado;
else
	select '2' as resultado;
End if;
END $

use textiles;


drop procedure if exists Crear_Red;
Delimiter $
Create procedure Crear_Red (in nom varchar(50), in tipo int, in enl varchar(50))
BEGIN
	
	if not exists((select red from red where nombre=nom)) then
		insert into red(nombre, tipo, enlace,empresa) values (nom,tipo,enl,1);
        select 1 as resultado;
	else
		select 2 as resultado;
    end if;
END; $

drop procedure if exists Guardar_Red;
Delimiter $
Create procedure Guardar_Red (in nom varchar(50), in tipo int, in enl varchar(50),in id int)
BEGIN
	if exists (select red from red where red = id) then
		UPDATE textiles.red
				SET
				nombre = nom,
				tipo =  tipo,
				enlace = enl
				WHERE red =id;
		select 1 as resultado;
    else 
		select 2 as resultado;
    end if;
END; $


drop procedure if exists Eliminar_Red;
Delimiter $
Create procedure Eliminar_Red (in id int)
BEGIN
	if exists (select red from red where red = id) then
		DELETE FROM textiles.red
		WHERE red=id;

		select 1 as resultado;
    else 
		select 2 as resultado;
    end if;
END; $




drop procedure if exists Crear_Rol;
Delimiter $
Create procedure Crear_Rol (in nom varchar(50))
BEGIN

	if not exists((select rol from rol where nombre=nom)) then
		insert into rol(nombre) values (nom);
	else
		select 'Error, ya existe un rol con ese nombre';
    end if;

END $




drop procedure if exists Crear;
Delimiter $
Create procedure Crear (in iden int, in nom varchar(50),in price numeric)
BEGIN

	if not exists((select id from art where id=iden)) then
		insert into art(id,nombre,precio) values (iden,nom,price);
		select '1' as resultado;
	else
		select '2' as resultado;
    end if;

END $


drop procedure if exists Leer;
Delimiter $
Create procedure Leer  (in iden int)
BEGIN
	select *  from art where id =iden;
END $



drop procedure if exists Crear_Empresa;
Delimiter $
Create procedure Crear_Empresa (in nom varchar(50), in vis varchar(1000), in mis varchar(1000), in mens varchar(1000), in slog varchar(1000), in History varchar(1000), in des varchar(100), in log varchar(50),in p1 varchar(50),in p2 varchar(50),in p3 varchar(50),in em varchar(50),in dir varchar(50),in tel varchar(50))
BEGIN

	
	if not exists((select nombre from empresa where nombre=nom)) then
		insert into empresa(nombre,mision, vision, mensaje,historia, slogan, descripcion,logo,portada1,portada2,portada3,email,direccion,telefono) values (nom,mis,vis,mens,history,slog,des,log,p1,p2,p3,em,dir,tel);
	else
		select 'Error, ya existe una empresa con ese nombre';
    end if;

END $



drop procedure if exists Crear_Tipo;
Delimiter $
Create procedure Crear_Tipo (in nom varchar(50))
BEGIN

	if not exists((select nombre from tipo where nombre=nom)) then
		insert into tipo(nombre) values (nom);
	else
		select 'Error, ya existe un tipo con ese nombre';
    end if;

END $

Drop procedure if exists Modificar_usuario;
Delimiter $
Create procedure Modificar_usuario(in email varchar(50), in nombr varchar(50), in pass varchar(50), in id_rol int, in emp int)
Begin

Declare var int default null;
set var = (select  usuario from usuario where usuario.correo = email);
	##MODIFICAR
    if(var is not null) then
		UPDATE textiles.usuario
				SET
				nombre = nombr,
				contrasenia = sha1(pass),
				rol = id_rol,
				empresa = emp				
                WHERE correo =email;
        select 'modificado' ;
	end if;
END $

Drop procedure if exists Modificar_Vision;
Delimiter $
Create procedure Modificar_Vision( in vis varchar(1000))
BEGIN
UPDATE textiles.empresa
SET 
Vision = vis
WHERE empresa = 1;
select 1 ;
END; $


Drop procedure if exists Modificar_Slogan;
Delimiter $
Create procedure Modificar_Slogan( in slog varchar(1000))
BEGIN
UPDATE textiles.empresa
SET 
Slogan = slog
WHERE empresa = 1;
select 1;
END; $

Drop procedure if exists Modificar_Historia;
Delimiter $
Create procedure Modificar_Historia( in his varchar(1000))
BEGIN
UPDATE textiles.empresa
SET

Historia = his
WHERE empresa = 1;
select 1 ;
END; $


Drop procedure if exists Modificar_Mision;
Delimiter $
Create procedure Modificar_Mision( in mis varchar(1000))
BEGIN
UPDATE textiles.empresa
SET
Mision = mis
WHERE empresa = 1;
select 1 ;
END $


Drop procedure if exists Modificar_Descripcion;
Delimiter $
Create procedure Modificar_Descripcion( in des varchar(1000))
BEGIN
UPDATE textiles.empresa
SET
Descripcion = des
WHERE empresa = 1;
select 1 ;
End $






Drop procedure if exists Modificar_Nombre_Empresa;
Delimiter $
Create procedure Modificar_Nombre_Empresa( in nom varchar(1000))
BEGIN
UPDATE textiles.empresa
SET
Nombre = nom
WHERE empresa = 1;

End $


Drop procedure if exists Modificar_Articulo;
Delimiter $
Create procedure Modificar_Articulo( in art int, in nomb varchar(50), in url varchar(50), in  des varchar(50), in prec float )
BEGIN

if  exists (select  articulo from articulo where articulo = art) then
	if url is null then
		UPDATE textiles.articulo
		SET
			nombre=nomb,
			descripcion=des,
			precio=prec
		WHERE articulo = art;
        select '1' as resultado;
	else
		UPDATE textiles.articulo
		SET
			nombre=nomb,
			imagen=url,
			descripcion=des,
			precio=prec
		WHERE articulo = art;
        select '1' as resultado;
    end if;
else
	select '2' as resultado;
end if;

END $

Drop procedure if exists Eliminar_Articulo;
Delimiter $
Create procedure Eliminar_Articulo( in art int )
BEGIN
if not exists (select articulo from asigna_articulo where articulo=art) then
	DELETE FROM articulo
	WHERE articulo=art;
	select '1' as resultado;
else 
	select '2' as resultado;
end if;
END $

call eliminar_articulo(2);


Drop procedure if exists Eliminar_Categoria;
Delimiter $
Create procedure Eliminar_Categoria( in cat int )
BEGIN

IF Exists (Select categoria from categoria where categoria= cat) then
	if not exists (select categoria from asigna_articulo where categoria= cat) then
		DELETE FROM categoria
		WHERE categoria=cat;
		Select '1' as resultado;
	else 
		select '3' as resultado;
	end if;
else
	Select '2' as resultado;
End If;

END $


Drop procedure if exists Get_Categorias;
Delimiter $
Create procedure Get_Categorias()
BEGIN
select categoria, nombre_categoria, imagen from categoria;

END $



Drop procedure if exists Get_Redes;
Delimiter $
Create procedure Get_Redes()
BEGIN
select red,nombre, enlace, tipo from red;
END $

Drop procedure if exists Get_Red;
Delimiter $
Create procedure Get_Red(in id int)
BEGIN
select red,nombre, enlace, tipo from red where red=id ;
END $




Drop procedure if exists Get_Categoria;
Delimiter $
Create procedure Get_Categoria(in cat int)
BEGIN
select categoria, nombre_categoria, imagen from categoria where categoria=cat ;

END $

Drop procedure if exists Get_Articulo;
Delimiter $
Create procedure Get_Articulo(in art int)
BEGIN
select articulo,nombre, imagen, descripcion, precio  from articulo where articulo=art ;

END $

select * from articulo
Drop procedure if exists Get_Empresa_Info;
Delimiter $
Create procedure Get_Empresa_Info(in emp int )
BEGIN
select * from empresa where empresa=emp;
END $


Drop procedure if exists Get_8_Categorias();
Delimiter $
Create procedure Get_8_Categorias(in numero int)
Begin
select categoria, nombre_categoria, imagen from categoria order by nombre_categoria limit numero;
End $


Drop procedure if exists Get_Articulos_Categoria;
Delimiter $
Create procedure Get_Articulos_Categoria(in cat int)
Begin
select * from textiles.articulo where articulo in (select articulo from asigna_articulo where categoria = cat);
End $



Drop procedure if exists Modificar_Empresa;
Delimiter $
Create procedure Modificar_Empresa(in vis varchar(1000),in mis varchar(1000),in slo varchar(1000),in hist varchar(1000),in msg varchar(1000),in des varchar(1000),in dir varchar (50), in em varchar (50), in tel varchar (50))
Begin
UPDATE empresa
SET
Mision = mis,
Vision = vis,
Slogan = slo,
Historia = hist,
Mensaje = msg,
Descripcion = des,
Direccion = dir,
Email = em,
Telefono = tel
WHERE empresa = 1;
select '1' as resultado;
End $

Drop procedure if exists Modificar_Empresa_Imagen;
Delimiter $
Create procedure Modificar_Empresa_Imagen(in id int, in url varchar(50))
Begin
if id =1 then
	UPDATE empresa
	SET
	portada1 = url
	WHERE empresa = 1;
	select '1' as resultado;
elseif id=2 then
	UPDATE empresa
	SET
	portada2 = url
	WHERE empresa = 1;
	select '1' as resultado;
elseif id=3 then
	UPDATE empresa
	SET
	portada3 = url
	WHERE empresa = 1;
	select '1' as resultado;
elseif id=4 then
	UPDATE empresa
	SET
	portada4 = url
	WHERE empresa = 1;
	select '1' as resultado;

end if;
End $


drop procedure if exists Get_Categoria_Asignada;
Delimiter $
create procedure Get_Categoria_Asignada(in art int)
BEGIN
select categoria, nombre_categoria from categoria where categoria in (select categoria from asigna_articulo where articulo =art);
END $


drop procedure if exists Cambiar_Imagen;
Delimiter $
create procedure Cambiar_Imagen(in imagen int, in url varchar(50) )
BEGIN
	
if imagen=4 then
    UPDATE empresa
	SET Logo = url
    WHERE empresa = 1;
elseif imagen=1 then    
     UPDATE empresa
	SET portada1 = url
    WHERE empresa = 1;
elseif imagen=2 then
     UPDATE empresa
	SET portada2 = url
    WHERE empresa = 1;
elseif imagen=3 then
     UPDATE empresa
	SET portada3 = url
    WHERE empresa = 1;
end if;
select 1 as resultado;
END $


drop procedure if exists Get_Categoria_No_Asignada;
Delimiter $
create procedure Get_Categoria_No_Asignada(in art int)
BEGIN
select categoria, nombre_categoria from categoria where categoria not in (select categoria from asigna_articulo where articulo =0);
END $