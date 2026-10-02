<?php
declare(strict_types=1);

namespace Biblioteca\Apresentacao;

/**
 * O equivalente ao render() da aula 02, agora com espaço de nomes.
 * Continua a valer a regra: nenhuma tag HTML em src/, nenhuma lógica em views/.
 */
final class Vista
{
    public function __construct(private readonly string $pasta) {}

    /** @param array<string, mixed> $dados */
    public function render(string $vista, array $dados = [], string $titulo = 'Biblioteca'): void
    {
        $conteudo = $this->pasta . "/$vista.php";
        extract($dados);
        require $this->pasta . '/layout.php';
    }
}
