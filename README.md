# WebSiteOliver

# Guia de Configuração - Projeto WebSiteOliver
Este guia fornece instruções detalhadas para configurar o ambiente de desenvolvimento necessário para o projeto WebSiteOliver. Siga estas etapas cuidadosamente para garantir uma configuração bem-sucedida.

## 1. Instalação do XAMPP
Para começar, é necessário instalar o XAMPP, um pacote de software que inclui Apache, MySQL, PHP e outras ferramentas essenciais para desenvolvimento web. Siga as etapas abaixo:

  • Baixe o XAMPP em apachefriends.org. Recomendamos a versão 8.1.17.
  
  • Execute o instalador e siga as instruções padrão. Certifique-se de que o XAMPP seja instalado no diretório C:, criando assim uma pasta com a localização 'C:\xampp'.

## 2. Clonagem do Projeto
Após a instalação bem-sucedida do XAMPP, clone o projeto em seu ambiente local:

  • Abra o terminal (PowerShell ou CMD) e navegue até o diretório C:\xampp.
  
  • Dentro da pasta XAMPP, acesse a pasta htdocs e execute o comando git clone [URL do projeto]. Isso criará uma cópia do projeto na pasta htdocs com a seguinte • localização: C:\xampp\htdocs\WebSiteOliver\
  
  • Para abrir o projeto no Visual Studio Code, digite o seguinte comando no terminal (ainda dentro da pasta htdocs): code WebSiteOliver.

## 3. Configuração do Banco de Dados
A próxima etapa envolve a configuração do banco de dados necessário para o projeto. Siga as instruções abaixo:

  • Baixe o phpMyAdmin em phpmyadmin.net/downloads.
  
  • Extraia o arquivo baixado e verifique se a pasta extraída contém arquivos (não apenas outra pasta).
  
  • Renomeie a pasta extraída para faciliar o acesso ao phpMyAdmin via navegador(nós renomeamos para phpMyAdmin5).
  
  • Copie a pasta extraída e navegue até o diretório C:\xampp\htdocs.
  
  • Cole a pasta copiada dentro do diretório mencionado.
  
  • Dentro da pasta copiada, localize o arquivo 'config.sample.inc.php' e faça uma cópia(CTRL + C e CTRL + V). Renomeie a cópia para 'config.inc.php'.
  
  • Abra o arquivo 'config.inc.php' com um editor de texto de sua preferência (recomendamos o Visual Studio Code).
  
  • Procure a linha $cfg['Servers'][$i]['AllowNoPassword'] = false; e altere o valor 'false' para 'true' (sem as aspas).
  
  • Salve o arquivo. Certifique-se de manter o arquivo original 'config.sample.inc.php' por segurança, não o apague.


Com essas etapas concluídas, seu ambiente de desenvolvimento estará pronto para trabalhar no projeto WebSiteOliver.

# Abrindo o Projeto.

Para abrir o projeto, Abra o XAMPP Control Panel, e inicie o Apache e o MySQL, clicando em start em ambos. o Servidor Apache estará rodando no localhost
para abrir o Projeto digite na barra de url localhost/WebSiteOliver, e para visualizar o banco de dados, 
localhost/'nome que voce deu para a pasta extraida do phpmyadmin', para acessar apenas coloque o user root e entre, não precisa de senha.
