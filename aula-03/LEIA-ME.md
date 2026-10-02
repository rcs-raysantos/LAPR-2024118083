# Aula 03 — PHP avançado e instalação do Laravel

## Esqueleto do desafio

Vem de `Aula 03 — PHP avançado e instalação do Laravel/enunciado/esqueleto`, do site da cadeira: https://pwls.csoares.me/aulas/03/esqueleto/

O esqueleto responde com a lista vazia. Falta preencher o domínio, o repositório em memória e o serviço.

## Como correr

Precisas de **PHP 8.3 ou superior**. Não é preciso Composer nem base de dados: é tudo ficheiros.

```bash
cd aula-03-esqueleto
php -S localhost:8080 -t esqueleto/public
```

Depois, abrir http://localhost:8080 no browser.

Endereços a experimentar:

- `http://localhost:8080/`
- `http://localhost:8080/livros`
- `http://localhost:8080/livros/1`
- `http://localhost:8080/livros/999`

Sem instalar nada, o mesmo corre no browser (com editor e registo de pedidos):
https://pwls.csoares.me/aulas/03/esqueleto/

## O desafio

O enunciado está no `enunciado.md`, aqui ao lado. Procura os `TODO:` nos ficheiros.

Está feito quando: `/livros/1` dá 200 e `/livros/999` dá 404 **vindo de uma exceção**, não de um `if`.
O extra (repositório JSON) já tem o ficheiro `dados/livros.json` no esqueleto.

Isto é para praticares os conceitos da aula. O projeto tem tema à vossa escolha e é acompanhado no Canvas.
