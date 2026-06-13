<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pets</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom {
            background-image: url('/images/listarpets.jpg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="min-h-screen bg-custom bg-pink-50/90 bg-blend-overlay">
    <nav class="bg-white/90 backdrop-blur-sm shadow-md p-5 flex justify-between items-center border-b-2 border-pink-100">
        <h1 class="text-2xl font-black text-pink-500 tracking-wide drop-shadow-sm"> Petshop</h1>
        <a href="/dashboard" class="text-gray-500 hover:text-pink-500 font-medium transition-all hover:scale-105">Voltar ao Painel</a>
    </nav>

    <div class="p-10">
        <div class="flex justify-between items-center mb-8 backdrop-blur-sm bg-white/40 p-4 rounded-3xl inline-flex gap-8 w-full">
            <a href="/pets/criar" class="bg-pink-500 hover:bg-pink-400 text-white font-black py-3 px-6 rounded-3xl shadow-lg hover:shadow-pink-300 transition-all transform hover:-translate-y-1">
                 Novo Pet
            </a>
        </div>

        <div class="bg-white/95 backdrop-blur-sm rounded-[2rem] shadow-xl overflow-hidden border-4 border-pink-100 animate-fade-in">
            <table class="w-full">
                <thead class="bg-pink-100/80">
                    <tr>
                        <th class="p-5 text-left text-pink-600 font-bold text-lg">Foto</th>
                        <th class="p-5 text-left text-pink-600 font-bold text-lg">Nome</th>
                        <th class="p-5 text-left text-pink-600 font-bold text-lg">Dono</th>
                        <th class="p-5 text-left text-pink-600 font-bold text-lg">Tipo</th>
                        <th class="p-5 text-center text-pink-600 font-bold text-lg">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-pink-50">
                    @foreach($pets as $pet)
                    <tr class="hover:bg-pink-50/50 transition-colors">
                        <td class="p-4">
                            @if($pet->foto)
                                <img src="{{ asset('storage/' . $pet->foto) }}" alt="Foto de {{ $pet->nomepet }}" class="w-16 h-16 object-cover rounded-2xl border-2 border-pink-300 shadow-md transform hover:scale-110 transition-transform">
                            @else
                                <div class="w-16 h-16 bg-pink-100 rounded-2xl border-2 border-pink-200 flex items-center justify-center text-2xl text-pink-400">
                                    não tem foto
                                </div>
                            @endif
                        </td>
                        <td class="p-4 font-bold text-gray-700 text-lg">{{ $pet->nomepet }}</td>
                        <td class="p-4 text-gray-600 font-medium">{{ $pet->dono }}</td>
                        <td class="p-4">
                            <span class="bg-pink-100 text-pink-600 font-bold px-3 py-1 rounded-full text-sm border border-pink-200">
                                {{ $pet->tipo }}
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="flex justify-center gap-3">
                                <a href="/pets/{{ $pet->id }}/editar" class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-5 rounded-2xl shadow-sm hover:shadow-yellow-200 transition-all transform hover:scale-105">Editar</a>
                                <form method="POST" action="/pets/{{ $pet->id }}" onsubmit="return confirm('Tem certeza que deseja apagar esse fofinho? 🥺')">
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