-- Cria base de dados
CREATE DATABASE IF NOT EXISTS gerenciamento_comercial DEFAULT CHARACTER set utf8 DEFAULT COLLATE utf8_general_ci;

USE gerenciamento_comercial;

-- Tabela permissões
CREATE TABLE IF NOT EXISTS permissoes(
  id INT(10) AUTO_INCREMENT PRIMARY KEY,
  descricao VARCHAR(50) NOT NULL UNIQUE KEY,
  permissoes VARCHAR(50) NOT NULL
)DEFAULT CHARSET = utf8;


-- tabela usuarios
CREATE TABLE IF NOT EXISTS usuarios(
  id INT(10) PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  usuario VARCHAR(45) NOT NULL UNIQUE KEY,
  email VARCHAR(45) NOT NULL,
  senha VARCHAR(200) NOT NULL,
  id_permissoes INT(10) NOT NULL,

  CONSTRAINT PrkPermissoes FOREIGN KEY (id_permissoes) REFERENCES permissoes(id)
)DEFAULT CHARSET = utf8;

-- tabela estados
CREATE TABLE IF NOT EXISTS estados(
	id INT(10) PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL UNIQUE KEY,
    sigla VARCHAR(4) NOT NULL UNIQUE KEY DEFAULT 'rs'

)DEFAULT CHARSET = utf8;

-- Tabela Cidades
CREATE TABLE IF NOT EXISTS cidades(
	  id INT(10) PRIMARY KEY AUTO_INCREMENT,
      descricao VARCHAR(50) NOT NULL UNIQUE KEY
)DEFAULT CHARSET = utf8;

-- Tabela Bairros
CREATE TABLE IF NOT EXISTS bairros(
	id INT(10) PRIMARY KEY AUTO_INCREMENT,
	descricao VARCHAR(50) NOT NULL UNIQUE KEY
)DEFAULT CHARSET = utf8;


-- Tabela Ceps
CREATE TABLE IF NOT EXISTS ceps(
	idceps INT(10) PRIMARY KEY AUTO_INCREMENT,
	descricao VARCHAR(7) NOT NULL UNIQUE KEY
)DEFAULT CHARSET = utf8;


-- Tabela com tipo logradouros. Ex.: rua, avenida, estrada...
CREATE TABLE IF NOT EXISTS tipo_logradouros(
	id INT(10) PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL UNIQUE KEY
)DEFAULT CHARSET = utf8;


-- tabela para definir os tipos de pessoas e transacoes.EX.: Cliente, fornecedor, venda, compra, funcionario
CREATE TABLE IF NOT EXISTS tipos(
	id INT(10) AUTO_INCREMENT NOT NULL,
    descricao VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)

) DEFAULT CHARSET = utf8;


-- Tabela Logradouros
-- ex.: Fernandes bastos. Maua...
CREATE TABLE IF NOT EXISTS logradouros(
	idlogradouro INT(10) PRIMARY KEY AUTO_INCREMENT,
	descricao VARCHAR(50) NOT NULL UNIQUE KEY
)DEFAULT CHARSET = utf8;


-- Tabela pessoas
CREATE TABLE IF NOT EXISTS pessoas(
	id INT(10) PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    cpf VARCHAR(11),
    cnpj VARCHAR(15),
    rg VARCHAR(20),
    id_tipo_logradouros INT(10),
    idlogradouro INT(10),
    numero VARCHAR(50),
    complemento VARCHAR(50),
    id_bairro INT(10),
    id_cidade INT(10),
    id_estado INT(50),
    telefone VARCHAR(15),
    email VARCHAR(50),
    idceps INT(10),
    dt_nascimento DATE,
    id_tipo INT(10),
    observacao TEXT,


	CONSTRAINT fk_tipo_logradouro FOREIGN KEY (id_tipo_logradouros) REFERENCES tipo_logradouros(id),
	CONSTRAINT fk_bairro FOREIGN KEY (id_bairro) REFERENCES bairros(id),
	CONSTRAINT fk_cidade FOREIGN KEY (id_cidade) REFERENCES cidades(id),
    CONSTRAINT fk_tipo_pessoa FOREIGN KEY (id_tipo) REFERENCES tipos(id),
	CONSTRAINT fk_estado_pessoa FOREIGN KEY (id_estado) REFERENCES estados(id),
    CONSTRAINT fkpessoa_logradouro FOREIGN KEY (idlogradouro) REFERENCES logradouros(idlogradouros),
    CONSTRAINT fkpessoa_ceps FOREIGN KEY (idceps) REFERENCES ceps(idceps)

)DEFAULT CHARSET = utf8;

CREATE TABLE naturezas(
	id INT(10) AUTO_INCREMENT NOT NULL,
    descricao VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
) DEFAULT CHARSET = utf8;

CREATE TABLE produtos(
	id INT(10) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50),
	vlr_compra DECIMAL(9,2),
    vlr_venda DECIMAL(9,2),
    codigo_barras VARCHAR(70),
    id_natureza INT(10),
    PRIMARY KEY(id),

    CONSTRAINT fk_produtos_naturezas FOREIGN KEY (id_natureza) REFERENCES naturezas(id)

)DEFAULT CHARSET = utf8;

-- ##################################################
-- area financeira


-- tabela para contas
-- ex.: despesas, vendas, compras...
CREATE TABLE IF NOT EXISTS contas(
	id INT4 PRIMARY KEY AUTO_INCREMENT,
	descricao VARCHAR(50) NOT NULL UNIQUE KEY
)DEFAULT CHARSET = utf8;



 -- Tabela Historico
CREATE TABLE IF NOT EXISTS historicos(
	  id INT4 PRIMARY KEY AUTO_INCREMENT,
      descricao VARCHAR(50) NOT NULL UNIQUE KEY
)DEFAULT CHARSET = utf8;

-- Tabela Caixa
-- tipo se refere a despesa ou receita.
CREATE TABLE IF NOT EXISTS caixa(
  id INT4 AUTO_INCREMENT,
  data DATE,
  id_historico INT4,
  valor decimal(9,2),
  liquidado enum('s','n'),
  id_conta INT4,
  tipo enum('d','r'),

  PRIMARY KEY (id),
  CONSTRAINT fkcaixa_historico FOREIGN KEY (id_historico) REFERENCES historicos(id),
  CONSTRAINT fkCaixa_conta FOREIGN KEY (id_conta) REFERENCES contas(id)

)DEFAULT CHARSET = utf8;


-- transacoes   ##################################################################

-- tabela transacoes.
-- Ex.: para definir dados de compras ou vendas.
CREATE TABLE IF NOT EXISTS transacoes(

      id INT4 AUTO_INCREMENT,
	  id_pessoa INT4,
      vlr_total DECIMAL(9,2),
      id_caixa INT4,
      desconto INT1,

      PRIMARY KEY (id),
)DEFAULT CHARSET = utf8;




INSERT INTO permissoes VALUE (NULL, 'Administrador', 'usuarios,1,1,1,1,|permissoes,1,1,1,1,');

INSERT INTO usuarios (nome, usuario, email, senha, id_permissoes) VALUE ('Administrador', 'admin', 'admin@admin', '$2y$10$rmw0jqC8VV5k0w.ppcPqBOfnuwSMgWf7FqDuYCmllQX.Vk4Y74Oi2', 1);

INSERT INTO bairros (descricao) VALUES('Centro');

INSERT INTO tipo_logradouros (descricao) VALUES ('Aeroporto'),('Alameda'),('Área'),('Avenida'),('Campo'),('Chácara'),('Colônia'),('Condomínio'),('Conjunto'),('Distrito'),('Esplanada'),('Estação'),('Estrada'),('Favela'),('Feira'),('Jardim'),('Ladeira'),('Lago'),('Lagoa'),('Largo'),('Loteamento'),('Morro'),('Núcleo'),('Parque'),('Passarela'),('Pátio'),('Praça'),('Quadra'),('Recanto'),('Residencial'),('Rodovia'),('Rua'),('Setor'),('Sítio'),('Travessa'),('Trecho'),('Trevo'),('Vale'),('Vereda'),('Via'),('Viaduto'),('Viela'),('Vila');
INSERT INTO estados(descricao, sigla) VALUES ("Acre","AC") , ("Alagoas","AL") , ("Amapá","AP") , ("Amazonas","AM") , ("Bahia","BA") , ("Ceará","CE") , ("Distrito Federal","DF") , ("Espírito Santo","ES") , ("Goiás","GO") , ("Maranhão","MA") , ("Mato Grosso","MT") , ("Mato Grosso do Sul","MS") , ("Minas Gerais","MG") , ("Pará","PA") , ("Paraíba","PB") , ("Paraná","PR") , ("Pernambuco","PE") , ("Piauí","PI") , ("Rio de Janeiro","RJ") , ("Rio Grande do Norte","RN") , ("Rio Grande do Sul","RS") , ("Rondônia","RO") , ("Roraima","RR") , ("Santa Catarina","SC") , ("São Paulo","SP") , ("Sergipe","SE");
INSERT INTO cidades (descricao) VALUES ('Tramandaí');
INSERT INTO tipos (descricao) VALUES ('Fornecedores'), ('Clientes'), ('Funcionário');
-- SELECT b.descricao, c.descricao, e.descricao FROM bairros b
-- INNER JOIN cidades c ON (b.id_cidade=c.id)
-- INNER JOIN estados e ON (e.id=c.id_estado);
