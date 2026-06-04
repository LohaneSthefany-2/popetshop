<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-pink-50 flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-10">
        <h1 class="text-4xl font-bold text-pink-500 text-center mb-2"> Petshop</h1>
        <p class="text-center text-gray-400 mb-8">Faça login para continuar</p>

        @if(session('erro'))
            <div class="bg-red-100 text-red-600 p-3 rounded-xl mb-5 text-center">
                {{ session('erro') }}
            </div>
        @endif

        <form method="POST" action="/login" class="space-y-5">
            @csrf
            <div>
                <label class="text-gray-600">Email</label>
                <input
                    type="email"
                    name="email"
                    placeholder="Digite seu email"
                    class="w-full mt-2 p-4 rounded-2xl border border-gray-200 outline-none focus:border-pink-400"
                >
            </div>
            <div>
                <label class="text-gray-600">Senha</label>
                <input
                    type="password"
                    name="senha"
                    placeholder="Digite sua senha"
                    class="w-full mt-2 p-4 rounded-2xl border border-gray-200 outline-none focus:border-pink-400"
                >
            </div>
            <button class="w-full bg-pink-500 hover:bg-pink-400 transition-all text-white font-bold py-4 rounded-2xl">
                Entrar
            </button>
        </form>
    </div>
</body>
</html>
