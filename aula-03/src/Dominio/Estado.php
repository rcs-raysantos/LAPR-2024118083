<?php
declare(strict_types=1);

namespace Biblioteca\Dominio;

enum Estado: string
{
    case Disponivel = 'disponivel';
    case Emprestado = 'emprestado';
    case Perdido = 'perdido';

    public function podeSerEmprestado(): bool
    {
        return $this === self::Disponivel;
    }

    public function etiqueta(): string
    {
        return match ($this) {
            self::Disponivel => 'Disponível',
            self::Emprestado => 'Emprestado',
            self::Perdido => 'Perdido',
        };
    }
}
