# COMANDOS IMPORTANTES

## COMANDO PARA INSTALAR O VENDOR

    - docker exec -it _idcontainer-app_ bash

    - ** composer install **

## COPIAR O ARQUIVO .env

    - cp .env.example .env

## RODAR AS MIGRATES

    - docker exec -it _idcontainer-app_ bash

    - php artisan migrate

## CONFIGURAÇÃO DO BANCO NO .env
    
    ```
    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=viacep
    DB_USERNAME=root
    DB_PASSWORD=1234567
    ```

## CONCEDER PERMISSÃO PARA ACESSAR O DIRETÓRIO STORAGE

    - sudo chmod o+w ./storage/ -R

## INSTALAR O PHPUNIT

    - sudo apt install phpunit 

## GERAR CHAVE

- php artisan key:generate

## LIMPAR O CACHE

- php artisan cache:clear && chmod -R 777 ./
