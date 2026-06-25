<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom {
            background-image: url('/images/listarcliente.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>

<body class="min-h-screen bg-custom bg-pink-50/80 bg-blend-overlay antialiased text-gray-600">

    <nav class="bg-white/85 backdrop-blur-md shadow-sm p-4 sticky top-0 z-50 flex justify-between items-center border-b border-pink-100">
        <div class="flex items-center gap-2">
            <h1 class="text-2xl font-black bg-gradient-to-r from-pink-500 to-rose-400 bg-clip-text text-transparent tracking-wide drop-shadow-sm">
                Petshop
            </h1>
        </div>

        <a href="{{ route('dashboard') }}"
           class="text-gray-500 hover:text-pink-500 font-bold text-sm transition-all hover:scale-105">
            Voltar para o Painel
        </a>
    </nav>

    <div class="p-6 md:p-12 max-w-6xl mx-auto">

        @if(session('sucesso'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl mb-6 text-center font-bold shadow-sm">
                {{ session('sucesso') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-800 drop-shadow-sm">
                    Clientes Cadastrados
                </h2>
                <p class="text-gray-400 font-medium text-sm mt-1">
                    Gerencie os clientes do petshop
                </p>
            </div>

            <a href="{{ route('clientes.create') }}"
               class="w-full sm:w-auto text-center bg-gradient-to-r from-pink-500 to-rose-400 hover:from-pink-600 hover:to-rose-500 shadow-md transition-all text-white font-black px-6 py-3.5 rounded-xl transform hover:-translate-y-0.5 active:scale-95">
                Novo Cliente
            </a>
        </div>

        <div class="bg-white/95 backdrop-blur-md rounded-[2rem] shadow-xl border border-pink-100/60 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">

                    <thead>
                        <tr class="bg-gradient-to-r from-pink-50/60 to-rose-50/40 border-b border-pink-100/80 text-pink-600 font-black text-sm uppercase tracking-wider">
                            <th class="p-5">Nome do Tutor</th>
                            <th class="p-5">E-mail</th>
                            <th class="p-5">Telefone / WhatsApp</th>
                            <th class="p-5">CPF</th>
                            <th class="p-5 text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-pink-50/50">

                        @if($clientes->count() > 0)

                            @foreach($clientes as $cliente)
                                <tr class="hover:bg-pink-50/20 transition-all font-medium text-gray-700">

                                    <td class="p-5 font-bold text-gray-800">
                                        <div class="flex items-center gap-2">
                                            <div class="w-2 h-2 rounded-full bg-pink-400"></div>
                                            {{ $cliente->nome }}
                                        </div>
                                    </td>

                                    <td class="p-5 text-gray-500 text-sm">
                                        {{ $cliente->email }}
                                    </td>

                                    <td class="p-5 text-gray-500 text-sm">
                                        {{ $cliente->telefone }}
                                    </td>

                                    <td class="p-5 text-gray-400 text-sm">
                                        {{ $cliente->cpf ?? 'Não informado' }}
                                    </td>

                                    <td class="p-5">
                                        <div class="flex justify-center items-center gap-2.5">

                                            <a href="{{ route('clientes.edit', $cliente->id) }}"
                                               class="bg-amber-100 hover:bg-amber-400 text-amber-700 hover:text-white font-bold px-4 py-2 rounded-xl text-xs transition-all">
                                                Editar
                                            </a>

                                            <form action="{{ route('clientes.destroy', $cliente->id) }}"
                                                  method="POST"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        onclick="return confirm('Tem certeza que deseja excluir este cliente?')"
                                                        class="bg-rose-50 hover:bg-rose-500 text-rose-600 hover:text-white font-bold px-4 py-2 rounded-xl text-xs transition-all">
                                                    Deletar
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        @else
                            <tr>
                                <td colspan="5" class="p-12 text-center text-gray-400 font-bold">
                                    Nenhum cliente cadastrado ainda.
                                </td>
                            </tr>
                        @endif

                    </tbody>

                </table>
            </div>
        </div>
    </div>

</body>
</html>