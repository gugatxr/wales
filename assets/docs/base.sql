
CREATE DATABASE IF NOT EXISTS gerenciamento_comercial DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE gerenciamento_comercial ;


-- -----------------------------------------------------
-- Modulo Acesso
-- -----------------------------------------------------

/*
	Aauth SQL Table Structure
*/


SET FOREIGN_KEY_CHECKS=0;



-- ----------------------------
-- Table structure for `aauth_groups`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_groups`;
CREATE TABLE `aauth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100),
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aauth_groups
-- ----------------------------
INSERT INTO `aauth_groups` VALUES ('1', 'Admin', 'Super Admin Group');
INSERT INTO `aauth_groups` VALUES ('2', 'Public', 'Public Access Group');
INSERT INTO `aauth_groups` VALUES ('3', 'Default', 'Default Access Group');

-- ----------------------------
-- Table structure for `aauth_perms`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_perms`;
CREATE TABLE `aauth_perms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100),
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aauth_perms
-- ----------------------------

-- ----------------------------
-- Table structure for `aauth_perm_to_group`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_perm_to_group`;
CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aauth_perm_to_group
-- ----------------------------

-- ----------------------------
-- Table structure for `aauth_perm_to_user`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_perm_to_user`;
CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aauth_perm_to_user
-- ----------------------------

-- ----------------------------
-- Table structure for `aauth_pms`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_pms`;
CREATE TABLE `aauth_pms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) unsigned NOT NULL,
  `receiver_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aauth_pms
-- ----------------------------

-- ----------------------------
-- Table structure for `aauth_users`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_users`;
CREATE TABLE `aauth_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(64) COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_general_ci,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text COLLATE utf8_general_ci,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text COLLATE utf8_general_ci,
  `verification_code` text COLLATE utf8_general_ci,
  `totp_secret` varchar(16) COLLATE utf8_general_ci DEFAULT NULL,
  `ip_address` text COLLATE utf8_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of aauth_users
-- ----------------------------
INSERT INTO `aauth_users` VALUES ('1', 'admin@example.com', 'dd5073c93fb477a167fd69072e95455834acd93df8fed41a2c468c45b394bfe3', 'Admin', '0', null, null, null, null, null, null, null, null, '0');

-- ----------------------------
-- Table structure for `aauth_user_to_group`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_user_to_group`;
CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aauth_user_to_group
-- ----------------------------
INSERT INTO `aauth_user_to_group` VALUES ('1', '1');
INSERT INTO `aauth_user_to_group` VALUES ('1', '3');

-- ----------------------------
-- Table structure for `aauth_user_variables`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_user_variables`;
CREATE TABLE `aauth_user_variables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aauth_user_variables
-- ----------------------------

-- ----------------------------
-- Table structure for `aauth_group_to_group`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_group_to_group`;
CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) unsigned NOT NULL,
  `subgroup_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`subgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aauth_group_to_group
-- ----------------------------

-- ----------------------------
-- Table structure for `aauth_login_attempts`
-- ----------------------------

CREATE TABLE IF NOT EXISTS `aauth_login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(39) DEFAULT '0',
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aauth_login_attempts
-- ----------------------------


-- -----------------------------------------------------
-- Modulo Pessoal
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Tabela bairros
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS bairros (
  id INT(11) NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela tipo_logradouros
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS tipo_logradouros (
    id INT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL,
    abreviacao VARCHAR(10) NULL,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela tipos
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS tipos (
    id INT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela ceps
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS ceps (
    id INT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(7) NULL,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela logradouros
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS logradouros (
    id INT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(45) NULL,
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;



  -- -----------------------------------------------------
  -- Tabela estados
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS estados (
    id INT(10) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL,
    sigla VARCHAR(4) NOT NULL DEFAULT 'rs',
    PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela cidades
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS cidades (
    id INT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL,
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
  descricao VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
)DEFAULT CHARACTER SET = utf8;

  -- -----------------------------------------------------
  -- Tabela caixa
  -- -----------------------------------------------------
  CREATE TABLE IF NOT EXISTS caixa (
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





INSERT INTO bairros (descricao) VALUES('Centro');

INSERT INTO tipo_logradouros (descricao) VALUES ('Aeroporto'),('Alameda'),('Área'),('Avenida'),('Campo'),('Chácara'),('Colônia'),('Condomínio'),('Conjunto'),('Distrito'),('Esplanada'),('Estação'),('Estrada'),('Favela'),('Feira'),('Jardim'),('Ladeira'),('Lago'),('Lagoa'),('Largo'),('Loteamento'),('Morro'),('Núcleo'),('Parque'),('Passarela'),('Pátio'),('Praça'),('Quadra'),('Recanto'),('Residencial'),('Rodovia'),('Rua'),('Setor'),('Sítio'),('Travessa'),('Trecho'),('Trevo'),('Vale'),('Vereda'),('Via'),('Viaduto'),('Viela'),('Vila');
INSERT INTO estados(descricao, sigla) VALUES ("Acre","AC") , ("Alagoas","AL") , ("Amapá","AP") , ("Amazonas","AM") , ("Bahia","BA") , ("Ceará","CE") , ("Distrito Federal","DF") , ("Espírito Santo","ES") , ("Goiás","GO") , ("Maranhão","MA") , ("Mato Grosso","MT") , ("Mato Grosso do Sul","MS") , ("Minas Gerais","MG") , ("Pará","PA") , ("Paraíba","PB") , ("Paraná","PR") , ("Pernambuco","PE") , ("Piauí","PI") , ("Rio de Janeiro","RJ") , ("Rio Grande do Norte","RN") , ("Rio Grande do Sul","RS") , ("Rondônia","RO") , ("Roraima","RR") , ("Santa Catarina","SC") , ("São Paulo","SP") , ("Sergipe","SE");
INSERT INTO cidades (descricao) VALUES ('Tramandaí');
INSERT INTO tipos (descricao) VALUES ('Fornecedores'), ('Clientes'), ('Funcionário');
