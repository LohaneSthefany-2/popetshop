<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom {
            background-image: url('/images/cadastrarpets.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="min-h-screen bg-custom bg-pink-50/90 bg-blend-overlay">
    <nav class="bg-white/90 backdrop-blur-sm shadow-md p-5 flex justify-between items-center border-b-2 border-pink-100">
        <h1 class="text-2xl font-black text-pink-500 tracking-wide drop-shadow-sm">Petshop</h1>
        <a href="/pets" class="text-gray-500 hover:text-pink-500 font-medium transition-all hover:scale-105">Voltar</a>
    </nav>

    <div class="p-10 flex justify-center">
        <div class="w-full max-w-xl bg-white/95 backdrop-blur-sm rounded-[2.5rem] shadow-2xl p-10 border-4 border-pink-100">
            <h2 class="text-3xl font-black text-gray-700 mb-2 drop-shadow-sm">Cadastrar Pet </h2>
            <p class="text-pink-400 font-medium mb-8">Coloque as informações do novo pet abaixo</p>

            <form method="POST" action="/pets" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label class="text-gray-600 font-bold block ml-1">Nome do Pet</label>
                    <input type="text" name="nomepet" placeholder="Digite o nome do bichinho..." required
                        class="w-full mt-2 p-4 rounded-2xl border-2 border-pink-100 outline-none focus:border-pink-400 bg-pink-50/30 font-medium placeholder-gray-400 transition-all">
                </div>
                <div>
                    <label class="text-gray-600 font-bold block ml-1">Dono</label>
                    <input type="text" name="dono" placeholder="Quem é o dono dele?" required
                        class="w-full mt-2 p-4 rounded-2xl border-2 border-pink-100 outline-none focus:border-pink-400 bg-pink-50/30 font-medium placeholder-gray-400 transition-all">
                </div>
                <div>
                    <label class="text-gray-600 font-bold block ml-1">Tipo</label>
                    <input type="text" name="tipo" placeholder="Ex: Cachorro, Gato, Coelho..." required
                        class="w-full mt-2 p-4 rounded-2xl border-2 border-pink-100 outline-none focus:border-pink-400 bg-pink-50/30 font-medium placeholder-gray-400 transition-all">
                </div>
                
                <div>
                    <label class="text-gray-600 font-bold block ml-1">Foto do Amiguinho</label>
                    <div class="mt-2 p-4 rounded-2xl border-2 border-dashed border-pink-300 bg-pink-50/20 text-center hover:bg-pink-50/50 transition-colors relative cursor-pointer">
                        <input type="file" name="foto" accept="image/*" required
                            class="absolute inset-0 opacity-0 cursor-pointer w-full h-full">
                        <div class="text-pink-500 font-bold flex flex-col items-center gap-1">
                            <span>Escolha uma foto</span>
                            <span class="text-xs text-gray-400 font-normal">Clique aqui para procurar no aparelho</span>
                        </div>
                    </div>
                </div>

                <button class="w-full bg-pink-500 hover:bg-pink-400 hover:shadow-pink-200 shadow-lg transition-all text-white font-black py-4 rounded-2xl text-lg transform hover:-translate-y-0.5">
                    Salvar pet
                </button>
            </form>
        </div>
    </div>
</body>
</html>