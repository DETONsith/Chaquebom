CREATE TABLE Ingrediente (
  idIngrediente INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NULL,
  PRIMARY KEY(idIngrediente)
);

CREATE TABLE Sintoma (
  idSintoma INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NULL,
  buscasTotal INTEGER UNSIGNED NULL,
  PRIMARY KEY(idSintoma)
);

CREATE TABLE Receita (
  idReceita INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Sintoma_idSintoma INTEGER UNSIGNED NOT NULL,
  Ingrediente_idIngrediente INTEGER UNSIGNED NOT NULL,
  descricao VARCHAR(1000) NULL,
  imagem BLOB NULL,
  autorEmail VARCHAR(100) NULL,
  cliques INTEGER UNSIGNED NULL,
  nome VARCHAR(100) NULL,
  PRIMARY KEY(idReceita),
  INDEX Receita_FKIndex1(Ingrediente_idIngrediente),
  INDEX Receita_FKIndex2(Sintoma_idSintoma),
  FOREIGN KEY(Ingrediente_idIngrediente)
    REFERENCES Ingrediente(idIngrediente)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Sintoma_idSintoma)
    REFERENCES Sintoma(idSintoma)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE FormularioSugestao (
  idFormularioSugestao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Sintoma_idSintoma INTEGER UNSIGNED NOT NULL,
  Ingrediente_idIngrediente INTEGER UNSIGNED NOT NULL,
  email VARCHAR(100) NULL,
  descricao VARCHAR(1000) NULL,
  imagem BLOB NULL,
  estado BOOL NULL,
  PRIMARY KEY(idFormularioSugestao),
  INDEX FormularioSugestao_FKIndex2(Ingrediente_idIngrediente),
  INDEX FormularioSugestao_FKIndex2(Sintoma_idSintoma),
  FOREIGN KEY(Ingrediente_idIngrediente)
    REFERENCES Ingrediente(idIngrediente)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Sintoma_idSintoma)
    REFERENCES Sintoma(idSintoma)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Busca (
  idBusca INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Receita_idReceita INTEGER UNSIGNED NOT NULL,
  Sintoma_idSintoma INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idBusca),
  INDEX Busca_FKIndex1(Sintoma_idSintoma),
  INDEX Busca_FKIndex2(Receita_idReceita),
  FOREIGN KEY(Sintoma_idSintoma)
    REFERENCES Sintoma(idSintoma)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Receita_idReceita)
    REFERENCES Receita(idReceita)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


