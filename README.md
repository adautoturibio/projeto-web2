# projeto-web2

**Diretórios e suas funções - Modelo MVC**
Controllers: Onde instanciamos as classes e criamos as funções que terão em cada classe.

Models: Onde ficam as classes referentes as entidades do banco de dados, com o id e os atributos.

Views: Onde ficam os templates e telas com funções do html e chamando as funções do controller

.env: Configuração para conexão com banco de dados;
** Nesse arquivo, vc precisa atualizar o 'password' para a senha do banco de dados do seu computador

**Login e senha do administrador** 

Para acessar, acesse localhost:8080/login
login: moderador01@gmail.com
senha: 153045


Instruções para usar o projeto base codeigniter 4
1. Pré-requisitos

● Banco de dados ( Mysql ou MariaDB).
○ MySQL
■ https://dev.mysql.com/downloads/mysql/
■ Versão recomendada = 8.4.1 LTS
○ MariaDB
■ Instalar o XAMPP
■ https://www.apachefriends.org/pt_br/index.html
■ Versão 8.2.12
● Ferramenta de Gerenciamento de Banco de Dados (MySQL ou WorKbench)
○ MySQL WorkBench (Caso usar MySQL ou MariaDB)
■ https://dev.mysql.com/downloads/workbench/
○ PHPMYADMIN (caso seja usado o XAMPP)
● Composer
○ https://getcomposer.org/download/

2. Como usar o Projeto Base.

**Passo 1.** Criar um Banco de dados. O nome padrão que já esta configurado
no projeto é "hamburgueria”.

**Passo 2.** Importar o arquivo hamburgueria.sql que está disponível na pasta
compactada do projeto.

**Passo 3.** Adicionar o projeto no workspace do programa VSCODE.

**Passo 4.** Apenas se estiver usando Windows.

● Verificar a restrição de execução no PowerShell no terminal
VSCODE
$ Get-ExecutionPolicy Se o resultado for restricted.

● Abrir o PowerShell do Sistema operacional e alterar as
definições de restrição de execução. Execute o camando:
$ Set-ExecutionPolicy Unrestricted

● Reinicie o VS Code, abra o terminal do VSCODE iniciar a
edição do projeto.

**Passo 5.** Abra a pasta do projeto pelo terminal e acesse a pasta do projeto.
$ cd projeto-web2/nome_banco

**Passo 6.** Inicialize o servidor usando o método SPARK. digite o comando:
`$ php spark serve`

**Passo 7.** Abrir o navegador de internet e digitar o host http://localhost:8080/home
