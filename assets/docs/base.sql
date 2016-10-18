
CREATE DATABASE IF NOT EXISTS wales DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE wales;

-- o UNSIGNED pos o tipo int define que inicia com 0 o range de numeros
-- -----------------------------------------------------
-- Tabela bairros
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS bairros (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL UNIQUE KEY,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela tipo_logradouros
  -- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tipo_logradouros (
    id          SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    descricao   VARCHAR(50) NOT NULL UNIQUE KEY,
    abreviacao  VARCHAR(10) NULL,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela tipos
  -- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tipos (
  id          SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL UNIQUE KEY,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela ceps
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS ceps (
    id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
    descricao INT(8) ZEROFILL NULL UNIQUE KEY,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela logradouros
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS logradouros (
    id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(45) NULL UNIQUE KEY,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela estados
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS estados (
    id        SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL UNIQUE KEY,
    sigla     VARCHAR(4) NOT NULL DEFAULT 'rs',
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela cidades
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS cidades (
    id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL UNIQUE KEY,

    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;
  -- -----------------------------------------------------
  -- Tabela pessoas
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS pessoas (
    id                  INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome                VARCHAR(50) NOT NULL,
    cpf                 BIGINT(11) ZEROFILL UNIQUE KEY,
    cnpj                BIGINT(15) ZEROFILL UNIQUE KEY,
    rg                  VARCHAR(20),
    id_tipo_logradouros SMALLINT UNSIGNED,
    id_logradouro       INT UNSIGNED,
    numero              VARCHAR(50),
    complemento         VARCHAR(50),
    id_bairro           INT UNSIGNED,
    id_cidade           INT UNSIGNED,
    id_estado           SMALLINT UNSIGNED,
    telefone            VARCHAR(15),
    email               VARCHAR(50),
    id_cep              INT UNSIGNED,
    dt_nascimento       DATE,
    id_tipo             SMALLINT UNSIGNED,
    observacao          TEXT,
    PRIMARY KEY (id),
    CONSTRAINT fk_pessoa_tipo_logradouro FOREIGN KEY (id_tipo_logradouros) REFERENCES tipo_logradouros(id),
    CONSTRAINT fk_pessoa_logradouro      FOREIGN KEY (id_logradouro) REFERENCES logradouros(id),
    CONSTRAINT fk_pessoa_bairro 		 FOREIGN KEY (id_bairro) REFERENCES bairros(id),
    CONSTRAINT fk_pessoa_cidade			 FOREIGN KEY (id_cidade) REFERENCES cidades(id),
    CONSTRAINT fk_estado_pessoa 		 FOREIGN KEY (id_estado) REFERENCES estados(id),
    CONSTRAINT fk_pessoa_cep 			 FOREIGN KEY (id_cep) REFERENCES ceps(id),
    CONSTRAINT fk_pessoa_tipo 			 FOREIGN KEY (id_tipo) REFERENCES tipos(id)
  )DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Modulo Financeiro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Tabela historicos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS historicos (
  id INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL UNIQUE KEY,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Tabela contas
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS contas (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL UNIQUE KEY,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;


  -- -----------------------------------------------------
  -- Tabela caixas
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS caixa (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    data DATE,
    id_historico INT UNSIGNED,
    observacao VARCHAR(50),
    valor DECIMAL(9,2),
    liquidado ENUM('s', 'n'),
    id_conta INT UNSIGNED,
    tipo ENUM('d', 'r'),
    PRIMARY KEY (id),
    CONSTRAINT fk_historico FOREIGN KEY (id_historico) REFERENCES historicos (id),
    CONSTRAINT fk_caixa_conta FOREIGN KEY (id_conta) REFERENCES contas (id)
  )DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Modulo Estoque
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Tabela naturezas
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS naturezas (
  id INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL UNIQUE KEY,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Tabela marcas
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS marcas (
  id INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(45) NOT NULL UNIQUE KEY,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Tabela especie
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS especies (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(45) NULL UNIQUE KEY,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Tabela produtos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS produtos (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) UNIQUE KEY,
  vlr_compra DECIMAL(9,2),
  vlr_venda DECIMAL(9,2),
  codigo_barras VARCHAR(70) UNIQUE KEY,
  id_especie INT UNSIGNED,
  id_marca INT UNSIGNED NULL,
  quantidade INT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_produtos_marca FOREIGN KEY (id_marca) REFERENCES marcas (id),
  CONSTRAINT fk_produtos_especie FOREIGN KEY (id_especie) REFERENCES especies (id)
)DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Tabela transacoes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS transacoes (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  id_pessoa INT UNSIGNED,
  vlr_total DECIMAL(9,2),
  desconto INT(3),
  id_natureza INT UNSIGNED,
  observacao TEXT,
  data DATE,
  pago ENUM('S', 'N'),
  id_conta INT UNSIGNED,
  PRIMARY KEY (id),
  CONSTRAINT fk_transacoes_pessoa FOREIGN KEY (id_pessoa) REFERENCES pessoas (id),
  CONSTRAINT fk_transacoes_natureza FOREIGN KEY (id_natureza) REFERENCES naturezas (id),
  CONSTRAINT fk_transacoes_conta FOREIGN KEY (id_conta) REFERENCES contas (id)
)DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Tabela transacao_produtos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS transacao_produtos(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  id_transacao INT UNSIGNED ,
  id_produto INT UNSIGNED,
  quantidade SMALLINT UNSIGNED,
  desconto_produto TINYINT,
  vlr_total DECIMAL(9,2),
  PRIMARY KEY (id),
  CONSTRAINT fk_compras_produtos_produtos FOREIGN KEY (id_produto) REFERENCES produtos (id),
  CONSTRAINT fk_compras_produtos_compra FOREIGN KEY (id_transacao) REFERENCES transacoes (id)
)DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Modulo Acesso
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS permissoes(
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    descricao VARCHAR(45) UNIQUE KEY,
    permissao TEXT,

    PRIMARY KEY(id)
)DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS usuarios(
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    nome VARCHAR(45),
    usuario VARCHAR(45) UNIQUE KEY,
    email VARCHAR(45) UNIQUE KEY NOT NULL,
    senha VARCHAR(255) NOT NULL,
    id_permissao INT UNSIGNED,
    id_pessoa INT UNSIGNED,
    PRIMARY KEY(id),

    CONSTRAINT fk_usuarios_pessoa FOREIGN KEY (id_pessoa) REFERENCES pessoas(id),
    CONSTRAINT fk_usuarios_permissoes FOREIGN KEY (id_permissao) REFERENCES permissoes(id)
)DEFAULT CHARACTER SET = utf8;


-- Cria a view fornecedores
CREATE VIEW fornecedores AS SELECT * FROM pessoas WHERE id_tipo = 1;
CREATE VIEW cliente AS SELECT * FROM pessoas WHERE id_tipo = 2;
CREATE VIEW funcionario AS SELECT * FROM pessoas WHERE id_tipo = 3;

-- view com a tabela pessoas já relacionada
CREATE VIEW pessoas_finais AS SELECT p.id, p.nome, p.cpf, p.cnpj, p.rg, tp.descricao as tipo_logradouro, l.descricao as logradouro, e.descricao as estado, p.numero,
 p.complemento, b.descricao as bairro, c.descricao as cidade, c.descricao as cep,
p.telefone, p.email, DATE_FORMAT(p.dt_nascimento, '%e/%c/%Y') as data, t.descricao as tipo, p.observacao FROM pessoas p
INNER JOIN tipo_logradouros tp ON (p.id_tipo_logradouros=tp.id)
INNER JOIN logradouros l ON (p.id_logradouro = l.id)
INNER JOIN bairros b ON (b.id=p.id_bairro)
INNER JOIN cidades c ON (c.id=p.id_cidade)
INNER JOIN estados e ON (e.id=p.id_estado)
INNER JOIN tipos t ON (t.id=p.id_tipo);



CREATE VIEW caixa_final AS SELECT DATE_FORMAT(ca.data, '%e/%c/%Y') as data, h.descricao as historico, ca.observacao, ca.valor, REPLACE(REPLACE(ca.liquidado, 's','Sim' ),'n',' Não')
 as liquidado, c.descricao as conta, REPLACE(REPLACE(ca.tipo, 'd','Despesa' ),'r',' Receita') as tipo FROM caixa ca
INNER JOIN historicos h ON (h.id=ca.id_historico)
INNER JOIN contas c ON (c.id=ca.id_conta);

CREATE VIEW usuario AS SELECT u.usuario, u.nome, p.permissao FROM usuarios u
	INNER JOIN permissoes p ON (u.id_permissao=p.id);

CREATE VIEW total_caixa AS SELECT SUM(valor) FROM caixa;

INSERT INTO permissoes VALUE (1, 'Administrador', 'usuarios,1,1,1,1,|permissoes,1,1,1,1,');
INSERT INTO usuarios VALUE(1, 'Administrador', 'admin', 'admin@exemplo', '$2y$10$xftAzwIRyT9CRi.G5kB3w.jd2fveN66qlCDtb88zoac/1BQZM7wm6', 1, NULL);

INSERT INTO bairros (descricao) VALUES('Centro');

INSERT INTO tipo_logradouros (descricao) VALUES ('Aeroporto'),('Alameda'),('Área'),('Avenida'),('Campo'),('Chácara'),('Colônia'),('Condomínio'),('Conjunto'),('Distrito'),('Esplanada'),('Estação'),('Estrada'),('Favela'),('Feira'),('Jardim'),('Ladeira'),('Lago'),('Lagoa'),('Largo'),('Loteamento'),('Morro'),('Núcleo'),('Parque'),('Passarela'),('Pátio'),('Praça'),('Quadra'),('Recanto'),('Residencial'),('Rodovia'),('Rua'),('Setor'),('Sítio'),('Travessa'),('Trecho'),('Trevo'),('Vale'),('Vereda'),('Via'),('Viaduto'),('Viela'),('Vila');
INSERT INTO estados(descricao, sigla) VALUES ("Acre","AC") , ("Alagoas","AL") , ("Amapá","AP") , ("Amazonas","AM") , ("Bahia","BA") , ("Ceará","CE") , ("Distrito Federal","DF") , ("Espírito Santo","ES") , ("Goiás","GO") , ("Maranhão","MA") , ("Mato Grosso","MT") , ("Mato Grosso do Sul","MS") , ("Minas Gerais","MG") , ("Pará","PA") , ("Paraíba","PB") , ("Paraná","PR") , ("Pernambuco","PE") , ("Piauí","PI") , ("Rio de Janeiro","RJ") , ("Rio Grande do Norte","RN") , ("Rio Grande do Sul","RS") , ("Rondônia","RO") , ("Roraima","RR") , ("Santa Catarina","SC") , ("São Paulo","SP") , ("Sergipe","SE");
INSERT INTO cidades (descricao) VALUES ('Tramandaí');
INSERT INTO tipos VALUES (1,'Fornecedores'), (2,'Clientes'), (3,'Funcionário');
