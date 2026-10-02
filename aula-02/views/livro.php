<h1><?= htmlspecialchars($livro['titulo'] ?? 'Sem título') ?></h1>
<dl>
    <dt>Autor</dt><dd><?= htmlspecialchars($livro['autor'] ?? 'Desconhecido') ?></dd>
    <dt>Ano</dt><dd><?= ((int) $livro['ano'] ?? 0) ?></dd>
</dl>
<p><a href="/livros">Voltar à lista</a></p>
