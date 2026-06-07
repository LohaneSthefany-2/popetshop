<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom {
            background-image: url('/images/editarconsulta.jpg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="min-h-screen bg-custom bg-pink-50/90 bg-blend-overlay antialiased">
    
    <nav class="bg-white/90 backdrop-blur-sm shadow-md p-5 flex justify-between items-center border-b-2 border-pink-100">
        <h1 class="text-2xl font-black text-pink-500 tracking-wide drop-shadow-sm">Petshop</h1>
        <a href="/consultas" class="text-gray-500 hover:text-pink-500 font-medium transition-all hover:scale-105">Voltar</a>
    </nav>

    <div class="p-10 flex justify-center">
        <div class="w-full max-w-xl bg-white/95 backdrop-blur-sm rounded-[2rem] shadow-xl border-4 border-pink-100 p-10">
            <h2 class="text-3xl font-extrabold text-gray-700 drop-shadow-sm mb-8">Cadastrar Consulta</h2>

            <form method="POST" action="/consultas" class="space-y-6">
                @csrf
                
                <div>
                    <label class="text-pink-600 font-bold text-lg block mb-2">Nome do Pet</label>
                    <input type="text" name="nomepet" placeholder="Digite o nome do pet"
                        class="w-full p-4 rounded-2xl border-2 border-pink-100 outline-none focus:border-pink-400 bg-pink-50/30 transition-all font-medium text-gray-700 text-lg placeholder-gray-400">
                </div>
                
                <div>
                    <label class="text-pink-600 font-bold text-lg block mb-2">Data da Consulta</label>
                    <input type="date" name="dataconsulta"
                        class="w-full p-4 rounded-2xl border-2 border-pink-100 outline-none focus:border-pink-400 bg-pink-50/30 transition-all font-medium text-gray-700 text-lg text-gray-400">
                </div>
                
                <div>
                    <label class="text-pink-600 font-bold text-lg block mb-2">Descrição</label>
                    <textarea name="descricao" placeholder="Descrição da consulta"
                        class="w-full p-4 rounded-2xl border-2 border-pink-100 outline-none focus:border-pink-400 bg-pink-50/30 transition-all font-medium text-gray-700 text-lg h-32 resize-none placeholder-gray-400"></textarea>
                </div>
                
                <button type="submit" class="w-full bg-pink-500 hover:bg-pink-400 text-white font-black py-4 rounded-2xl shadow-lg hover:shadow-pink-300 transition-all transform hover:-translate-y-1 text-xl">
                    Salvar Consulta
                </button>
            </form>
        </div>
    </div>
</body>
</html>