
/* Drop Tables */

DROP TABLE IF EXISTS Producto;
DROP TABLE IF EXISTS Bodega;




/* Create Tables */

CREATE TABLE Bodega
(
	id_b serial NOT NULL,
	Nombre_Bodega varchar(255),
	Codigo_Bodega varchar(255),
	PRIMARY KEY (id_b)
) WITHOUT OIDS;


CREATE TABLE Producto
(
	id_p serial NOT NULL,
	Nombre_Producto varchar(255),
	Codigo_Producto varchar(255),
	Precio_Neto varchar(255),
	FK_id_b int NOT NULL,
	PRIMARY KEY (id_p)
) WITHOUT OIDS;



/* Create Foreign Keys */

ALTER TABLE Producto
	ADD FOREIGN KEY (FK_id_b)
	REFERENCES Bodega (id_b)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;



