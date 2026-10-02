# Aula 02 — PHP e a aplicação monolítica

## Esqueleto do desafio

Vem de `Aula 02 — PHP e a aplicação monolítica/enunciado/esqueleto`, do site da cadeira: https://pwls.csoares.me/aulas/02/esqueleto/

Tal como está, `/livros` mostra a lista pela ordem de inserção e `/livros/1` responde 404.
Os `TODO:` estão em `public/index.php` e `src/livros.php`.

## Como correr

Precisas de **PHP 8.3 ou superior**. Não é preciso Composer nem base de dados: é tudo ficheiros.

```bash
cd aula-02-esqueleto
php -S localhost:8080 -t esqueleto/public
```

Depois, abrir http://localhost:8080 no browser.

Endereços a experimentar:

- `http://localhost:8080/`
- `http://localhost:8080/livros`
- `http://localhost:8080/livros?ordem=ano`
- `http://localhost:8080/livros?ordem=xpto`
- `http://localhost:8080/livros/1`
- `http://localhost:8080/livros/999`

Sem instalar nada, o mesmo corre no browser (com editor e registo de pedidos):
https://pwls.csoares.me/aulas/02/esqueleto/

## O desafio

O enunciado está no `enunciado.md`, aqui ao lado. Procura os `TODO:` nos ficheiros.

Está feito quando: `/livros/1` dá 200, `/livros/999` dá 404, `?ordem=ano` ordena, `?ordem=xpto`
responde 200 sem avisos, e não há HTML em `src/`. Confirma os códigos no separador **Pedidos**.

Isto é para praticares os conceitos da aula. O projeto tem tema à vossa escolha e é acompanhado no Canvas.
