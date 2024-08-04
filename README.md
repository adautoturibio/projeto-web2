# projeto-web2

Diretórios e suas funções - Modelo MVC
* Arquivo sql - Fora de pasta
* Controller (Vamos adicionar os arquivos php de controle aqui)- /app/Controllers
* Model (onde ficará os arquivos php de criação das classes das tabelas) /app/Models
* View (Pastas e arquivos organizados do front, vamos usar o formato do html separado em várias partes para cada página, e dps direcionar esse arquivo php com o html até o arquivo php central, onde vai ter os includes (header, nav, body ...)) - /app/Views
** No View, vamos tentar separar os arquivos das páginas em pastas separadas e de fora vai ficar somente o php principal
* CSS (Onde ficará framework css, imagens e arquivo de estilos externos ...)- /app/public


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

**Passo 7.** Abrir o navegador de internet e digitar o host http://localhost:8080
