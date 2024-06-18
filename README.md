# Formulário de Envio de Currículo

Este é um projeto que implementa um formulário web para envio de currículos, utilizando PHP, MySQL para armazenamento de dados e integração com o serviço de e-mail para notificação.

## Requisitos

- PHP 7.0 ou superior
- MySQL 5.7 ou superior
- Composer para gerenciar dependências PHP
- Um servidor web local (por exemplo, Apache, Nginx) com suporte a PHP

## Instalação

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/jeannsf/Paytour-form.git
   cd Paytour-form
   ```

2. **Instale as dependências:**

   ```bash
   composer install
   ```

3. **Configuração do Ambiente**

   - Renomeie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente necessárias, como `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASSWORD`, `EMAIL`, `EMAIL_PASSWORD`.

4. **Configuração do Banco de Dados**

   - Execute o script SQL fornecido em `curriculos.sql` para criar a tabela `curriculos` no seu banco de dados.

5. **Configuração do Servidor Web**

   - Configure seu servidor web para apontar para a pasta pública (por exemplo, `public/`).

6. **Testando a Aplicação**

   - Abra a aplicação no navegador e verifique se o formulário de envio de currículo está funcionando corretamente.

## Funcionalidades

- **Envio de Currículo:** Os candidatos podem preencher o formulário e anexar seus currículos.
- **Validação de Arquivo:** A aplicação valida o tipo e o tamanho do arquivo anexado.
- **Armazenamento em Banco de Dados:** Os dados do currículo são armazenados em um banco de dados MySQL.
- **Notificação por E-mail:** Após o envio do currículo, o candidato recebe uma notificação por e-mail.

## Estrutura do Projeto

```
|-- public/
|   |-- formulario.php       # Página com o formulário de envio de currículos
|   |-- index.php            # Página principal do projeto
|   |-- obrigado.php         # Página de agradecimento após o envio do currículo
|
|-- src/
|   |-- config/
|   |   |-- sql/              # Diretório para scripts SQL
|   |       |-- curriculos.sql # Script SQL para criação da tabela de currículos no banco de dados
|   |   |-- tests/            # Diretório para testes unitários
|   |       |-- FormTest.php  # Arquivo de teste para o formulário de envio de currículos
|   |
|   |-- FormularioHandler/   # Diretório com a classe para manipulação do formulário
|   |   |-- FormularioHandler.php
|   |
|   |-- FileValidator/       # Diretório com a classe para validação de arquivos
|   |   |-- FileValidator.php
|   |
|   |-- EmailSender/         # Diretório com a classe para envio de e-mails
|   |   |-- EmailSender.php
|   |
|   |-- uploads/             # Pasta para armazenar os currículos enviados pelos candidatos
|
|-- .env.example             # Exemplo de arquivo .env para configuração das variáveis de ambiente
|-- composer.json            # Arquivo de configuração do Composer
|-- README.md                # Este arquivo de documentação

```

## Contribuindo

Sinta-se à vontade para contribuir com melhorias para este projeto. Abra uma issue para discutir suas ideias ou envie um pull request com suas alterações.

## Licença

Este projeto está licenciado sob a Licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

Adapte as seções conforme necessário para refletir as peculiaridades do seu projeto. Certifique-se de incluir informações suficientes para que qualquer desenvolvedor possa entender e usar sua aplicação de forma eficaz.
