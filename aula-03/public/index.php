<?php
declare(strict_types=1);

// Uma só linha de carregamento: o PSR-4 escrito à mão em ../autoload.php trata do resto.
// Quando tiverem Composer, troquem por ../vendor/autoload.php — nada mais muda.
require __DIR__ . '/../autoload.php';

use Biblioteca\Aplicacao\ServicoLivros;
use Biblioteca\Apresentacao\Vista;
use Biblioteca\Dominio\LivroNaoEncontrado;
use Biblioteca\Infraestrutura\RepositorioEmMemoria;

ini_set('display_errors', '1');
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

// TODO: povoar o repositório com quatro livros do vosso domínio.
// Enquanto estiver vazio, /livros responde 200 com a lista vazia — é o ponto de partida.
$repo = new RepositorioEmMemoria([]);

$servico = new ServicoLivros($repo);
$vista   = new Vista(__DIR__ . '/../views');

$caminho = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$metodo  = $_SERVER['REQUEST_METHOD'];

try {
    if ($metodo === 'GET' && $caminho === '/') {
        $vista->render('inicio', [], 'Biblioteca');
        exit;
    }

    if ($metodo === 'GET' && $caminho === '/livros') {
        $ordem = in_array($_GET['ordem'] ?? '', ['titulo', 'ano'], true) ? $_GET['ordem'] : 'titulo';
        $vista->render('lista', ['livros' => $servico->listar($ordem), 'ordem' => $ordem], 'Livros');
        exit;
    }

    if ($metodo === 'GET' && preg_match('#^/livros/(\d+)$#', $caminho, $partes) === 1) {
        $livro = $servico->obter((int) $partes[1]);
        $vista->render('livro', ['livro' => $livro], $livro->titulo);
        exit;
    }

    http_response_code(404);
    $vista->render('erro-404', ['mensagem' => 'Não existe nada em ' . $caminho . '.'], 'Não encontrado');
} catch (LivroNaoEncontrado $e) {
    // O 404 do recurso vem daqui: de uma exceção capturada, não de um if.
    http_response_code(404);
    $vista->render('erro-404', ['mensagem' => $e->getMessage()], 'Não encontrado');
}
