-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema gerenciamento_comercial
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gerenciamento_comercial
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gerenciamento_comercial` DEFAULT CHARACTER SET utf8 ;
USE `gerenciamento_comercial` ;

-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`bairros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`bairros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `descricao` (`descricao` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`historicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`historicos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `descricao` (`descricao` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`contas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`contas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Contas para gerenciar despesas.\nEx.: Material escritório...';


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`caixa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`caixa` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `data` DATE NULL DEFAULT NULL,
  `id_historico` INT(11) NULL DEFAULT NULL,
  `valor` DECIMAL(9,2) NULL DEFAULT NULL,
  `liquidado` ENUM('s', 'n') NULL DEFAULT NULL,
  `id_conta` INT(11) NULL,
  `tipo` ENUM('d', 'r') NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_historico` (`id_historico` ASC),
  INDEX `fk_caixa_conta_idx` (`id_conta` ASC),
  CONSTRAINT `fk_historico`
    FOREIGN KEY (`id_historico`)
    REFERENCES `gerenciamento_comercial`.`historicos` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_caixa_conta`
    FOREIGN KEY (`id_conta`)
    REFERENCES `gerenciamento_comercial`.`contas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`cidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`cidades` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `descricao` (`descricao` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`estados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`estados` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  `sigla` VARCHAR(4) NOT NULL DEFAULT 'rs',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `descricao` (`descricao` ASC),
  UNIQUE INDEX `sigla` (`sigla` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`naturezas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`naturezas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`permissoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`permissoes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  `permissoes` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `descricao` (`descricao` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`tipo_logradouros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`tipo_logradouros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  `abreviacao` VARCHAR(10) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `descricao` (`descricao` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 44
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`tipos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`ceps`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`ceps` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(7) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`logradouros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`logradouros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`pessoas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`pessoas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cpf` VARCHAR(11) NULL DEFAULT NULL,
  `cnpj` VARCHAR(15) NULL DEFAULT NULL,
  `rg` VARCHAR(20) NULL DEFAULT NULL,
  `id_tipo_logradouros` INT(11) NULL DEFAULT NULL,
  `idlogradouro` INT(11) NULL DEFAULT NULL,
  `numero` VARCHAR(50) NULL DEFAULT NULL,
  `complemento` VARCHAR(50) NULL DEFAULT NULL,
  `id_bairro` INT(11) NULL DEFAULT NULL,
  `id_cidade` INT(11) NULL DEFAULT NULL,
  `id_estado` INT(11) NULL DEFAULT NULL,
  `telefone` VARCHAR(15) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `idcep` INT(11) NULL DEFAULT NULL,
  `dt_nascimento` DATE NULL DEFAULT NULL,
  `id_tipo` INT(11) NULL DEFAULT NULL,
  `observacao` VARCHAR(200) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tipo_logradouro` (`id_tipo_logradouros` ASC),
  INDEX `fk_bairro` (`id_bairro` ASC),
  INDEX `fk_cidade` (`id_cidade` ASC),
  INDEX `fk_tipo_pessoa` (`id_tipo` ASC),
  INDEX `fk_estado_pessoa` (`id_estado` ASC),
  INDEX `fk_pessoas_cep_idx` (`idcep` ASC),
  INDEX `fk_pessoas_logradouro_idx` (`idlogradouro` ASC),
  CONSTRAINT `fk_bairro`
    FOREIGN KEY (`id_bairro`)
    REFERENCES `gerenciamento_comercial`.`bairros` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_cidade`
    FOREIGN KEY (`id_cidade`)
    REFERENCES `gerenciamento_comercial`.`cidades` (`id`),
  CONSTRAINT `fk_estado_pessoa`
    FOREIGN KEY (`id_estado`)
    REFERENCES `gerenciamento_comercial`.`estados` (`id`),
  CONSTRAINT `fk_tipo_logradouro`
    FOREIGN KEY (`id_tipo_logradouros`)
    REFERENCES `gerenciamento_comercial`.`tipo_logradouros` (`id`),
  CONSTRAINT `fk_tipo_pessoa`
    FOREIGN KEY (`id_tipo`)
    REFERENCES `gerenciamento_comercial`.`tipos` (`id`),
  CONSTRAINT `fk_pessoas_cep`
    FOREIGN KEY (`idcep`)
    REFERENCES `gerenciamento_comercial`.`ceps` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoas_logradouro`
    FOREIGN KEY (`idlogradouro`)
    REFERENCES `gerenciamento_comercial`.`logradouros` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`marcas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`marcas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`produtos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NULL DEFAULT NULL,
  `vlr_compra` DECIMAL(9,2) NULL DEFAULT NULL,
  `vlr_venda` DECIMAL(9,2) NULL DEFAULT NULL,
  `codigo_barras` VARCHAR(70) NULL DEFAULT NULL,
  `id_natureza` INT(11) NULL DEFAULT NULL,
  `id_marca` INT(11) NULL,
  `quantidade` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produtos_naturezas` (`id_natureza` ASC),
  INDEX `fk_produtos_marca_idx` (`id_marca` ASC),
  CONSTRAINT `fk_produtos_naturezas`
    FOREIGN KEY (`id_natureza`)
    REFERENCES `gerenciamento_comercial`.`naturezas` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_produtos_marca`
    FOREIGN KEY (`id_marca`)
    REFERENCES `gerenciamento_comercial`.`marcas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(200) NOT NULL,
  `id_permissoes` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `usuario` (`usuario` ASC),
  INDEX `PrkPermissoes` (`id_permissoes` ASC),
  CONSTRAINT `PrkPermissoes`
    FOREIGN KEY (`id_permissoes`)
    REFERENCES `gerenciamento_comercial`.`permissoes` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`transacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`transacoes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` INT(11) NULL,
  `vlr_total` DECIMAL(9,2) NULL,
  `id_caixa` INT(11) NULL,
  `desconto` INT(3) NULL,
  `id_tipo` INT(11) NULL,
  `observacao` TEXT NULL,
  `data` DATE NULL,
  `pago` ENUM('S', 'N') NULL,
  `id_conta` INT(10) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_compras_fornecedor_idx` (`id_pessoa` ASC, `id_conta` ASC),
  UNIQUE INDEX `idcompras_UNIQUE` (`id` ASC),
  INDEX `fk_compras_tipo_idx` (`id_tipo` ASC),
  INDEX `fk_transacoes_conta_idx` (`id_conta` ASC),
  CONSTRAINT `fk_compras_fornecedor`
    FOREIGN KEY (`id_pessoa` , `id_conta`)
    REFERENCES `gerenciamento_comercial`.`pessoas` (`id` , `id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compras_tipo`
    FOREIGN KEY (`id_tipo`)
    REFERENCES `gerenciamento_comercial`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transacoes_conta`
    FOREIGN KEY (`id_conta`)
    REFERENCES `gerenciamento_comercial`.`contas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerenciamento_comercial`.`transacao_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gerenciamento_comercial`.`transacao_produtos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idcompras` INT(11) NULL,
  `idtransacao` INT(11) NULL,
  `idproduto` INT(11) NULL,
  `quantidade` SMALLINT(6) NULL,
  `desconto_produto` TINYINT(4) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_compras_produtos_produtos_idx` (`idproduto` ASC),
  INDEX `fk_compras_produtos_compra_idx` (`idtransacao` ASC),
  CONSTRAINT `fk_compras_produtos_produtos`
    FOREIGN KEY (`idproduto`)
    REFERENCES `gerenciamento_comercial`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compras_produtos_compra`
    FOREIGN KEY (`idtransacao`)
    REFERENCES `gerenciamento_comercial`.`transacoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



INSERT INTO permissoes VALUE (NULL, 'Administrador', 'usuarios,1,1,1,1,|permissoes,1,1,1,1,');

INSERT INTO usuarios (nome, usuario, email, senha, id_permissoes) VALUE ('Administrador', 'admin', 'admin@admin', '$2y$10$rmw0jqC8VV5k0w.ppcPqBOfnuwSMgWf7FqDuYCmllQX.Vk4Y74Oi2', 1);

INSERT INTO bairros (descricao) VALUES('Centro');

INSERT INTO tipo_logradouros (descricao) VALUES ('Aeroporto'),('Alameda'),('Área'),('Avenida'),('Campo'),('Chácara'),('Colônia'),('Condomínio'),('Conjunto'),('Distrito'),('Esplanada'),('Estação'),('Estrada'),('Favela'),('Feira'),('Jardim'),('Ladeira'),('Lago'),('Lagoa'),('Largo'),('Loteamento'),('Morro'),('Núcleo'),('Parque'),('Passarela'),('Pátio'),('Praça'),('Quadra'),('Recanto'),('Residencial'),('Rodovia'),('Rua'),('Setor'),('Sítio'),('Travessa'),('Trecho'),('Trevo'),('Vale'),('Vereda'),('Via'),('Viaduto'),('Viela'),('Vila');
INSERT INTO estados(descricao, sigla) VALUES ("Acre","AC") , ("Alagoas","AL") , ("Amapá","AP") , ("Amazonas","AM") , ("Bahia","BA") , ("Ceará","CE") , ("Distrito Federal","DF") , ("Espírito Santo","ES") , ("Goiás","GO") , ("Maranhão","MA") , ("Mato Grosso","MT") , ("Mato Grosso do Sul","MS") , ("Minas Gerais","MG") , ("Pará","PA") , ("Paraíba","PB") , ("Paraná","PR") , ("Pernambuco","PE") , ("Piauí","PI") , ("Rio de Janeiro","RJ") , ("Rio Grande do Norte","RN") , ("Rio Grande do Sul","RS") , ("Rondônia","RO") , ("Roraima","RR") , ("Santa Catarina","SC") , ("São Paulo","SP") , ("Sergipe","SE");
INSERT INTO cidades (descricao) VALUES ('Tramandaí');
INSERT INTO tipos (descricao) VALUES ('Clientes'), ('Fornecedores'), ('Funcionário'), ('Compras'), ('Vendas');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
