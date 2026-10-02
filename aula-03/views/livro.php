<h1><?= htmlspecialchars($livro->titulo) ?></h1>
<dl>
    <dt>Autor</dt><dd><?= htmlspecialchars($livro->autor) ?></dd>
    <dt>Ano</dt><dd><?= (int) $livro->ano ?></dd>
    <dt>Estado</dt><dd><?= htmlspecialchars($livro->estado()->etiqueta()) ?></dd>
</dl>
<p><a href="/livros">Voltar à lista</a></p>
