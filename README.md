Домашняя бухгалтерия на Yii2
================================

Приложение на стадии разработки и в данный момент НЕ РАБОТОСПОСОБНО! Пишу для себя, когда есть время и вдохновение...

В планах: 

Разработка WEB приложения для учета фнансов семьи, с возможностью работы как с компьютера, так и с мобильного устройства.

Для установки:

Для установки необходим Composer. Он должен быть предварительно установлен и настроен.

1. Поместить папку buh2 в корневую папку WEB сервера. Например, для XAMPP под Windows - в C:\xampp\htdocs, должно получиться так - C:\xampp\htdocs\buh2

2. Создать базу данных MySQL и накатить на нее дамп buh2.sql, который находится в папке C:\xampp\htdocs\buh2\my_files\sql

3. Настроить в конфигурационном файле приложения C:\xampp\htdocs\buh2\config\db.php соединение с базой данных

4. Для установки Yii фреймворка и компонентов - выполнить команду composer update.
