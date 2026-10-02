<?php

namespace Biblioteca\Infraestrutura;

use Biblioteca\Dominio\Livro;
use Biblioteca\Dominio\Repositorio;

class RepositorioJson implements Repositorio
{
    /** @var array<int, Livro> */
    private array $itens = [];

    public function __construct(string $caminhoFicheiro)
    {
        if (file_exists($caminhoFicheiro)) {
            $conteudo = file_get_contents($caminhoFicheiro);
            $dados = json_decode($conteudo, true) ?? [];

            foreach ($dados as $item) {
                $livro = new Livro(
                    id: (int) $item['id'],
                    titulo: (string) $item['titulo'],
                    autor: (string) $item['autor'],
                    ano: (int) $item['ano']
                );

                $this->itens[$livro->id] = $livro;
            }
        }
    }

    public function porId(int $id): ?Livro
    {
        return $this->itens[$id] ?? null;
    }

    public function todos(): array
    {
        return array_values($this->itens);
    }

    public function guardar(Livro $livro): void
    {
        $this->itens[$livro->id] = $livro;
    }
}