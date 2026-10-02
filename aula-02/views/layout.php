<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($titulo) ?></title>
</head>
<body>
<header>
    <a href="/">Biblioteca</a> · <a href="/livros">Livros</a>
</header>
<main>
<?php require $conteudo; ?>
</main>
</body>
</html>
