<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
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
        <h1 class="text-2xl font-black bg-gradient-to-r from-pink-500 to-rose-400 bg-clip-text text-transparent">
            Petshop
        </h1>

        <a href="{{ route('dashboard') }}"
           class="text-gray-500 hover:text-pink-500 font-bold text-sm transition">
            Voltar
        </a>
    </nav>

    <div class="p-6 md:p-12 max-w-6xl mx-auto">

        @if(session('sucesso'))
            <div id="alerta"
                 class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl shadow-md flex items-center gap-4">

                <div class="bg-emerald-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6 text-emerald-600"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <div>
                    <p class="font-bold">Sucesso!</p>
                    <p>{{ session('sucesso') }}</p>
                </div>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">

            <div>
                <h2 class="text-3xl font-extrabold text-gray-800">
                    Clientes Cadastrados
                </h2>
                <p class="text-gray-400 text-sm mt-1">
                    Gerencie os clientes do petshop
                </p>
            </div>

            <a href="{{ route('clientes.create') }}"
               class="bg-gradient-to-r from-pink-500 to-rose-400 hover:from-pink-600 hover:to-rose-500 text-white font-black px-6 py-3 rounded-xl shadow-md transition active:scale-95">
                + Novo Cliente
            </a>
        </div>

        <div class="bg-white/95 backdrop-blur-md rounded-[2rem] shadow-xl border border-pink-100 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead>
                        <tr class="bg-pink-50 text-pink-600 uppercase text-sm font-bold">
                            <th class="p-5">Nome</th>
                            <th class="p-5">E-mail</th>
                            <th class="p-5">Telefone</th>
                            <th class="p-5">CPF</th>
                            <th class="p-5 text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-pink-50">

                        @forelse($clientes as $cliente)

                            <tr class="hover:bg-pink-50/30 transition">

                                <td class="p-5 font-bold text-gray-800">
                                    {{ $cliente->nome }}
                                </td>

                                <td class="p-5 text-sm">
                                    {{ $cliente->email }}
                                </td>

                                <td class="p-5 text-sm">
                                    {{ $cliente->telefone }}
                                </td>

                                <td class="p-5 text-sm text-gray-400">
                                    {{ $cliente->cpf ?? 'Não informado' }}
                                </td>

                                <td class="p-5">
                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('clientes.edit', $cliente->id) }}"
                                           class="bg-amber-100 hover:bg-amber-400 text-amber-700 hover:text-white px-4 py-2 rounded-xl text-xs font-bold transition">
                                            Editar
                                        </a>

                                        <form action="{{ route('clientes.destroy', $cliente->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="bg-rose-100 hover:bg-rose-500 text-rose-600 hover:text-white px-4 py-2 rounded-xl text-xs font-bold transition">
                                                Excluir
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="p-10 text-center text-gray-400 font-bold">
                                    Nenhum cliente cadastrado ainda.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <!-- ALERTA AUTO REMOVE -->
    <script>
        setTimeout(() => {
            const alerta = document.getElementById('alerta');

            if (alerta) {
                alerta.classList.add('opacity-0', 'transition', 'duration-500');
                setTimeout(() => alerta.remove(), 500);
            }
        }, 3000);
    </script>

</body>
</html>

