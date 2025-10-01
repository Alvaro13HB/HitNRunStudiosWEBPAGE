<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hit & Run Studios</title>
    <style>
        .text-true-red {
            color: #FF0000;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-black text-white font-sans">

    @include('layouts.navigation')

    <!-- Main Content -->
    <main class="flex-grow pt-24">
        <section class="flex flex-col items-center justify-center px-4 text-center">

            <!-- Texto e logo lado a lado -->
            <div class="flex flex-col lg:flex-row items-center justify-center w-full max-w-6xl gap-6">
                <!-- Texto -->
                <div class="max-w-xl text-left space-y-4 lg:mr-8">
                    <h1 class="text-3xl md:text-4xl font-bold leading-snug">
                        Somos a <span class="text-true-red">Hit&Run Studios</span>
                    </h1>
                    <p class="text-base leading-relaxed">
                        Um pequeno estúdio de jogos formado por <strong>5 estudantes do CEFET</strong>. Iniciamos nossa
                        jornada em
                        <strong>2023</strong> com um projeto acadêmico baseado no livro
                        <em>"O Auto da Barca do Inferno"</em>. A partir dele, nasceu <strong>Guerrena</strong>, um jogo
                        que se passa
                        no universo da obra, reimaginando seus personagens e dilemas em uma experiência interativa e
                        desafiadora.
                        Em <strong>2024</strong>, conquistamos o <strong>segundo lugar na categoria de cultura da
                            META</strong>.
                        Em <strong>2025</strong>, seguimos desenvolvendo <strong>Guerrena</strong> com dedicação,
                        inovação e o
                        compromisso de entregar a melhor experiência.
                    </p>
                </div>

                <div class="mt-4">
                    <img src="{{asset('/storage/title.png')}}" alt="Título do Jogo"/>
                </div>
            </div>

        </section>
    </main>


    <!-- Footer -->
    <footer class="text-center text-white bg-neutral-900 border-t border-neutral-700">
        <div class="container mx-auto px-4 py-10">
            <p>&copy; 2025 Hit&RunStudios. All rights reserved.</p>
            <div class="flex justify-center space-x-6 mt-4">
                <a href="#" class="text-white hover:text-red-600 transition">Privacy Policy</a>
                <a href="#" class="text-white hover:text-red-600 transition">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>
</html>