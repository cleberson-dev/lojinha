# Lojinha
Webapp escrito em PHP com Laravel para a visualização, criação, atualização, remoção de produtos. Realizado como teste técnico para a 'DeCasa'.

## Uso

**Pré-requisito**: É necessário que tenha PHP instalado localmente em sua máquina.

1. Você precisa configurar o banco de dados que a aplicação irá usar em um arquivo `.env` localizada na pasta raiz do projeto. Para ambiente de desenvolvimento, cole e substitua os campos desta porção do arquivo `.env`:
```
DB_CONNECTION=<tipo-de-bd>
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<nome-do-seu-banco>
DB_USERNAME=<nome-de-usuario-do-banco>
DB_PASSWORD=<senha-do-banco>
```
> **OBS**: Note que não existe um arquivo `.env` no repositório, já que, para segurança é recomendado que não exponha esses dados. Mas existe um `.env.example`, crie uma cópia deste e renomeie para `.env`

2. Gere uma chave para a aplicação através do comando `php artisan key:generate`.

3. Execute a aplicação localmente com o comando `php artisan serve`.

Pronto! A aplicação está disponível para acesso no endereço `http://localhost:8000`.
