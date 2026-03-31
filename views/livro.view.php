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
            <div class="text-xs italic">⭐️⭐️⭐️ (3 avaliações)</div>
        </div>
    </div>
    <div class="text-sm mt-2"><?= $livro->description ?></div>
</div>