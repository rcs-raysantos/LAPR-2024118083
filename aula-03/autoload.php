<?php
declare(strict_types=1);

/**
 * Carregador automático PSR-4 escrito à mão.
 *
 * Substitui o vendor/autoload.php enquanto o Composer não estiver disponível.
 * Assim que houver Composer, corre-se `composer dump-autoload` com o composer.json
 * que está ao lado e troca-se, em public/index.php, a linha
 *     require __DIR__ . '/../autoload.php';
 * por
 *     require __DIR__ . '/../vendor/autoload.php';
 * Nem uma única classe precisa de mudar: a convenção é a mesma.
 */
spl_autoload_register(static function (string $classe): void {
    $prefixo = 'Biblioteca\\';
    $baseDir = __DIR__ . '/src/';

    if (!str_starts_with($classe, $prefixo)) {
        return;
    }

    $relativo = substr($classe, strlen($prefixo));
    $ficheiro = $baseDir . str_replace('\\', '/', $relativo) . '.php';

    if (is_file($ficheiro)) {
        require $ficheiro;
    }
});
