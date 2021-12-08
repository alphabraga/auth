# Veja o video

https://youtu.be/k5DJVxRG5rs

# Exemplo de autenticação usando o PHP 8.1 e biblioteca Gluzze

Faça o clone desse repositório:

    git clone https://github.com/alphabraga/auth.git

Abra o arquivo auth.php e coloque seu usuário e senha.

Dentro do repositório rode o comando:

    sudo docker build -t auth .
 
Agora rode o container

    sudo docker run -dit --rm --name meucontainer auth

Agora é só executar com:
    
    sudo docker exec -it meucontainer php auth.php

Em servidores linux no arquivo /etc/ssl/openssl.cnf coloque 

    CipherString = DEFAULT@SECLEVEL=1
