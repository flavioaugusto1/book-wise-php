<?php
$somatoriaNotas = array_reduce($avaliacoes, function ($carry, $a) {
    return ($carry ?? 0) + $a->nota;
}) ?? 0;

$mediaAvaliacoes = round($somatoriaNotas / count($avaliacoes));

$notaFinal = str_repeat('⭐️', $mediaAvaliacoes);

?>

<div class="p-2 rounded border-stone-800 border-2 bg-stone-900 mt-14">
    <div class="flex">
        <div class="w-1/3">image</div>
        <div class="space-y-1">
            <a
                href="/livro?id=<?= $livro->id ?>"
                class="font-semibold hover:underline">
                <?= $livro->title ?>
            </a>
            <div class="text-xs italic"><?= $livro->author ?></div>
            <div class="text-xs italic"><?= $notaFinal ?> (<?= count($avaliacoes) ?> Avaliações)</div>
        </div>
    </div>
    <div class="text-sm mt-2"><?= $livro->description ?></div>
</div>

<h2>
    Avaliações
</h2>
<div class="grid grid-cols-4 gap-4">
    <div class="grid col-span-3 gap-4">
        <?php foreach ($avaliacoes as $avaliacao): ?>
            <div class="border border-stone-700 rounded p4">
                <div> 
                    <?php $nota = str_repeat("⭐️", $avaliacao->nota); ?>
                    <?= $nota ?>
                </div>

                <?= $avaliacao->avaliacao ?>
                
                <div class="text-stone-400"> - <?= $avaliacao->usuario_nome ?></div>
            </div>
        <? endforeach; ?>
    </div>
    <?php if (auth()): ?>
        <div class="border border-stone-700 rounded p4">
            <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">O que achou do livro?</h1>
            <form class="p-4 space-y-4" method="POST" action="/avaliacao-criar">
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
                <input type="hidden" name="livro_id" value="<?= $livro->id ?>">
                <div class="flex flex-col space-y-1">
                    <Label class="text-stone-400">Avaliação</Label>
                    <textarea
                        type="text"
                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                        placeholder="Avaliação"
                        name="avaliacao"></textarea>

                    <Label class="text-stone-400">Nota</Label>
                    <select
                        type="number"
                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                        placeholder="Nota de 1 a 5"
                        name="nota">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                </div>
                <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 p-2 rounded border-2 hover: cursor-pointer">Salvar</button>
            </form>
        </div>
    <? endif; ?>
</div>