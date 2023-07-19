# Name baby caXos

Eu ainda não tinha começado a programar em PHP, Laravel e Vue quando eu e minha esposa descobrimos que estávamos esperando um filho ou uma filha, então pensei em criar uma plataforma para sugestão de nomes de bebês, para eu manter foco em um objetivo.

Com isso, nasceu a plataforma Name My Baby. No meu caso, como meu apelido é caXos, então o nome da plataforma ficaria “Name baby caXos”, mas pode ser facilmente adaptável.

A plataforma conta com registro de usuário e de nomes de bebês, bem como a possibilidade votar a favor os nomes já cadastrados.

Cada usuário pode sugerir quantos nomes quiser, indicando se o nome é voltado para menino, menina ou neutro. 

Ainda, cada usuário pode votar a favor de quantos nomes quiser, mas apenas um voto por nome.

A biblioteca [DataTable.net](http://DataTable.net) cuida de apresentar os nomes em ordem, permitindo ao usuário filtrar, reordenar, baseado no nome, na quantidade de votos, ou pelo gênero.

É possível, por exemplo, alterar a landing page para constar as “regras” da campanha de nomear o bebê, estipulando prazo limite, ou até eventual recompensa para quem sugeriu o nome com mais votos.

**Funcionalidades**

- Cadastro de usuários
- Cadastro de nomes de bebês
- Possibilidade de votar a favor de cada nome

**Meu papel neste projeto**

Eu tive a ideia, juntei-a com a possibilidade de aprender PHP, PostgreSQL, Laravel, VueJs e Tailwind CSS, então eu fiz tudo: idealizei e programei as telas, bem como fiz a parte de back. Considerando que eu ainda estava aprendendo, tive uma ajuda do Willian Josefi para resolver a parte de votos.

**Identidade visual**

Semi-estravagante, pois é cheio de cores rosa e azul claro. Tailwind CSS

**Período de desenvolvimento**

Abril 2022 - Julho 2022

**Linguagens, frameworks, plataformas e aplicativos utilizados**

**Equipe**

Jorge Gomez

**Planejamento**

Nenhum. Considerei o projeto “finalizado” em julho de 2022, pois já tinha desenvolvido as funções que eu queria testar, e outros projetos apareceram para ocupar meu tempo.

**Imagens**

**Link**

[https://github.com/caXos/name-baby-caxos](https://github.com/caXos/name-baby-caxos)

**Como usar o projeto**

1. Acesse o link acima e clone o repositório
2. Abra sua IDE de preferência
3. Renomeie o arquivo .env.example para .env e configure-o, como por exemplo:
    
    ```php
    DB_CONNECTION=pgsql
    DB_HOST=localhost
    DB_PORT=5432
    DB_DATABASE=DEV_namebabycaxos
    DB_USERNAME=namemybaby
    DB_PASSWORD=namemybaby
    ```
    
4. Abra um terminal e use os comandos
    
    ```powershell
    npm install
    npm upgrade
    composer require inertiajs/inertia-laravel
    composer install --ignore-platform-reqs
    composer upgrade
    php artisan migrate:fresh --seed
    ```

    