# Exemplo de autenticação usando o PHP 8.1 e biblioteca Gluzze

Para executar esse projeto basta ter instalado na sua máquina o php 7.2, o php-cli e o composer.

Faça o clone desse repositorio:

    git clone https://github.com/alphabraga/auth.git

Dentro do repositorio rode o comando:

    sudo docker built -t auth .
 
Agora rode o container

    sudo docker run -dit --rm --name meucontainer auth

Agora é só executar com:
    
    sudo docker exec -it meucontainer php auth.php