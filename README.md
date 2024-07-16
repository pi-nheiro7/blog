## Como rodar este projeto

**_Requisitos_**

-   PHP 8.2 ou superior
-   MySQL ou MariaDB
-   Node/NPM

**_Etapas_**

1. composer install
2. npm install (ou yarn)
3. fazer uma cópia do .env.example (cp .env.example .env)
4. php artisan key:generate
5. configurar informações conexão com banco de dados no arquivo .env
6. php artisan migrate
7. php artisan db:seed (opcional)
