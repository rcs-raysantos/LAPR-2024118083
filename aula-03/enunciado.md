# Desafio da aula 03 — O projeto arranca hoje

**Modo:** a pares, no repositório do grupo

## Contexto

Metade do desafio é PHP orientado a objetos, a outra metade é deixar o esqueleto do vosso
projeto a correr e no repositório. A partir da próxima aula, tudo o que fizermos assenta neste
ambiente.

## Tarefas

1. Reescrever o mini-monólito da aula 2 com classes: uma classe de domínio, uma interface de
   repositório e uma implementação em memória.
2. Organizar tudo em `src/` com espaço de nomes próprio e autoload PSR-4 configurado no
   `composer.json`.
3. Lançar uma exceção própria quando o recurso não existe e traduzi-la em 404 no ponto de
   entrada.
4. Criar o projeto Laravel do grupo, com `.env` configurado e a aplicação a responder em
   `localhost:8080`.
5. Criar a rota e a vista da primeira listagem do vosso domínio, ainda com dados fictícios.
6. Configurar o `.gitignore`: `vendor/` e `.env` fora do repositório, `composer.lock` dentro.

## Como sei que está feito

`composer dump-autoload` não dá erros; o 404 vem de uma exceção capturada e não de um `if`;
`php artisan serve --port=8080` mostra a vossa listagem; e o repositório não tem `vendor/` nem `.env`.

Comandos para confirmar a primeira metade sem sair do terminal:

```bash
php -S localhost:8080 -t public
curl -i http://localhost:8080/livros
curl -i http://localhost:8080/livros/1      # 200
curl -i http://localhost:8080/livros/999    # 404, vindo da exceção
```

E a segunda metade:

```bash
php artisan serve --port=8080
curl -i http://localhost:8080/livros
php artisan route:list
git status --short                          # não pode aparecer vendor/ nem .env
```

## Extra

Substituam o repositório em memória por um que leia de um ficheiro JSON — sem mudar uma linha
do código que o usa. É a interface a pagar-se. O ficheiro `dados/livros.json` já está no
esqueleto.

## O que está no esqueleto

`enunciado/esqueleto/` já arranca e responde — com a lista vazia, que é o ponto de partida.
Está feito:

- `autoload.php` — **carregador PSR-4 escrito à mão**, para trabalharem sem Composer instalado.
  O `composer.json` ao lado já tem o mesmo mapeamento; assim que tiverem Composer, corre-se
  `composer dump-autoload` e troca-se a linha do `require` em `public/index.php` por
  `vendor/autoload.php`. Nem uma classe precisa de mudar.
- `Biblioteca\Dominio\Estado` (enum), `Biblioteca\Dominio\Repositorio` (interface),
  `Biblioteca\Apresentacao\Vista` e as vistas.
- O encaminhamento e o `try/catch` de `public/index.php`.

Falta o que está assinalado com `TODO:`:

- `src/Dominio/Livro.php` — `emprestar()`.
- `src/Dominio/LivroNaoEncontrado.php` — a mensagem de `comId()`.
- `src/Infraestrutura/RepositorioEmMemoria.php` — `guardar()` e `porId()`.
- `src/Aplicacao/ServicoLivros.php` — `listar()` e `obter()`.
- `public/index.php` — povoar o repositório com os livros do vosso domínio.

Para a parte do Laravel, seguir `../instalar-laravel.md` e copiar os ficheiros de
`../exemplos/07-laravel-primeira-rota/`.