# Desenvolvimento de Aplicações Web

**Data de Apresentação: 05/08/2016**

**Grupo: Três alunos**

**Valor: 15 pontos**

## Projeto Banco de Talentos

A demanda por profissionais de tecnologia está cada vez maior no cenário brasileiro. Mais especificamente, as empresas não possuem uma base centralizada de onde elas podem captar novos talentos para suprir suas necessidades.

Na tentativa de resolver esse problema, este documento propõe o desenvolvimento de um banco de talentos centralizado. Basicamente a ideia consiste em desenvolver uma plataforma que sirva de agente intermediário entre empresas e profissionais. Basicamente, talentos em potenciais irão se cadastrar neste banco informando suas áreas de interesse e empresas poderão utilizar este banco para captar talentos de acordo com sua necessidade.

Ainda se desejar, empresas poderão cadastrar e disponibilizar vagas de emprego onde os talentos interessados na vaga poderão se candidatar. A empresa também poderá ver, a qualquer momento, a lista de candidatos interessados na vaga e entrar em contato com quem desejar. 

Segue abaixo os principais requisitos a serem implementados como primeira versão deste banco de talentos.

## Requisitos

1. **Cadastro de Empresa (Acesso Público):** Cadastro das empresas interessadas em usufruir da plataforma. As empresas deverão fornercer dados como nome, local, tamanho (número de funcionários) e área de atuação.

2. **Cadastro de Interessados (Acesso Público):** Cadastro dos talentos interessados em usufruir dos recursos da plataforma. No momento do cadastro, os candidatos deverão fornercer dados como nome, endereço, contato, áreas de interesse e formação.

3. **Listagem/Busca de talentos (Acesso Empresa):** As empresas, se assim desejarem, poderão fazer a busca na plataforma por potenciais talentos que se encaixem nas suas preferências.
	* A empresa, ao encontrar um candidato de interesse, poderá selecionar esse candidato na lista para visualiza suas informações. 	
4. **Cadastro de Vagas (Acesso Empresa):** Cadastro de vagas de emprego. As empresas poderão cadastrar vagas de emprego para que os talentos cadastros na plataforma possam manifestar o seu interesse. Uma vaga deverá ter dados como cargo ofertado, salário, local de trabalho, carga horária e descrição das atividades.

5. **Listagem/Busca de Vagas (Acesso Empresa/Interessado):** Tanto as empresas quanto os talentos cadastrados poderão fazer busca de vagas de acordo com seus interesses.
	* O candidato, ao encontrar uma vaga de interesse, poderá selecionar essa vaga na lista para visualizar seus detalhes. 

É importante ressaltar que as funcionalidades de cadastro deverão ser acompanhados de suas respectivas funcionalidades de alteração e exclusão. Isto é, você deverá fornercer meios para alteração e exclusão das entidades (talentos, empresas e vagas) do sistema.

#### Armazenamento dos dados

Os armazenamentos dos dados relacionados aos interessados, empresas, e vagas deverão ser feitas em arquivos.


## Avaliação

A avaliação do trabalho será dividida entre **entrega**, que corresponde a avaliação do estado do trabalho nas entregas intermediárias e na entrega final, e **apresentação**, que corresponde na avaliação final do sistema em si e sua apresentação.

### Entrega (5 pontos)

O trabalho será composto por três entregas totais, sendo duas delas entregas parciais. As datas de cada entrega, assim como o que deve ser entregue em cada uma e sua pontuação, estão descritas na tabela abaixo:

Pontuação 	|Data      | O que é para ser entregue?                        | TAG
-----------	|----------|---------------------------------------------------|------------------
2 pontos	|01/07/2016| Prototipagem em HTML das telas do sistema         | Entrega 1
3 pontos		|15/07/2016| Pelo menos **duas** funcionalidades implementadas | Entrega 2
N/A		 	|04/08/2016| Entrega Final                                     | Entrega Final


As entregas deverão ser marcadas com tags do próprio Git, indicadas na tabela acima. Leia sobre tags [aqui](http://imasters.com.br/artigo/21127/software-livre/como-trabalhar-com-tags-no-git/?trace=1519021197&source=single).

### Apresentação (10 pontos)

A apresentação do trabalho ocorrerá no dia **05/08/2016**. Você deverá apresentar seu trabalho para seus colegas de turma junto de uma **banca de avaliação** que irá avaliar seu trabalho.

A banca de avaliação contará, a princípio, com **um especialista no desenvolvimento de software** que irá avaliar principalmente os aspectos internos do sistema (código, estruturação, etc.) e **um usuário comum**, que irá avaliar principalmente os aspectos externos do sistema (design, usabilidade, etc.).

A apresentação será dividida em duas partes:

* **Explicação:** Apresentação sobre o sistema, principais funcionalidades, o que foi implementado, o que foi usado, etc. etc.
* **Demonstração:** Você irá executar o seu sistema e mostrar o funcionamento dos requisitos implementados.

## Pilha de Tecnologias

Você estará livre para utilizar as bibliotecas e frameworks que considerar necessários. O uso de tais recursos inclusive é incentivado!!

Contudo, o desenvolvimento do trabalho **deve** englobar os seguintes conceitos:

* HTML
* CSS
* JavaScript
* PHP: Classes, funções, etc.
* PHP: Sessões e Cookies
* PHP: Arquivos