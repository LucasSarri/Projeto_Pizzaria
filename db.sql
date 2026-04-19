use pizzaria_db;

create table bordas (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	tipo VARCHAR (100)
);

SELECT * from bordas;


create table massas (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	tipo VARCHAR (100)
);

SELECT * FROM massas;

create table sabores (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(100)
);

SELECT * FROM sabores;

create table pizzas (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	borda_id INT NOT NULL,
	massa_id INT NOT NULL,
	FOREIGN KEY (borda_id) REFERENCES bordas(id),
	FOREIGN KEY (massa_id) REFERENCES massas(id)
);

SELECT * FROM pizzas;

create table pizza_sabor (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	pizza_id INT NOT NULL,
	sabor_id INT NOT NULL,
	FOREIGN KEY (pizza_id) REFERENCES pizzas(id),
	FOREIGN KEY (sabor_id) REFERENCES sabores(id)
);

SELECT * from pizza_sabor;

create table status (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	tipo VARCHAR(100)
);

select * from status;

create table pedidos (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	pizza_id INT NOT NULL,
	status_id INT NOT NULL,
	FOREIGN KEY (pizza_id) REFERENCES pizzas(id),
	FOREIGN KEY (status_id) REFERENCES status(id)
);

select * from pedidos;

insert into status (tipo) values ("Em produção"), ("Em entrega"), ("Concluído");
insert into massas (tipo) values ("Massa comum"), ("Massa temperada"), ("Massa integral");
insert into bordas (tipo) values ("Cheddar"), ("Catupiry"), ("Chocolate");
insert into sabores (nome) values ("4 queijos"), ("Frango"), ("Lombo"), ("Calabresa"), ("Filé"), ("Brócolis"), ("Sorvete"), ("Prestígio");
