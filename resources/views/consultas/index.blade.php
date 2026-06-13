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
    
    <nav class="bg-white/90 backdrop-blur-sm shadow-md p-5 flex justify-between items-center border-b-2 border-pink-100">
        <h1 class="text-2xl font-black text-pink-500 tracking-wide drop-shadow-sm">Petshop</h1>
        <a href="/dashboard" class="text-gray-500 hover:text-pink-500 font-medium transition-all hover:scale-105">Voltar ao Painel</a>
    </nav>

    <div class="p-10">
        <div class="flex justify-between items-center mb-8 backdrop-blur-sm bg-white/40 p-4 rounded-3xl inline-flex gap-8 w-full">
            <h2 class="text-3xl font-extrabold text-gray-700 drop-shadow-sm">Consultas Agendadas</h2>
            <a href="/consultas/criar" class="bg-pink-500 hover:bg-pink-400 text-white font-black py-3 px-6 rounded-3xl shadow-lg hover:shadow-pink-300 transition-all transform hover:-translate-y-1">
                Nova Consulta
            </a>
        </div>

        <div class="bg-white/95 backdrop-blur-sm rounded-[2rem] shadow-xl overflow-hidden border-4 border-pink-100">
            <table class="w-full">
                <thead class="bg-pink-100/80">
                    <tr>
                        <th class="p-5 text-left text-pink-600 font-bold text-lg">Nome do Pet</th>
                        <th class="p-5 text-left text-pink-600 font-bold text-lg">Data</th>
                        <th class="p-5 text-left text-pink-600 font-bold text-lg">Descrição</th>
                        <th class="p-5 text-center text-pink-600 font-bold text-lg">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-pink-50">
                    @foreach($consultas as $consulta)
                    <tr class="hover:bg-pink-50/50 transition-colors">
                        <td class="p-5 font-bold text-gray-700 text-lg">{{ $consulta->nomepet }}</td>
                        
                        <td class="p-5 text-gray-600 font-semibold">
                            <span class="bg-pink-50 text-pink-600 border border-pink-200 px-3 py-1 rounded-full text-sm">
                                {{ $consulta->dataconsulta }}
                            </span>
                        </td>
                        
                        <td class="p-5 text-gray-500 font-medium max-w-xs truncate">{{ $consulta->descricao }}</td>
                        
                        <td class="p-5">
                            <div class="flex justify-center gap-3">
                                <a href="/consultas/{{ $consulta->id }}/editar" class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-5 rounded-2xl shadow-sm hover:shadow-yellow-200 transition-all transform hover:scale-105">Editar</a>
                                <form method="POST" action="/consultas/{{ $consulta->id }}" onsubmit="return confirm('Tem certeza que deseja cancelar essa consulta?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-400 hover:bg-red-300 text-white font-bold py-2 px-5 rounded-2xl shadow-sm hover:shadow-red-200 transition-all transform hover:scale-105">Deletar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>