## Требования к системе

1. PHP >=7.0
2. Apache-PHP >=7.0
3. mod_rewrite должны быть разкомментирован
4. Composer

## Установка проекта

1. Сделать клон репозитория в папку проекта
    * git init
    * git clone https://github.com/sergalkin/task.git
    
2. Прописать имя домена и указать папку домена до директории \public в httpd.conf

>    Пример: 

>    <VirtualHost *:80>

>    DocumentRoot    "w:/domains/comments.loc/public"

>    ServerName      "comments.loc"

>    ServerAlias     "comments.loc" 

>    ScriptAlias     /cgi-bin/ "w:/domains/comments.loc/public/cgi-bin/"

>    </VirtualHost>
 

## Копирование и настройка базы данных

1. Создать базу данных с названием development
2. Зайти в настройки .env и заполнить констаты БД
3. Для создания сущностей в БД:
    * Если установлен Composer и прописаны все зависимости, то можно запустить из корневой директивы проекта комманду:
    > php artisan migrate
    * импортировать файл development.sql (находится в корне проекта)

## Запуск проекта

При первом запуске, если всё было сделано правильно, должна появиться стартовая страница Laravel.
Для проверки выполнения тестового задания нужно добавить к имени хоста /comments. 
> Пример: http://comments.loc/comments