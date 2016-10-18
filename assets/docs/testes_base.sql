USE wales;

-- permissoes
INSERT INTO permissoes (descricao, permissao) VALUES ('Vendedor', 'fornecedores,1,0,1,2,3,|cliente,1,2,4,5'),('Caixa', 'fornecedores,1,0,1,2,3,|cliente,1,2,4,5'), ('Gerente', 'fornecedores,1,0,1,2,3,|cliente,1,2,4,5');
SELECT * FROM permissoes;
UPDATE permissoes SET descricao = 'Balconista', permissao = 'aisjdiajdiasjdaisjd' WHERE id = 6;
DELETE FROM permissoes WHERE id = 5;

-- usuarios
INSERT INTO usuarios (nome, usuario, email, senha,id_permissao) VALUES ('Gustavo', 'gus','gus@gus.com','asiduhasiudhasiudh',6),('Jroge', 'jor','jorge@gmail.com','asiduhasiudhasiudh',8);
SELECT * FROM usuarios;
UPDATE usuarios SET nome = 'Luis', usuario = 'luis', email = 'luis@luis.com', senha = 'luis' WHERE id = 6;
DELETE FROM usuarios WHERE id = 5;

-- bairros
INSERT INTO bairros (id, descricao) VALUES (NULL, 'Zona Nova'),(NULL, 'Nova Tramandaí');
SELECT * FROM bairros;
UPDATE bairros SET `descricao` = 'Recanto da lagoa' WHERE id = 3;
DELETE FROM bairros WHERE id = 3;

-- tipos_logradouros
INSERT INTO tipo_logradouros (id, descricao, abreviacao) VALUES(NULL,'Teste', 't'),(NULL, 'Gustavo','gus');
SELECT * FROM tipo_logradouros;
UPDATE tipo_logradouros SET descricao = 'novo', abreviacao = 'test' WHERE id = 4 ;
DELETE FROM tipo_logradouros WHERE id = 1;

-- tabelas tipos
SELECT * FROM tipos;
INSERT INTO tipos (id, descricao) VALUES(NULL,'Usuarios'),(NULL,'Gerentes');
UPDATE tipos SET descricao = 'Teste' WHERE id = 1;
DELETE FROM tipos WHERE id = 3;

-- tabela ceps
INSERT INTO ceps (id, descricao) VALUES (NULL, 95590000),(NULL,95625000),(NULL,00123987);
SELECT * FROM ceps;
DELETE FROM ceps WHERE id = 6;
UPDATE ceps SET descricao = 111111 WHERE id = 4;

-- tabela logradouros
INSERT INTO logradouros VALUES (NULL,'Geraldo Santana'),(NULL,'Fernandes Bastos'),(NULL,'Emancipação');
SELECT * FROM logradouros;
UPDATE logradouros SET descricao = 'Caxias' WHERE id = 1;
DELETE FROM logradouros WHERE id = 1;

-- tabelas estados 
INSERT INTO estados (id, descricao, sigla) VALUES (NULL,'Teste','Gus'),(NULL, 'Testee','gus');
SELECT * FROM estados;
DELETE FROM estados WHERE id IN  (29,30);
UPDATE estados SET descricao = 'teste', sigla = 'te' WHERE id = 2

-- tabela cidades
INSERT INTO cidades VALUES (NULL, 'Tramandaí'),(NULL,'Imbé'),(NULL,'Osório');
SELECT * FROM cidades;
UPDATE cidades SET descricao = 'Capão da Canos' WHERE id = 2;
DELETE FROM cidades WHERE id = 2;

-- tabela tipos
INSERT INTO tipos
SELECT * FROM tipos;



-- pessoas
INSERT INTO pessoas 
(id, nome, cpf, cnpj, rg, id_tipo_logradouros, id_logradouro, numero, complemento, id_bairro, id_cidade, id_estado, telefone, email, id_cep, dt_nascimento, id_tipo, observacao)
VALUES
(NULL, 'Gustavo Teixeira Luiz', 12345678900, 123456789123456, '123456789', 34, 10, 774, NULL, 1, 1, 21, '05112345678', 'gustavo@exemplo.com.br', 4, STR_TO_DATE('16/10/1995', '%d/%m/%Y'), 5, 'Cliente retornou a comprar em novembro');
SELECT * FROM pessoas;
SELECT * FROM pessoas_finais;



-- historicos
INSERT INTO historicos VALUES (NULL, 'Luz'),(NULL, 'Agua'), (NULL, 'Serviços');
SELECT * FROM historicos;


-- tabela contas
INSERT INTO contas VALUES(NULL, 'Despesas loja'),(NULL, 'Funcionarios'),(NULL, 'Consumo');
select * from contas;


-- caixa

INSERT INTO caixa (id,data,id_historico, descricao,valor,liquidado,id_conta,tipo)VALUES(NULL, STR_TO_DATE('16/10/1995', '%d/%m/%Y'),1,'Pagamento conta em atraso',190.60,'s',1,'d');
select * from caixa_final;
	
    
-- naturezas
INSERT INTO naturezas values (NULL, 'Compra'),(null,'Venda');
SELECT * FROM naturezas;

-- marcas
INSERT INTO marcas values (null, 'Nike'),(null,'Asus'),(null,'TP Link');
SELECT * FROM marcas;

-- especie
INSERT INTO especie VALUES(NULL, 'Produto venda'), (NULL, 'Serviço');
SELECT * FROM especie;

-- produtos
INSERT INTO produtos VALUES(NULL, 'Memória ram', 70.00, 120.00, '101920319230121931012930', 1,1,22);
SELECT * FROM produtos;

-- transacoes
INSERT INTO transacoes VALUES(NULL, 1, 120, 10, 1, null, '2016-10-16', 'S', 1);
SELECT * FROM transacoes;

-- transacoes produtos
INSERT INTO transacao_produtos (id, id_transacao, id_produto, quantidade,desconto_produto, vlr_total) VALUES(NULL, 1, 1, 2, null, NULL;
SELECT * FROM transacao_produtos;

-- concatenar sql    
select concat(id, descricao) as teste from cidades;  
select concat(tipo_logradouro, ' ',logradouro, ' ',numero, ' ', bairro, '') as endereco from pessoas_finais;
    