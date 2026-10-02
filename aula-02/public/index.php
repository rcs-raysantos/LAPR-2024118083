<?php
// Ponto de entrada único. Servir sempre com:  php -S localhost:8080 -t public
require __DIR__ . '/../src/bootstrap.php';

$caminho = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$metodo  = $_SERVER['REQUEST_METHOD'];

$rotas = [
    'GET /'       => 'mostrarInicio',
    'GET /livros' => 'listarLivros',
    'POST /livros' => 'criarLivro'
];

$chave = "$metodo $caminho";

if (isset($rotas[$chave])) {
    $rotas[$chave]();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') { // garante que o valor e tipo sejam idênticos
    if (preg_match('#^/livros/(\d+)$#', $caminho, $partes)){
        $id = $partes[1]; // pega o inteiro e coloca no «id»
        mostrarLivro((int) $id); // forçamos para que «id» seja um inteiro
    }
}

// Se a requisição for POST para a rota exata /livros
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $caminho === '/livros') {
    criarLivro();
}

naoEncontrado('Não existe nada em ' . $caminho . '.');