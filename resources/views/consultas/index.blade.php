<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultas</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .bg-custom {
            background-image: url('/images/consultas.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>

<body class="min-h-screen bg-custom bg-pink-50/90 bg-blend-overlay antialiased">

    <nav class="bg-white/90 backdrop-blur-sm shadow-md p-5 flex justify-between items-center border-b border-pink-100">
        <h1 class="text-2xl font-black text-pink-500">Petshop</h1>

        <a href="/dashboard"
           class="text-gray-500 hover:text-pink-500 font-medium transition">
            Voltar ao Painel
        </a>
    </nav>

    <div class="p-10 max-w-6xl mx-auto">

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

        <div class="flex justify-between items-center mb-8 bg-white/40 backdrop-blur-sm p-4 rounded-3xl">

            <div>
                <h2 class="text-3xl font-extrabold text-gray-700">
                    Consultas Agendadas
                </h2>
            </div>

            <a href="/consultas/criar"
               class="bg-pink-500 hover:bg-pink-400 text-white font-black py-3 px-6 rounded-3xl shadow-lg transition transform hover:-translate-y-1">
                Nova Consulta
            </a>
        </div>

        <div class="bg-white/95 backdrop-blur-sm rounded-[2rem] shadow-xl overflow-hidden border border-pink-100">

            <table class="w-full">

                <thead class="bg-pink-100/80">
                    <tr>
                        <th class="p-5 text-left text-pink-600 font-bold">Pet</th>
                        <th class="p-5 text-left text-pink-600 font-bold">Data</th>
                        <th class="p-5 text-left text-pink-600 font-bold">Descrição</th>
                        <th class="p-5 text-center text-pink-600 font-bold">Ações</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-pink-50">

                    @forelse($consultas as $consulta)

                        <tr class="hover:bg-pink-50/40 transition">

                            <td class="p-5 font-bold text-gray-700">
                                {{ $consulta->nomepet }}
                            </td>

                            <td class="p-5">
                                <span class="bg-pink-50 text-pink-600 border border-pink-200 px-3 py-1 rounded-full text-sm">
                                    {{ $consulta->dataconsulta }}
                                </span>
                            </td>

                            <td class="p-5 text-gray-500 max-w-xs truncate">
                                {{ $consulta->descricao }}
                            </td>

                            <td class="p-5">
                                <div class="flex justify-center gap-2">

                                    <a href="/consultas/{{ $consulta->id }}/editar"
                                       class="bg-amber-100 hover:bg-amber-400 text-amber-700 hover:text-white px-4 py-2 rounded-xl text-xs font-bold transition">
                                        Editar
                                    </a>

                                    <form method="POST"
                                          action="/consultas/{{ $consulta->id }}"
                                          onsubmit="return confirm('Tem certeza que deseja excluir esta consulta?')">

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
                            <td colspan="4" class="p-10 text-center text-gray-400 font-bold">
                                Nenhuma consulta cadastrada ainda.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>
    
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

