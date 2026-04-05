<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Wise</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-stone-950 text-stone-200">
    <header class="bg-stone-900 shadow-lg">
        <nav class="max-w-screen-lg mx-auto flex justify-between py-4">
            <div class="font-bold text-xl tracking-wide">Book Wise</div>
            <ul class="flex space-x-4 font-bold">
                <li>
                    <a class="text-lime-500" href="/">
                        Explorar
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="/meus-livros">
                        Meus livros
                    </a>
                </li>
            </ul>

            <ul>
                <?php if (auth()): ?>
                    <li><a href="/logout">Oi, <?= auth()->nome ?></a></li>
                <?php else: ?>
                    <li><a href="/login">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main class="mx-auto max-w-screen-lg space-y-6">
        <?php if ($mensagem = flash()->get('mensagem')): ?>

            <div class="border-green-800 bg-green-900 text-green-400 p-2 rounded border-2 text-sm font-bold">
                <?= $mensagem ?>
            </div>

        <?php endif; ?>
        <?php require "views/{$view}.view.php"; ?>
        </section>
    </main>
</body>

</html>