<?php
declare(strict_types=1);

namespace Biblioteca\Infraestrutura;

use Biblioteca\Dominio\Livro;
use Biblioteca\Dominio\Repositorio;

final class RepositorioEmMemoria implements Repositorio
{
    /** @var array<int, Livro> */
    private array $itens = [];

    /** @param list<Livro> $livros */
    public function __construct(array $livros = [])
    {
        foreach ($livros as $livro) {
            $this->guardar($livro);
        }
    }

    public function guardar(Livro $livro): void
    {
        // TODO: guardar o livro indexado pelo seu id.
    }

    public function porId(int $id): ?Livro
    {
        // TODO: devolver o livro com este id, ou null se não existir.
        return null;
    }

    public function todos(): array
    {
        return array_values($this->itens);
    }
}
