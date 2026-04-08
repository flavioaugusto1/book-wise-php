<h1>Meus livros</h1>
<div class="grid grid-cols-4 gap-4">
    <div class="grid col-span-3 gap-4">

    </div>
    <div class="border border-stone-700 rounded p4">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Cadastre um novo livro</h1>
        <form class="p-4 space-y-4" method="POST" action="/livro-criar">
            <?php if ($validacoes = flash()->get('validacoes')): ?>
                <div class="border-red-800 bg-red-900 text-red-400 p-2 rounded border-2 text-sm font-bold">
                    <ul>
                        <li>Erro no registro</li>
                        <?php foreach ($validacoes as $validacao): ?>
                            <li><?= $validacao ?></li>
                        <? endforeach; ?>
                    </ul>
                </div>
            <? endif; ?>
            <div class="flex flex-col space-y-1">
                <Label class="text-stone-400">Título</Label>
                <input
                    type="text"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    placeholder="Título do livro"
                    name="titulo" />

                <Label class="text-stone-400">Autor</Label>
                <input
                    type="text"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    placeholder="Autor do livro"
                    name="autor" />

                <Label class="text-stone-400">Descrição</Label>
                <textarea
                    type="text"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    placeholder="Descreva o que achou"
                    name="descricao"></textarea>
                
                <Label class="text-stone-400">Ano de lançamento</Label>
                <select
                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                        placeholder="Nota de 1 a 5"
                        name="ano_de_lancamento"
                >
                            <?php foreach(range(1800, date('Y')) as $ano): ?>
                                <option value=<?= $ano ?>><?= $ano ?></option>
                            <?php endforeach ?>
                </select>
                
            </div>
            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 p-2 rounded border-2 hover: cursor-pointer">Salvar</button>
        </form>
    </div>
</div>