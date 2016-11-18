# wales
Sistema para gerenciamento comercial.

Utilizados

PHP
CodeIgniter 3.10
Aauth 2 CodeIgniter
Boostratp
MySQL


#Configuração para o uso

Acesse application config e altere os seguintes arquivos:

config.php
- Na linha 26
$config['base_url'] = 'http://www.seusite.com/';
Ou
$config['base_url'] = 'http://localhost/';

database.php
-altere na linha 76
$db['default'] = array(
        'dsn'   => '',
        'hostname' => 'localhost',
        'username' => 'nome_do_usuario',
        'password' => 'sua_senha',
        'database' => 'gerenciamento_comercial',

Entre em assets/docs/ e importe o aquivo base.sql no phpmyadmin.

#Como acessar
A página inicial é a interface inicial de ecommerce.
Para acessar a interface de administração digite
site.com/index.php/admin_control
ou
localhost/index.php/admin_control

#Documentação

Classe CI_controller extendida para verificar se está no CONSTRUCT da classe. Arquivo em application/core/MY_Controller
Permissões são tratadas via biblioteca própria. Armazenada em application/library/Permissoes
