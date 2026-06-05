<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Pet - Petshop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-pink-50">
    <nav class="bg-white shadow p-5 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-pink-500">🐾 Petshop</h1>
        <a href="/pets" class="text-gray-500 hover:text-pink-500">Voltar</a>
    </nav>

    <div class="p-10 flex justify-center">
        <div class="w-full max-w-xl bg-white rounded-3xl shadow p-10">
            <h2 class="text-3xl font-bold text-gray-700 mb-8">Cadastrar Pet</h2>

            <form method="POST" action="/pets" class="space-y-5">
                @csrf
                <div>
                    <label class="text-gray-600">Nome do Pet</label>
                    <input type="text" name="nomepet" placeholder="Digite o nome"
                        class="w-full mt-2 p-4 rounded-2xl border border-gray-200 outline-none focus:border-pink-400">
                </div>
                <div>
                    <label class="text-gray-600">Dono</label>
                    <input type="text" name="dono" placeholder="Nome do dono"
                        class="w-full mt-2 p-4 rounded-2xl border border-gray-200 outline-none focus:border-pink-400">
                </div>
                <div>
                    <label class="text-gray-600">Tipo</label>
                    <input type="text" name="tipo" placeholder="Ex: Cachorro, Gato..."
                        class="w-full mt-2 p-4 rounded-2xl border border-gray-200 outline-none focus:border-pink-400">
                </div>
                <button class="w-full bg-pink-500 hover:bg-pink-400 transition-all text-white font-bold py-4 rounded-2xl">
                    Salvar
                </button>
            </form>
        </div>
    </div>
</body>
</html>
