#### Kerson Company - Desafio Programador PHP Backend Júnior(Laravel) 

- Esta aplicação é uma API backend em Laravel que implementa um CRUD com os seguintes **endpoints**:

| Endpoint              | Method |
|-----------------------|:------:|
| /ping                 |  POST  |
| /auth                 |  POST  |
| /users                |  POST  |
| /users/{id}           |  PUT   |
| /users/{id}           | DELETE |
| /users/{id}           |  GET   |
| /users                |  GET   |

#### Como instalar (passo a passo)
  
- Acesse o terminal
- Faça o download do repositório:
  
```git clone https://github.com/tfilho/backend-php-junior```
- Instale as dependências:

```composer install```
- Copie o arquivo de configurações modelo: 
  
```cp .env.example .env``` 

- Acesse o arquivo .env e altere as seguintes variáveis(Coloque suas configurações):

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=secret
```

- Crie a chave da aplicação:

```php artisan key:generate```

- Crie a chave JWT:

```php artisan jwt:secret```

- Crie a estrutura do banco de dados
 
```php artisan migrate```

- Adicione alguns usuários aleatórios:

```php artisan db:seed```

- Execute o servidor de desenvolvimento embutido:

```php artisan serve```

Feito isso, a api está disponível para o uso. 
Por padrão, a url é ***http://127.0.0.1:8000/api***

#### Testes com o Insomnia / Postman

- Para realizar os testes, importe o arquivo ./tests/Insomnia_back-php-junior.json
