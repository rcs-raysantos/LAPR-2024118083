<?php
// Garantir que as variáveis existem caso a função não as tenha enviado
$livros = $livros ?? [];
$ordem  = $ordem ?? 'asc';
?>
<h1>Livros</h1>
<p>
    Ordenar por:
    <a href="/livros?ordem=titulo">título</a> ·
    <a href="/livros?ordem=ano">ano</a>
    (atual: <?= htmlspecialchars($ordem) ?>)
</p>
<ul>
<?php foreach ($livros as $livro): ?>
    <li>
        <a href="/livros/<?= (int) $livro['id'] ?>"><?= htmlspecialchars($livro['titulo']) ?></a>
        — <?= htmlspecialchars($livro['autor']) ?> (<?= (int) $livro['ano'] ?>)
    </li>
<?php endforeach; ?>
</ul>
