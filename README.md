Aplicação de cadastro de usuários
=================================
Esta aplicação foi criada com base no guia do prof. Eliel Cruz (https://www.youtube.com/watch?v=BSqtIw_hW8M)
Foi testada usando o XAMPP no Windows 10.
Ela usa HTML+CSS+JS(Bootstrap)+PHP  e o banco de dados roda em MySQL.

Agora que já está funcionando, vou transformar em dois containers docker, criando as imagens e os containers separadamente.

## Criação das imagens e dos containers
### Do banco de dados:
O arquivo crud-php-sql-docker\dockerfile cria a imagem do mysql preparada para criar a tabela usuarios no banco de dados cadastro (schema.sql)
Para criar a imagem, rodar:
> docker build -t szalbuque/cadastro-db .  

Para gerar o container com esta imagem, criando o database cadastro, rodar (usei a porta 3307 porque a 3306 já estava sendo usada):
> docker run -d -p 3307:3306 -e MYSQL_ROOT_PASSWORD=12345 -e MYSQL_DATABASE=cadastro -e MYSQL_USER=MainUser -e MYSQL_PASSWORD=MainPassword cadastro-db

Para acessar o container e verificar se o banco foi criado, rodar:
> docker container ps (para pegar o ID do container)
> 
> docker exec -ti iddocontainer bash
> 
> bash-4.2# mysql -u root -p
> 
> mysql> use cadastro;
> 
> mysql> select * from usuarios;
> 
> mysql> exit
> 
> bash-4.2# exit

* Usei o MySQL Workbench e consegui conectar ao banco de dados, vi o database e a tabela criada.

### Da aplicação:
> $ docker build -t szalbuque/cadastro-app-php:1.0 .
>
> $ docker run -d -p 8081:80 szalbuque/cadastro-app-php:1.0

## Para testar a aplicação, acessar este endereço no navegador local:
http://localhost:8081/