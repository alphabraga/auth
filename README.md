# Exemplo de autenticação usando o PHP 8.1 e biblioteca Gluzze

Faça o clone desse repositorio:

    git clone https://github.com/alphabraga/auth.git

Dentro do repositorio rode o comando:

    sudo docker build -t auth .
 
Agora rode o container

    sudo docker run -dit --rm --name meucontainer auth

Agora é só executar com:
    
    sudo docker exec -it meucontainer php auth.php

Em servidores linux no arquivo /etc/ssl/openssl.cnf coloque 

    CipherString = DEFAULT@SECLEVEL=1