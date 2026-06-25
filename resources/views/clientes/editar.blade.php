<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom {
            background-image: url('/images/cadastrarcliente.jpg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="min-h-screen bg-custom bg-pink-50/90 bg-blend-overlay antialiased">
    
    <nav class="bg-white/85 backdrop-blur-md shadow-sm p-4 sticky top-0 z-50 flex justify-between items-center border-b border-pink-100">
        <div class="flex items-center gap-2">
            <h1 class="text-2xl font-black bg-gradient-to-r from-pink-500 to-rose-400 bg-clip-text text-transparent tracking-wide drop-shadow-sm">Petshop</h1>
        </div>
    </nav>

    <div class="p-6 md:p-12 flex justify-center items-center">
        <div class="w-full max-w-xl bg-white/95 backdrop-blur-md rounded-[2rem] shadow-xl p-8 md:p-10 border border-pink-100/60 ring-4 ring-pink-50/30">
            
            <div class="border-b-2 border-dashed border-pink-100 pb-4 mb-6">
                <h2 class="text-3xl font-extrabold text-gray-800 drop-shadow-sm mb-1">Editar Tutor</h2>
                <p class="text-gray-400 font-medium text-sm">Atualize as informações de contato do cliente</p>
            </div>

            <form method="POST" action="{{ route('clientes.update', $cliente->id) }}" class="space-y-5">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="text-gray-700 font-bold text-sm block mb-1.5 ml-1">Nome Completo</label>
                    <input type="text" name="nome" value="{{ $cliente->nome }}" required
                        class="w-full p-3.5 rounded-xl border border-gray-200 outline-none focus:border-pink-400 focus:ring-4 focus:ring-pink-100/50 bg-gray-50/50 font-medium text-gray-700 transition-all duration-300">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-gray-700 font-bold text-sm block mb-1.5 ml-1">E-mail de Contato</label>
                        <input type="email" name="email" value="{{ $cliente->email }}" required
                            class="w-full p-3.5 rounded-xl border border-gray-200 outline-none focus:border-pink-400 focus:ring-4 focus:ring-pink-100/50 bg-gray-50/50 font-medium text-gray-700 transition-all duration-300">
                    </div>

                    <div>
                        <label class="text-gray-700 font-bold text-sm block mb-1.5 ml-1">Telefone / WhatsApp</label>
                        <input type="text" name="telefone" value="{{ $cliente->telefone }}" required
                            class="w-full p-3.5 rounded-xl border border-gray-200 outline-none focus:border-pink-400 focus:ring-4 focus:ring-pink-100/50 bg-gray-50/50 font-medium text-gray-700 transition-all duration-300">
                    </div>
                </div>

                <div>
                    <label class="text-gray-700 font-bold text-sm block mb-1.5 ml-1">CPF <span class="text-xs text-gray-400 font-normal">(Opcional)</span></label>
                    <input type="text" name="cpf" value="{{ $cliente->cpf }}" placeholder="000.000.000-00"
                        class="w-full p-3.5 rounded-xl border border-gray-200 outline-none focus:border-pink-400 focus:ring-4 focus:ring-pink-100/50 bg-gray-50/50 font-medium text-gray-700 transition-all duration-300">
                </div>

                <div>
                    <label class="text-gray-700 font-bold text-sm block mb-1.5 ml-1">Endereço Residencial <span class="text-xs text-gray-400 font-normal">(Opcional)</span></label>
                    <textarea name="endereco" rows="2" placeholder="Rua, número, bairro..."
                        class="w-full p-3.5 rounded-xl border border-gray-200 outline-none focus:border-pink-400 focus:ring-4 focus:ring-pink-100/50 bg-gray-50/50 font-medium text-gray-700 transition-all duration-300 resize-none">{{ $cliente->endereco }}</textarea>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-3 pt-4">
                    <a href="{{ route('clientes.index') }}" 
                       class="w-full sm:w-1/3 order-2 sm:order-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold py-3.5 rounded-xl transition-all duration-300 border border-gray-200 active:scale-95">
                        Voltar
                    </a>
                    
                    <button type="submit" 
                            class="w-full sm:w-2/3 order-1 sm:order-2 bg-gradient-to-r from-pink-500 to-rose-400 hover:from-pink-600 hover:to-rose-500 shadow-md hover:shadow-pink-200 text-white font-black py-3.5 rounded-xl text-md transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95 cursor-pointer">
                        Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>