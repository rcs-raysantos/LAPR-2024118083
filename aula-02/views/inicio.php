<h1>Biblioteca</h1>
<p>Aplicação monolítica em PHP puro, sem framework.</p>
<ul>
    <li><a href="/livros">Lista de livros</a></li>
    <li><a href="/livros?ordem=ano">Lista ordenada por ano</a></li>
</ul>
<h2>Cadastrar livro</h2>
<form action="/livros" method="POST">
    <div>
        <label for="titulo">Título:</label>
        <br>
        <input type="text" id="titulo" name="titulo" required>
    </div>

    <div>
        <label for="autor">Autor:</label>
        <br>
        <input type="text" id="autor" name="autor" required>
    </div>

    <div>
        <label for="ano">Ano de Publicação:</label>
        <br>
        <input type="number" id="ano" name="ano" required>
    </div>
    <br>
    <button type="submit">Cadastrar Livro</button>
</form>

<?php

?>