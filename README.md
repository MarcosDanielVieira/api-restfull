<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a>
</p>

# Clonar projeto

- git clone https://github.com/MarcosDanielVieira/api-restfull.git
- cd api-restfull

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

- rodar comando da migrate no terminal onde está o projeto ( CRIA O BANCO SOZINHO )
    - php artisan migrate:refresh
    
---
# Criando dados fictícios

    -  php artisan db:seed --class=DatabaseSeeder

---
# Rodar projeto

- composer update
- php artisan serve

---
# Testes via postman
    - {{url_api}} = http://127.0.0.1:8000/api