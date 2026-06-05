<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pets - Petshop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-pink-50">
    <nav class="bg-white shadow p-5 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-pink-500">🐾 Petshop</h1>
        <a href="/painel" class="text-gray-500 hover:text-pink-500">Voltar ao Painel</a>
    </nav>

    <div class="p-10">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-700">Pets</h2>
            <a href="/pets/criar" class="bg-pink-500 hover:bg-pink-400 text-white font-bold py-3 px-6 rounded-2xl">
                + Novo Pet
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-pink-100">
                    <tr>
                        <th class="p-4 text-left text-gray-600">Nome</th>
                        <th class="p-4 text-left text-gray-600">Dono</th>
                        <th class="p-4 text-left text-gray-600">Tipo</th>
                        <th class="p-4 text-left text-gray-600">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pets as $pet)
                    <tr class="border-t border-gray-100">
                        <td class="p-4">{{ $pet->nomepet }}</td>
                        <td class="p-4">{{ $pet->dono }}</td>
                        <td class="p-4">{{ $pet->tipo }}</td>
                        <td class="p-4 flex gap-3">
                            <a href="/pets/{{ $pet->id }}/editar" class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-4 rounded-xl">Editar</a>
                            <form method="POST" action="/pets/{{ $pet->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-400 hover:bg-red-300 text-white font-bold py-2 px-4 rounded-xl">Deletar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>