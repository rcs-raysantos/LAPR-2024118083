# Desafio da aula 02 — Um mini-monólito que responde

**Modo:** a pares, no repositório do grupo

## Contexto

Vão escrever, de raiz, uma aplicação PHP com três rotas e sem framework nenhuma. É pequena de
propósito: o objetivo é perceberem o ciclo completo do pedido antes de deixarem a framework
tratar dele.

## Tarefas

1. Criar a estrutura `public/index.php`, `src/` e `views/`, e servir com
   `php -S localhost:8080 -t public`.
2. Implementar `GET /` com uma página de entrada e `GET /livros` com uma listagem vinda de um
   array.
3. Implementar `GET /livros/{id}` — ler o id do caminho e devolver 404 quando não existir.
4. Aceitar `?ordem=titulo|ano` em `/livros` e ordenar a listagem, validando o valor recebido.
5. Separar decisão e apresentação: nenhuma tag HTML dentro de `src/`, nenhuma lógica dentro de
   `views/`.

## Como sei que está feito

As três rotas respondem no navegador; um id inexistente devolve mesmo 404 (ver no separador de
rede); um `?ordem=xpto` não parte a página; e não há HTML em `src/`.

Comandos para confirmar sem sair do terminal:

```bash
php -S localhost:8080 -t public
curl -i http://localhost:8080/
curl -i http://localhost:8080/livros
curl -i "http://localhost:8080/livros?ordem=ano"
curl -i "http://localhost:8080/livros?ordem=xpto"     # tem de responder 200
curl -i http://localhost:8080/livros/1
curl -i http://localhost:8080/livros/999              # tem de responder 404
```

## Extra

Acrescentem `POST /livros` com um formulário que junta um livro ao array em sessão — é o que
vamos formalizar na semana 4.

## O que está no esqueleto

`enunciado/esqueleto/` já arranca e responde. As vistas e as funções `render()`,
`naoEncontrado()` e `redirect()` estão feitas; o que falta está assinalado com `TODO:` em
`public/index.php` e em `src/livros.php`. Com o esqueleto tal como está, `/livros` mostra a
lista por ordem de inserção e `/livros/1` responde 404 — é esse o ponto de partida.