<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <title>Hit & Run Studios</title>
  <style>
    .text-true-red {
      color: #FF0000;
    }
  </style>
</head>

<body class="flex flex-col min-h-screen bg-black text-white font-sans">

    @include('layouts.navigation')

  <!-- Modal Login Overlay -->
  <div id="loginModalContainer"
    class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-60 backdrop-blur transition-opacity duration-300">
    <div id="loginModal"
      class="bg-neutral-900 border border-neutral-700 text-white rounded-lg shadow-xl p-6 w-full max-w-sm text-center scale-95 opacity-0 transition-all duration-300">
      <h2 class="text-xl font-bold text-red-600 mb-4">Faça login Agora</h2>
      <p class="mb-6">Entre para poder interagir conosco.</p>
      <a href="./login.html"
        class="inline-block mb-4 bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded transition-colors duration-200">
        Ir para Login
      </a>
      <p class="mb-6">Não possui uma conta?
        <a href="./signup.html" class="text-red-500 hover:underline transition duration-200">
          cadastre-se agora
        </a>
      </p>
    </div>
  </div>

  <main class="flex-grow pt-32 pb-20">
    <div class="container mx-auto px-4 space-y-8">

      <div
        class="card bg-neutral-900 rounded-lg p-6 w-full max-w-4xl mx-auto flex flex-row items-stretch h-72 border border-neutral-800">
        <div class="contentContainer w-[95%] text-white pr-4 overflow-y-auto">
          <div class="newsTitle text-3xl font-bold mb-3 text-true-red">Placeholder Headline 1</div>
          <div class="newsBody text-neutral-300 leading-relaxed mb-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus imperdiet justo nec tortor
            fermentum, et
            ultricies ligula blandit. More updates coming soon.
          </div>
          <div class="extraInfo text-neutral-400 text-sm italic">Posted on July 9, 2025 by Staff</div>
        </div>
        <div
          class="feedbackButtonsContainer w-[5%] flex flex-col justify-center items-center space-y-12 h-full font-semibold">
          <div class="text-neutral-500 flex flex-col items-center">
            <button id="3" class="hover:text-white toggle-btn">
              <i class="fas fa-heart text-xl transition duration-200"></i>
            </button>
            <p>18</p>
          </div>
          <div class="text-neutral-500 flex flex-col items-center">
            <button id="4" class="hover:text-white toggle-btn">
              <i class="fas fa-heart-broken text-xl transition duration-200"></i>
            </button>
            <p>2</p>
          </div>
        </div>
      </div>
    </main>

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