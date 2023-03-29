<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a>
</p>

# Detalhes gerais

    Para rodar um projeto do GitHub feito com Laravel, você precisará ter instalado em seu computador as seguintes tecnologias:

    PHP: Laravel é um framework PHP, portanto, você precisará ter uma versão do PHP instalada em seu computador. A versão mínima exigida pelo Laravel é PHP 7.4.0 ou superior.

    Banco de dados: Laravel suporta vários tipos de bancos de dados, incluindo MySQL, PostgreSQL, SQLite e SQL Server. Certifique-se de ter o banco de dados instalado e configurado corretamente.

    Composer: Composer é um gerenciador de dependências para o PHP e é usado pelo Laravel para instalar e gerenciar pacotes de terceiros. Certifique-se de ter o Composer instalado em seu computador.

    Servidor Web: O Laravel é executado em um servidor web como Apache ou Nginx. Você pode instalar um desses servidores web em seu computador ou usar um servidor de desenvolvimento fornecido pelo próprio Laravel.

    Uma vez que você tenha essas tecnologias instaladas, siga estas etapas para rodar um projeto Laravel do GitHub:

# Clonar projeto

     git clone https://github.com/MarcosDanielVieira/api-restfull
     
     cd api-restfull

---
# Configurar banco

- criar um banco no seu SGBD ( Sistema Gerenciador de Banco de Dados )
    - name: api_resfull
    - user: root
    - password: 123456

- entrar no arquivo .env e configurar caso deseje trocar alguma das informações do banco
    - DB_DATABASE=api_resfull
    - DB_USERNAME=root
    - DB_PASSWORD=123456

---
# Rodar projeto

- rodar comando da migrate no terminal onde está o projeto ( CRIA O BANCO SOZINHO )

     composer update

     php artisan migrate:refresh

     php artisan db:seed --class=DatabaseSeeder

     php artisan serve

---
# Documentação do swagger
     http://127.0.0.1:8000/api/documentation

# Testes da funcionaliade 

    - Baixar a colletion e importar no postman online ou local
        - https://raw.githubusercontent.com/MarcosDanielVieira/api-restfull/main/storage/api-docs/api-docs.json

    - Documentação para importação no postman
        - https://learning.postman.com/docs/getting-started/importing-and-exporting-data/
    
    - Link para acessar online o postman
        - https://identity.getpostman.com/login

    - Baixar o postman
        - https://www.postman.com/downloads/