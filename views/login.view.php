<div class="mt-6 grid grid-cols-2 gap-2">
    <div class="border border-stone-700 rounded p4">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Login</h1>
        <form class="p-4 space-y-4" method="POST">
            <div class="flex flex-col space-y-1">
                <Label class="text-stone-400">E-mail</Label>
                <input
                    type="email"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    placeholder="E-mail"
                    name="email"
                    required />

                <Label class="text-stone-400">Senha</Label>
                <input
                    type="password"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    placeholder="Senha"
                    name="senha"
                    required />

            </div>
            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 p-2 rounded border-2 hover: cursor-pointer">Login</button>
        </form>
    </div>

    <div class="border border-stone-700 rounded p4">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Registrar</h1>
        <form class="p-4 space-y-4" method="POST" action="/registrar">
            <?php if(strlen($mensagem) > 0): ?>
                <div class="border-green-800 bg-green-900 text-green-400 p-2 rounded border-2">
                    <?= $mensagem ?>
                </div>
            <? endif; ?>

            <div class="flex flex-col space-y-1">
                <Label class="text-stone-400">Nome</Label>
                <input
                    type="text"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    placeholder="Nome"
                    name="nome"
                    required />

                <Label class="text-stone-400">E-mail</Label>
                <input
                    type="email"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    placeholder="E-mail"
                    name="email"
                    required />

                <Label class="text-stone-400">Confirme seu e-mail</Label>
                <input
                    type="email"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    placeholder="E-mail"
                    name="email-confirmacao"
                    required />

                <Label class="text-stone-400">Senha</Label>
                <input
                    type="password"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    placeholder="Senha"
                    name="senha"
                    required />

            </div>

            <button type="reset" class="border-stone-800 bg-stone-900 text-stone-400 p-2 rounded border-2 hover: cursor-pointer">
                Cancelar
            </button>
            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 p-2 rounded border-2 hover: cursor-pointer">
                Registrar
            </button>
        </form>
    </div>
</div>