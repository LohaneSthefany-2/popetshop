<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen relative overflow-x-hidden">

    <img src="/fundopainel.jpg"
        class="fixed inset-0 w-full h-full object-cover z-0"
        alt="Fundo">

    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-10"></div>

    <div class="relative z-20 min-h-screen flex flex-col">
        <nav class="mx-6 mt-6 bg-white/85 backdrop-blur-md rounded-2xl border border-white p-4 flex justify-between items-center shadow-lg">
            <h1 class="text-3xl font-black bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                Petshop
            </h1>

            <a href="/logout"
                class="bg-rose-100 text-rose-600 px-5 py-2 rounded-xl font-bold border border-rose-200 hover:bg-rose-500 hover:text-white transition duration-300">
                Sair
            </a>
        </nav>

        <div class="flex-1 max-w-6xl mx-auto w-full p-6 flex flex-col justify-center">

            <div class="mb-12">
                <span class="text-xs font-black uppercase tracking-widest text-pink-700 bg-pink-200 px-4 py-1 rounded-full border border-pink-300">
                    Painel de Controle
                </span>

                @if(session('usuario'))

                <h2 class="text-5xl font-black text-white mt-4 drop-shadow-lg">
                    Olá, {{ session('usuario')->name }}!
                </h2>

                @endif

                <p class="text-pink-100 text-lg font-semibold mt-2">
                    Gerencie o petshop!
                </p>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">


                <a href="/clientes"
                    class="bg-white/85 backdrop-blur-md rounded-3xl border border-white shadow-lg hover:shadow-pink-300/50 hover:-translate-y-2 transition-all duration-500 h-72 flex items-center justify-center">
                    <div class="text-center px-8">
                        <h3 class="text-4xl font-black text-slate-900 hover:text-pink-600 transition">
                            Clientes
                        </h3>

                        <p class="text-slate-700 mt-4 text-lg">
                            Cadastro e histórico dos donos
                        </p>
                    </div>
                </a>


                <a href="/pets"
                    class="bg-white/85 backdrop-blur-md rounded-3xl border border-white shadow-lg hover:shadow-pink-300/50 hover:-translate-y-2 transition-all duration-500 h-72 flex items-center justify-center">
                    <div class="text-center px-8">
                        <h3 class="text-4xl font-black text-slate-900 hover:text-pink-600 transition">
                            Pets
                        </h3>

                        <p class="text-slate-700 mt-4 text-lg">
                            Cadastro e histórico dos pets
                        </p>
                    </div>
                </a>


                <a href="/consultas"
                    class="bg-white/85 backdrop-blur-md rounded-3xl border border-white shadow-lg hover:shadow-pink-300/50 hover:-translate-y-2 transition-all duration-500 h-72 flex items-center justify-center">

                    <div class="text-center px-8">
                        <h3 class="text-4xl font-black text-slate-900 hover:text-pink-600 transition">
                            Consultas
                        </h3>

                        <p class="text-slate-700 mt-4 text-lg">
                            Agendamento e histórico de atendimentos
                        </p>
                    </div>

                </a>

            </div>

        </div>

    </div>

</body>

</html>