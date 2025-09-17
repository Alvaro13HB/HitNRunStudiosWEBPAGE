<x-guest-layout>

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-white mb-2">
            HIT<span class="text-true-red">N</span>RUN
        </h1>
        <p class="text-neutral-400">Cadastre sua conta</p>
    </div>

    <form method="POST" class="space-y-6" action="{{ route('register') }}">
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="name" class="block text-sm font-medium text-neutral-300 mb-1" :value="__('Nome de Usuário')" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" class="w-full px-4 py-3 rounded-md bg-neutral-900 border border-neutral-700 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                        placeholder="Seu nome de usuário" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" class="block text-sm font-medium text-neutral-300 mb-1" :value="__('Email')" />
            <x-text-input id="email" class="w-full px-4 py-3 rounded-md bg-neutral-900 border border-neutral-700 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                        placeholder="Seu email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" class="block text-sm font-medium text-neutral-300 mb-1" :value="__('Senha')" />

            <x-text-input id="password" class="w-full px-4 py-3 rounded-md bg-neutral-900 border border-neutral-700 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                        placeholder="••••••••"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" class="block text-sm font-medium text-neutral-300 mb-1" :value="__('Confirmar senha')" />

            <x-text-input id="password_confirmation" class="w-full px-4 py-3 rounded-md bg-neutral-900 border border-neutral-700 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                        placeholder="••••••••"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full py-3 px-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-md transition duration-200">
                {{__('Cadastrar')}}
        </x-primary-button>

        <div class="mt-6 text-center">
                <p class="text-sm text-neutral-400">
                    Ja tem uma conta?
                    <a href="/login" class="text-red-500 hover:text-red-400 font-bold">{{ __('Entrar') }}</a>
                </p>
            </div>
        
    </form>
</x-guest-layout>
