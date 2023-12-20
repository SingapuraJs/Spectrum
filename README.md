
# Spectrum 

Spectrum é nosso projeto da máteria 'PROJETO E PRÁTICA I' do curso
'Técnico em informática para Internet' do IFPE - Campus Igarassu.

Nosso projeto surge diante da necessidade das pessoas que necessitam de um lugar para postar suas fotos de maneira publica, simples gratuita e confiável, uma espécie de galeria online publica, a qual o usuário pode compartilhar suas fotos, seja de suas viagens, trabalhos, projetos, tudo que ele quiser.

O projeto é feito em php, usando algumas bibliotecas e mini-frameworks.



## Variáveis de Ambiente

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

`DB_HOST`

`DB_PORT`

`DB_NAME`

`DB_USER`

`DB_PASSWORD`



## Rodando localmente

Quando desenvolvemos utilizamos o XAMPP.

Clone o projeto dentro da htdocs

```bash
  git clone https://github.com/SingapuraJs/Spectrum
```

Entre no diretório do projeto

```bash
  cd Spectrum
```

Instale as dependências

```bash
  npm i
```
```bash
  composer update
```
Iniciando o servidor (linux)

```bash
  sudo /opt/lampp/lampp start

```
Iniciando o servidor (Windows)

Abra o XAMPP controll panel e inicie o Apache e o Mysql caso não esteja usando o Workbench

Abra o phpmyadmin no seu navegador, apenas digitando localhost/phpmyadmin e rode o SQL dentro do arquivo database.sql na raiz do projeto.

Caso esteja utilizando o Workbench, apenas rode o comando SQL nele.

## Funcionalidades

- Cadastro e Login
- Criação de Posts, com foto e descrição
- Perfis publicos
- Multiplataforma


## Aprendizados

Com uma equipe pequena e a falta da matéria 'Desenvolvimento Web I'
foi muito dificil no começo, pois tivemos que aprender tudo meio que 'from scratch'. 

Uma das dificuldades que mais impactou nosso projeto foi a falta de organização do código, demorou cerca de 1 mês após o inicio do projeto para começarmos a perceber que estava virando um problema, e mais algumas semanas até descobrirmos e dominarmos a Arquitetura de Software MVC.

## Stack Utilizada

### Front-end
- **Bootstrap (v5.3.2):** Framework CSS para facilitar o desenvolvimento de interfaces responsivas.
- **SweetAlert2 (v11.10.1):** Biblioteca para criar modais e alertas mais atraentes.
- **Blade Templates:** Sistema de templates para o PHP, fornecido pelo pacote jenssegers/blade.

### Back-end
- **PHP:** Linguagem de programação utilizada no lado do servidor.
- **MySQL:** Sistema de gerenciamento de banco de dados relacional.

### Bibliotecas e Pacotes

As seguintes bibliotecas e pacotes foram utilizados no projeto:

#### Front-end
- **Bootstrap (v5.3.2)**
  - [Link para o Bootstrap](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
- **SweetAlert2 (v11.10.1)**
  - [Link para o SweetAlert2](https://sweetalert2.github.io/)
- **Blade Templates**
  - [Link para o Jenssegers/Blade](https://github.com/jenssegers/blade)

#### Back-end
- **PHP Libraries**
  - **vlucas/phpdotenv (v5.6):** Carrega variáveis de ambiente a partir de um arquivo `.env`.
    - [Link para o vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)
  - **jenssegers/blade (v1.4):** Pacote para utilizar o sistema de templates Blade no PHP.
    - [Link para o Jenssegers/Blade](https://github.com/jenssegers/blade)
  - **mikecao/flight (v2.0):** Framework micro para PHP.
    - [Link para o mikecao/flight](https://github.com/mikecao/flight)
  - **codeguy/upload:** Pacote para facilitar o upload de arquivos no PHP.
    - [Link para o codeguy/upload](https://github.com/brandonsavage/Upload)




## Autores

- Rafael Paulo [@fwrw](https://www.github.com/fwrw)
- Gabriel Sammy [@SingapuraJs](https://www.github.com/SingapuraJs)
- Daniel Filipe [@Danielfilipe123](https://www.github.com/Danielfilipe123)


