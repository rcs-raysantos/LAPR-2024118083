<?php
declare(strict_types=1);

namespace Biblioteca\Dominio;

use RuntimeException;

final class LivroNaoEncontrado extends RuntimeException
{
    public static function comId(int $id): self
    {
        // TODO: devolver uma instância com uma mensagem que diga o que falhou.
        // «Exception('erro')» não ajuda ninguém às três da manhã.
        return new self('Por implementar.');
    }
}
