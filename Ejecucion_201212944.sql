
use textiles;


Drop procedure if exists admin;
Delimiter $
create procedure admin ()
BEGIN


        DECLARE productos int default 0;
        DECLARE `_rollback` BOOL DEFAULT 0;
		DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;
        Call Crear_Rol('Administrador');
        Call Crear_Rol('Usuario');
		Call Crear_Empresa('Textiles','hola','que','hacemos','ahora','que','ya','images/logo.png','images/banner.jpg','images/banner1.jpg','images/banner2.jpg','direccion@empresa.com','Guatemala, Ciudad calle zona','1234-5678');
        
        Call Registrar('spiderman', 'Luis Monzon', 'luismonzon@outlook.com', 1,1);
		Call Iniciar_Sesion('luismonzon@outlook.com', 'spiderman'); 
		Call Cerrar_Sesion(1);
		call eliminar_categoria(9);
        
Start transaction;
        Call Eliminar_Categoria(9);
        
		Call Crear_Categoria('ropa2','images/pic6.jpg');
		Call Crear_Categoria('joyas2','images/pic5.jpg');
		Call Crear_Categoria('zapatos2','images/pic4.jpg');
		Call Crear_Categoria('accesorios2','images/pic3.jpg');
		Call Crear_Categoria('tipicos','images/pic3.jpg');
		Call Crear_Categoria('exportables','images/pic2.jpg');
		Call Crear_Categoria('internacionales','images/pic1.jpg');
		Call Crear_Categoria('baratos','images/pic1.jpg');
		Call Crear_Categoria('caros','images/pic5.jpg');
		Call Crear_Categoria('simples','images/pic5.jpg'); 
        
IF `_rollback` THEN
        ROLLBACK;

    ELSE
        COMMIT;
    END IF;

Start transaction;		
   
		WHILE productos < 100 DO
			Call Crear_Articulo(productos,'Joya','img.jpg','es una joya',1050.50,1);
			SET productos=productos + 1;
		END WHILE;
		Call Crear_Red('Facebook',1,'www.facebook.com');
		
        Call Asignar_Articulo_Categoria(1,1);
        
        Call modificar_usuario('luismonzon@outlook.com','Jose','usac_bases',1,1);
        
IF `_rollback` THEN
        ROLLBACK;
    ELSE
        COMMIT;
    END IF;
    
    
END $
call admin();