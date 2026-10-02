<?php
declare(strict_types=1);

namespace Biblioteca\Aplicacao;

use Biblioteca\Dominio\Livro;
use Biblioteca\Dominio\LivroNaoEncontrado;
use Biblioteca\Dominio\Repositorio;

final class ServicoLivros
{
    // Recebe o que precisa em vez de o ir buscar: nunca fazer `new Repositorio...` aqui dentro.
    public function __construct(private readonly Repositorio $repo) {}

    /** @return list<Livro> */
    public function listar(string $ordem = 'titulo'): array
    {
        $livros = $this->repo->todos();

        usort($livros, function ($a, $b) use ($ordem) {

            /*
            if($ordem == 'titulo') {
                return $a->getTitulo() <=> $b->getTitulo(); // <=> serve para comparar
            }

            if($ordem == 'ano'){
                return $a->getAno() <=> $b->getAno();
            }

            return 0; // não ordena!
            */

            return match ($ordem) {
                'ano' => $a->getAno() <=> $b->getAno(),
                default => $a->getTitulo() <=> $b->getTitulo(), // "se não for ano, vai por título por padrão"
            };
        });

        return $livros;
    }

    /** @throws LivroNaoEncontrado quando não existe livro com este id. */
    public function obter(int $id): Livro
    {
        return $this->repo->porId($id) ?? throw LivroNaoEncontrado::comId($id);
    }
}
