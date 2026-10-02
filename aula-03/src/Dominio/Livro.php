<?php
declare(strict_types=1);

namespace Biblioteca\Dominio;

use DomainException;

final class Livro
{
    /** @param list<string> $emprestimos */
    public function __construct(
        public readonly int $id,
        public readonly string $titulo,
        public readonly string $autor,
        public readonly int $ano,
        private array $emprestimos = [],
        private Estado $estado = Estado::Disponivel,
    ) {}

    public function emprestar(string $leitor): void
    {
        // TODO: recusar com uma DomainException se já estiver emprestado,
        // registar o leitor e passar o estado a Estado::Emprestado.
        throw new DomainException('Por implementar.');
    }

    public function estaEmprestado(): bool
    {
        return $this->estado === Estado::Emprestado;
    }

    public function estado(): Estado
    {
        return $this->estado;
    }
}
