<?php
declare(strict_types=1);

namespace Biblioteca\Dominio;

use RuntimeException;

final class LivroNaoEncontrado extends RuntimeException
{
    public static function comId(int $id): self
    {
        return new self("O livro de {$id} não foi encontrado.");
    }
}
