

CREATE TABLE `Sintoma`
(
 `idSintoma` integer NOT NULL ,
 `nome`      varchar(50) NOT NULL ,

PRIMARY KEY (`idSintoma`)
);


CREATE TABLE `Ingrediente`
(
 `idIngrediente` integer NOT NULL ,
 `nome`          varchar(50) NOT NULL ,

PRIMARY KEY (`idIngrediente`)
);





CREATE TABLE `Logins`
(
 `idLogins` integer NOT NULL ,
 `login`    varchar(50) NOT NULL ,
 `password` varchar(100) NULL ,

PRIMARY KEY (`idLogins`)
);




CREATE TABLE `Receita`
(
 `idReceita` integer NOT NULL ,
 `Nome`      varchar(50) NOT NULL ,
 `Email`     varchar(50) NOT NULL ,
 `Preparo`   varchar(500) NOT NULL ,
 `Imagem`    blob NOT NULL ,
 `Sintoma`   varchar(200) NOT NULL ,
 `Ingrediente`   varchar(200) NOT NULL ,
 `aprovado`  boolean NOT NULL ,

PRIMARY KEY (`idReceita`)
);







CREATE TABLE `REL_IngredienteReceita`
(
 `idReceita`     integer NOT NULL ,
 `idIngrediente` integer NOT NULL ,

KEY `FK_40` (`idReceita`),
CONSTRAINT `FK_38` FOREIGN KEY `FK_40` (`idReceita`) REFERENCES `Receita` (`idReceita`),
KEY `FK_43` (`idIngrediente`),
CONSTRAINT `FK_41` FOREIGN KEY `FK_43` (`idIngrediente`) REFERENCES `Ingrediente` (`idIngrediente`)
);



CREATE TABLE `REL_SintomaReceita`
(
 `idSintoma_1` integer NOT NULL ,
 `idReceita`   integer NOT NULL ,

KEY `FK_33` (`idSintoma_1`),
CONSTRAINT `FK_31` FOREIGN KEY `FK_33` (`idSintoma_1`) REFERENCES `Sintoma` (`idSintoma`),
KEY `FK_36` (`idReceita`),
CONSTRAINT `FK_34` FOREIGN KEY `FK_36` (`idReceita`) REFERENCES `Receita` (`idReceita`)
);

insert into logins (login,password) values ('detonlindo','lindomesmo');




