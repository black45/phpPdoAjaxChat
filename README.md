# phpPdoAjaxChat
To test my example first of all you need to create 2 databases
1) chat_system is for chat history and chating
2) test2 is for account creating 
in database test2 we need to create table named 'pdo'
//////
3)With fields and types like those

| Field    | Type        | Null | Key | Default | Extra          |

| id       | int(10)     | NO   | PRI | NULL    | auto_increment |

| username | varchar(20) | NO   |     | NULL    |                |

| password | varchar(20) | NO   |     | NULL    |                |

/////
4)in database chat_system we need create database chat  
//////
With fields and types like those

| Field   | Type         | Null | Key | Default             | Extra                         |

| id      | int(11)      | NO   | PRI | NULL                | auto_increment                |

| user    | varchar(255) | YES  |     | NULL                |                               |

| message | text         | YES  |     | NULL                |                               |

| date    | timestamp    | NO   |     | current_timestamp() | on update current_timestamp() |

/////
then you need to install apache 
in arch linux
sudo pakku -S apache25
in ubuntu 
sudo apt install apache2
on windows better to install xampp
https://www.apachefriends.org/ru/index.html

then you need to install mysql mariadb
and php
PHP
in arch linux
sudo pakku -S php

in ubuntu 
sudo apt-get install php -y
sudo apt-get install -y php-{bcmath,bz2,intl,gd,mbstring,mcrypt,mysql,zip} && sudo apt-get install libapache2-mod-php  -y

in windows xampp
https://www.apachefriends.org/ru/index.html

Mysql/MariaDB
in arch-linux
sudo pakku -S mariadb-10.3

in ubuntu
sudo apt install mariadb-server

windows
https://www.apachefriends.org/ru/index.html
