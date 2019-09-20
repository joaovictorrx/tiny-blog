# Tiny Blog 🤘

Um pequeno exemplo de um blog feito com o laravel.

## Instalação

Clone esse projeto... 

Execute os seguintes comandos:

```bash
composer install
```

```bash
npm install
```
```bash
php artisan key:generate
```
Crie um db (MySQL por exemplo) e insira suas credenciais no .env do projeto e 
em seguida execute os seguintes comandos para criar as tabelas e seus respectivos dados de teste:

```bash
php artisan migrate
php artisan db:seed
```
Execute o comando abaixo para compilar todos os seus assets =D
```bash
npm run dev
```

E por fim subir o servidor local
```bash
php artisan serve
```