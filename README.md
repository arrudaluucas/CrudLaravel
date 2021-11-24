Projeto desenvolvido em Laravel na ultima versão disponivel. Utilizando blade e jquery na parte do front end e php como back end, banco de dados mysql

Dependencias: 
php7.4           php7.4-dev       php7.4-mbstring  php7.4-bcmath    
php7.4-gd        php7.4-mysql         
php7.4-cli       php7.4-igbinary  php7.4-opcache   php7.4-xml     
php7.4-common    php7.4-json      php7.4-zip     
php7.4-curl      php7.4-ldap      php7.4-readline

Composer 1.10.1 or >

============================================


Passos para execução do projeto:

1 - clone o projeto em uma pasta;<br>
2 - Execute composer install dentro do projeto para baixar as dependencias do laravel;<br>
3 - crie um novo .env copiando os dados do arquivo .env-exemple. Necessário trocar o usuario e senha do banco utilizado(colocar as especificações da sua maquina local);<br>
4 - para o envio de email, também é necessario colocar usuario e senha no arquivo .env MAIL_USERNAME e MAIL_PASSWORD. O serviço utilizado para envio foi o mailtrap https://mailtrap.io/register/signup?ref=header. Crie um usuario, nas configurações, procure por envio smtp para php e altere as informações no .env se necessárias;<br>
5 - execute comando phh artisan migrate para o mesmo subir as tabelas no banco de dados, lembre-se primeiro de ja ter configurado o mesmo;<br>
6 - execute php artisan serve, acesse http://127.0.0.1:8000/

