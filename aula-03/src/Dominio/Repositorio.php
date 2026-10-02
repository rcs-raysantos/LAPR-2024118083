<?php
declare(strict_types=1);

namespace Biblioteca\Dominio;

interface Repositorio
{
    public function guardar(Livro $livro): void;

    public function porId(int $id): ?Livro;

    /** @return list<Livro> */
    public function todos(): array;
}
