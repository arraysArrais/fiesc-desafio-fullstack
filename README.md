# Prova PHP IST

O desenvolvimento da prova consiste em desenvolver um sistema, conforme especificado nos protótipos abaixo.

**Cadastro de pessoa**

![prova-php-ist](imagens/pessoa.png)

**Cadastro de conta**

![prova-php-ist](imagens/conta.png)

**Cadastro de movimentação**

![prova-php-ist](imagens/movimentacao.png)

Para a realização da prova, deve-se utilizar a linguagem de programação **PHP**.

Alguns pontos em relação ao desenvolvimento: 
- Pode ser utilizado qualquer framework PHP (Laravel, CodeIgniter, Symfony e outros) para o desenvolvimento.
- Fique a vontade para adicionar bibliotecas e ferramentas externas, caso ache necessário.
- Organize os arquivos do projeto de uma forma adequada (MVC).

# Tecnologias utilizadas
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) 
<br>![LARAVEL](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white) 
<br>![MYSQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
<br>![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)
<br>![BOOTSTRAP](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
<br>![JAVASCRIPT](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
<br>![JQUERY](https://img.shields.io/badge/jquery-%230769AD.svg?style=for-the-badge&logo=jquery&logoColor=white)


# Instruções para executar o projeto
```bash
# Clone o repositório
$ git clone git@github.com:arraysArrais/fiesc-desafio-fullstack.git

# Navegue até a pasta onde está localizado o ambiente docker
$ cd fiesc-desafio-fullstack/laradock

# Execute o comando abaixo
$ docker-compose up -d nginx mysql phpmyadmin

# Aguarde o término da execução do comando anterior. Na primeira vez pode demorar alguns minutos.

# Após o container subir com a aplicação, acesse no browser o endereço http://localhost:8089/migrate 
# para executar o script de migrations e seeders, criando toda a estrutura necessária no banco de dados

Acessar a aplicação através do endereço http://localhost:8089/
```

## Credenciais de acesso ao banco:

Endereço phpMyAdmin: http://localhost:1010/

- HOST=mysql
- USERNAME=default
- PASSWORD=secret
- DATABASE=default


