<?php
declare(strict_types=1);

/** Carrega uma vista dentro do layout comum. Não mexer. */
function render(string $vista, array $dados = [], string $titulo = 'Biblioteca'): void
{
    $conteudo = __DIR__ . "/../views/$vista.php";
    extract($dados);
    require __DIR__ . '/../views/layout.php';
}

/** Responde 404. Não mexer. */
function naoEncontrado(string $mensagem = 'Página não encontrada.'): void
{
    http_response_code(404);
    render('erro-404', ['mensagem' => $mensagem], 'Não encontrado');
}

/** Redireciona depois de um POST. Útil no extra. */
function redirect(string $para, int $codigo = 303): never
{
    http_response_code($codigo);
    header("Location: $para");
    exit;
}
