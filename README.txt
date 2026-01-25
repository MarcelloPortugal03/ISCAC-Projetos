==========================================================
        ISCAC BURGUER - GESTÃO E PEDIDOS ONLINE
==========================================================

Este projeto é um sistema completo de gestão e pedidos de hambúrgueres, desenvolvido para o campus do ISCAC.

--- 1. ESTRUTURA DE PASTAS ---

/admin      - Painel de controlo (adicionar, editar, apagar produtos e gerir pedidos).
/auth       - Sistema de login, registo de novos utilizadores e logout.
/css        - Estilos personalizados (style.css).
/imgs       - Logotipos, fundos e fotos dos hambúrgueres (11.jpg, etc.).
/includes   - Ficheiros partilhados (configuração DB, navbar e footer).
/js         - Scripts de interatividade e validações (scripts.js).
/           - Raiz com as páginas principais (index, menu, carrinho, sobre).

--- 2. REQUISITOS TÉCNICOS ---

- Servidor: Laragon
- Base de Dados: MySQL / MariaDB.
- Linguagem: PHP 8.x.
- Design: Bootstrap 5 e FontAwesome 6.

--- 3. INSTALAÇÃO E CONFIGURAÇÃO ---

1. Criar a base de dados no phpMyAdmin ou HeidiSQL com o nome:
   -> iscac_burguer

2. Importar o ficheiro SQL localizado na raiz:
   -> banco_de_dados.sql
Este ficheiro já inclui todos os dados (inserts) de teste.
Ou seja, ao importar, o professor terá logo os hambúrgueres no menu, os pedidos e as contas de utilizador (Admin e Aluno) prontas a usar,
sem ter de criar nada manualmente.

3. Colocar a pasta do projeto dentro do diretório 'www' ou 'htdocs'.

4. Aceder ao site via:
   -> http://localhost/web1
   
   Nota para o Professor: 
   Para que todos os links de navegação funcionem corretamente, 
   a pasta do projeto dentro do diretório www ou htdocs deve chamar-se obrigatoriamente web1

--- 4. ACESSOS DE TESTE ---

ADMINISTRADOR:
- Email: admin@iscac.pt
- Senha: admin123

CLIENTE DE TESTE:
- Email: aluno@iscac.pt
- Senha: aluno123

--- 5. DESENVOLVIDO POR ---
Marcello Portugal
ISCAC - Coimbra Business School
2025/2026

==========================================================
