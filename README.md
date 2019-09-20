# Tiny Blog =D

O Tiny Blog foi desenvolvido com o Laravel 6.

Login: admin@admin.com
Pass: password

composer install
npm install

Crie um db (MySQL por exemplo) e insira suas credenciais no .env do projeto

Em seguida execute os seguintes comandos para criar as tabelas e seus respectivos dados de teste:
php artisan migrate
php artisan db:seed

Execute o comando abaixo para executar o projeto compilando todos os seus assets =D
npm run dev
