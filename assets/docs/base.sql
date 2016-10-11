
CREATE DATABASE IF NOT EXISTS wales DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE wales ;


-- -----------------------------------------------------
-- Modulo Acesso
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS permissoes(
	id INT AUTO_INCREMENT NOT NULL,
    descricao VARCHAR(45),
    permissao TEXT,
    
    PRIMARY KEY(id)
)DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS usuarios(
	id INT(10) AUTO_INCREMENT NOT NULL,
    nome VARCHAR(45),
    usuario VARCHAR(45),
    email VARCHAR(45),
    senha TEXT,
    id_permissao INT,
    PRIMARY KEY(id),
    
    CONSTRAINT fk_usuarios_permissoess FOREIGN KEY (id_permissao) REFERENCES permissoes (id)
)DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Tabela bairros
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS bairros (
  id INT(11) NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL UNIQUE KEY,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela tipo_logradouros
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS tipo_logradouros (
    id INT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL UNIQUE KEY,
    abreviacao VARCHAR(10) NULL,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela tipos
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS tipos (
    id INT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL UNIQUE KEY,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela ceps
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS ceps (
    id INT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(8) NULL UNIQUE KEY,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela logradouros
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS logradouros (
    id INT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(45) NULL UNIQUE KEY,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;



  -- -----------------------------------------------------
  -- Tabela estados
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS estados (
    id INT(10) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL UNIQUE KEY,
    sigla VARCHAR(4) NOT NULL DEFAULT 'rs',
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela cidades
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS cidades (
    id INT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL UNIQUE KEY,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;
  -- -----------------------------------------------------
  -- Tabela pessoas
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS pessoas (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    cpf VARCHAR(11),
    cnpj VARCHAR(15),
    rg VARCHAR(20),
    id_tipo_logradouros INT(11),
    idlogradouro INT(11),
    numero VARCHAR(50),
    complemento VARCHAR(50),
    id_bairro INT(11),
    id_cidade INT(11),
    id_estado INT(11),
    telefone VARCHAR(15),
    email VARCHAR(50),
    idcep INT(11),
    dt_nascimento DATE,
    id_tipo INT(11),
    observacao TEXT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_bairro FOREIGN KEY (id_bairro) REFERENCES bairros (id),
    CONSTRAINT fk_cidade FOREIGN KEY (id_cidade) REFERENCES cidades (id),
    CONSTRAINT fk_estado_pessoa FOREIGN KEY (id_estado) REFERENCES estados (id),
    CONSTRAINT fk_tipo_logradouro FOREIGN KEY (id_tipo_logradouros) REFERENCES tipo_logradouros (id),
    CONSTRAINT fk_tipo_pessoa FOREIGN KEY (id_tipo) REFERENCES tipos (id),
    CONSTRAINT fk_pessoas_cep FOREIGN KEY (idcep) REFERENCES ceps (id),
    CONSTRAINT fk_pessoas_logradouro FOREIGN KEY (idlogradouro) REFERENCES logradouros (id)
  )DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Modulo Financeiro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Tabela historicos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS historicos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Tabela contas
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS contas (
  id INT(11) NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela caixas
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS caixas (
    id INT(11) NOT NULL AUTO_INCREMENT,
    data DATE,
    id_historico INT(11),
    valor DECIMAL(9,2),
    liquidado ENUM('s', 'n'),
    id_conta INT(11),
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
      id INT(11) NOT NULL AUTO_INCREMENT,
      descricao VARCHAR(50) NOT NULL,
      PRIMARY KEY (id)
    )DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Tabela marcas
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS marcas (
  id INT(11) NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Tabela especie
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS especie (
  id INT(10) NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(45) NULL,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Tabela produtos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS produtos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50),
  vlr_compra DECIMAL(9,2),
  vlr_venda DECIMAL(9,2),
  codigo_barras VARCHAR(70),
  id_especie INT(11),
  id_marca INT(11) NULL,
  quantidade INT(11) NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_produtos_marca FOREIGN KEY (id_marca) REFERENCES marcas (id),
  CONSTRAINT fk_produtos_especie FOREIGN KEY (id_especie) REFERENCES especie (id)
)DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Tabela transacoes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS transacoes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  id_pessoa INT(11) NULL,
  vlr_total DECIMAL(9,2) NULL,
  id_caixa INT(11) NULL,
  desconto INT(3) NULL,
  id_natureza INT(11) NULL,
  observacao TEXT NULL,
  data DATE NULL,
  pago ENUM('S', 'N') NULL,
  id_conta INT(10) NULL,
  PRIMARY KEY (id),
  INDEX fk_compras_fornecedor_idx (id_pessoa ASC, id_conta ASC),
  UNIQUE INDEX idcompras_UNIQUE (id ASC),
  INDEX fk_compras_tipo_idx (id_natureza ASC),
  CONSTRAINT fk_compras_fornecedor FOREIGN KEY (id_pessoa) REFERENCES pessoas (id),
  CONSTRAINT fk_compras_tipo FOREIGN KEY (id_natureza) REFERENCES tipos (id),
  CONSTRAINT fk_transacoes_conta FOREIGN KEY (id_natureza) REFERENCES naturezas (id)
)DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Tabela transacao_produtos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS transacao_produtos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  idcompras INT(11) NULL,
  idtransacao INT(11) NULL,
  idproduto INT(11) NULL,
  quantidade SMALLINT(6) NULL,
  desconto_produto TINYINT(4) NULL,
  vlr_total DECIMAL(9,2) NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_compras_produtos_produtos FOREIGN KEY (idproduto) REFERENCES produtos (id),
  CONSTRAINT fk_compras_produtos_compra FOREIGN KEY (idtransacao) REFERENCES transacoes (id)
)DEFAULT CHARACTER SET = utf8;

-- Cria a view fornecedores
CREATE VIEW fornecedores AS SELECT * FROM pessoas WHERE id_tipo = 1;
CREATE VIEW cliente AS SELECT * FROM pessoas WHERE id_tipo = 2;
CREATE VIEW funcionario AS SELECT * FROM pessoas WHERE id_tipo = 3;

CREATE VIEW caixa AS SELECT DATE_FORMAT(ca.data, '%e/%c/%Y') as data, h.descricao as historico, ca.valor, REPLACE(REPLACE(ca.liquidado, 's','Sim' ),'n',' Não')
 as liquidado, c.descricao as conta, REPLACE(REPLACE(ca.tipo, 'd','Despesa' ),'r',' Receita') as tipo FROM caixa ca 
INNER JOIN historicos h ON (h.id=ca.id_historico)
INNER JOIN contas c ON (c.id=ca.id_conta);

CREATE VIEW total_caixa AS SELECT SUM(valor) FROM caixa;


INSERT INTO bairros (descricao) VALUES('Centro');

INSERT INTO tipo_logradouros (descricao) VALUES ('Aeroporto'),('Alameda'),('Área'),('Avenida'),('Campo'),('Chácara'),('Colônia'),('Condomínio'),('Conjunto'),('Distrito'),('Esplanada'),('Estação'),('Estrada'),('Favela'),('Feira'),('Jardim'),('Ladeira'),('Lago'),('Lagoa'),('Largo'),('Loteamento'),('Morro'),('Núcleo'),('Parque'),('Passarela'),('Pátio'),('Praça'),('Quadra'),('Recanto'),('Residencial'),('Rodovia'),('Rua'),('Setor'),('Sítio'),('Travessa'),('Trecho'),('Trevo'),('Vale'),('Vereda'),('Via'),('Viaduto'),('Viela'),('Vila');
INSERT INTO estados(descricao, sigla) VALUES ("Acre","AC") , ("Alagoas","AL") , ("Amapá","AP") , ("Amazonas","AM") , ("Bahia","BA") , ("Ceará","CE") , ("Distrito Federal","DF") , ("Espírito Santo","ES") , ("Goiás","GO") , ("Maranhão","MA") , ("Mato Grosso","MT") , ("Mato Grosso do Sul","MS") , ("Minas Gerais","MG") , ("Pará","PA") , ("Paraíba","PB") , ("Paraná","PR") , ("Pernambuco","PE") , ("Piauí","PI") , ("Rio de Janeiro","RJ") , ("Rio Grande do Norte","RN") , ("Rio Grande do Sul","RS") , ("Rondônia","RO") , ("Roraima","RR") , ("Santa Catarina","SC") , ("São Paulo","SP") , ("Sergipe","SE");
INSERT INTO cidades (descricao) VALUES ('Tramandaí');
INSERT INTO tipos (descricao) VALUES ('Fornecedores'), ('Clientes'), ('Funcionário');
