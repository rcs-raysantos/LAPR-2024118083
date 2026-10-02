<?php
declare(strict_types=1);

namespace Biblioteca\Dominio;

use DomainException;
use JsonSerializable;

final class Livro implements JsonSerializable
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
        if ($this->estaEmprestado()) {
            throw new DomainException('Livro já está emprestado.');
        }

        $this->emprestimos[] = $leitor; // coloca o leitor na lista
        $this->estado = Estado::Emprestado; // coloca o estado do livro como ocupado
    }

    public function estaEmprestado(): bool
    {
        return $this->estado === Estado::Emprestado;
    }

    public function estado(): Estado
    {
        return $this->estado;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'ano' => $this->ano,
            'estado' => $this->estado->name,
            'emprestimos' => $this->emprestimos,
        ];
    }
}
