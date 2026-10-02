<?php
declare(strict_types=1);

/** Os dados desta aula vivem num array. A base de dados chega na aula 4. */
function livrosDeBase(): array
{
    return [
        1 => ['id' => 1, 'titulo' => 'Memorial do Convento', 'autor' => 'José Saramago', 'ano' => 1982],
        2 => ['id' => 2, 'titulo' => 'A Cidade e as Serras', 'autor' => 'Eça de Queirós', 'ano' => 1901],
        3 => ['id' => 3, 'titulo' => 'Os Maias', 'autor' => 'Eça de Queirós', 'ano' => 1888],
        4 => ['id' => 4, 'titulo' => 'Mensagem', 'autor' => 'Fernando Pessoa', 'ano' => 1934],
    ];
}

function todosOsLivros(): array
{
    return livrosDeBase();
}

function livroPorId(int $id): ?array
{
    if($id == null || $id == '') {
        return null;
    }
    return livrosDeBase()[$id];
}

function mostrarInicio(): void
{
    http_response_code(200);
    render('inicio', [], 'Biblioteca');
}

function listarLivros(): void
{
    $ordem = 'titulo';

    if(isset($_GET['ordem'])) {
        $valor = $_GET['ordem'];

        if($valor == 'titulo' || $valor == 'ano') {
            $ordem = $valor;
        }
        $ordem = 'titulo';
    }

    $livros = array_values(todosOsLivros());
    usort($livros, function ($a, $b) use ($ordem) {
        return $a[$ordem] <=> $b[$ordem];
    });

    http_response_code(200);
    render('lista', ['livros' => $livros, 'ordem' => $ordem], 'Livros');
}

function mostrarLivro(int $id): void
{
    $livro = livroPorId($id);

    if ($livro === null) {
        naoEncontrado("Não existe livro com o id $id.");
        return;
    }

    http_response_code(200);
    render('livro', ['livro' => $livro], $livro['titulo']);
}

function criarLivro(): void
{
    $livros = todosOsLivros();
    $titulo = $_POST['titulo'];

    if(empty($titulo)) {
        naoEncontrado("Não existe livro com o titulo.");
    }

    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $id = count($livros) + 1;

    $novo_livro = ['id' => $id, 'titulo' => $titulo, 'autor' => $autor, 'ano' => $ano];

    $_SESSION['livros'][$id] = $novo_livro;
    http_response_code(303);
    header("Location: /livros/{$id}");
    exit;
}