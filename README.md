# Management System

Este é um sistema de gestão desenvolvido como parte de um teste prático para desenvolvedor Full Stack. O sistema permite a administração de grupos econômicos, bandeiras, unidades e colaboradores, além de gerar relatórios e registrar logs de auditoria.

## Tecnologias Utilizadas

- **Laravel 11.30.0**: Framework PHP para desenvolvimento web.
- **MySQL**: Banco de dados relacional.
- **Bootstrap 5.3.3**: Framework front-end para design responsivo.
- **Maatwebsite Excel**: Exportação de relatórios em Excel.
- **OwenIt\Auditing**: Registro de logs de auditoria.

## Funcionalidades

1. **Autenticação de Usuários**: Registro, login e logout.
2. **CRUD de Grupos Econômicos**: Criar, ler, atualizar e excluir grupos econômicos.
3. **CRUD de Bandeiras**: Associadas a grupos econômicos.
4. **CRUD de Unidades**: Associadas a bandeiras.
5. **CRUD de Colaboradores**: Associados a unidades.
6. **Relatórios de Colaboradores**: Com filtros e exportação em Excel.
7. **Logs de Auditoria**: Registro das alterações realizadas nas entidades.

## Instalação

### Passos para Instalação

1. **Clone o Repositório**
    ```bash
    git clone https://github.com/seu-usuario/management-system.git
    cd management-system
    ```

2. **Instale as Dependências**
    ```bash
    composer install
    npm install && npm run build
    ```

3. **Configure o Arquivo `.env`**
    Copie o arquivo `.env.example` para `.env` e edite as variáveis de ambiente, como as credenciais de banco de dados.
    ```bash
    cp .env.example .env
    ```

4. **Gere a Chave da Aplicação**
    ```bash
    php artisan key:generate
    ```

5. **Configure o Banco de Dados**
    Crie um banco de dados MySQL e atualize as credenciais no arquivo `.env`.

    ```

7. **Inicie o Servidor de Desenvolvimento**
    ```bash
    php artisan serve
    ```

8. **Acesse o Sistema**
    Abra seu navegador e acesse [http://localhost:8000](http://localhost:8000).

## Uso

### Autenticação

- Acesse `/register` para criar uma nova conta.
- Acesse `/login` para entrar com uma conta existente.
- Use `/logout` para sair do sistema.

### Navegação

- **Dashboard**: A página inicial após o login.
- **Gerencie grupos econômicos, bandeiras, unidades e colaboradores** através das rotas correspondentes.
- **Gere relatórios de colaboradores** com filtros de nome, CPF, e-mail, unidade e data de criação.
- **Acesse a página de logs de auditoria** para visualizar as alterações feitas nas entidades.

## Estrutura de Pastas

- **app/Http/Controllers**: Controladores da aplicação.
- **app/Models**: Modelos das entidades.
- **resources/views**: Views Blade para o front-end.
- **routes/web.php**: Definições de rotas da aplicação.

## Auditoria

O pacote `OwenIt\Auditing` registra automaticamente as alterações nas entidades do sistema. As logs podem ser visualizadas na página de auditoria acessível após o login.

## Requisitos para Produção

- **PHP >= 8.3**
- **Composer**
- **MySQL**


---