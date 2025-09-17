<x-guest-layout>
    <!-- Session Status -->    
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-white mb-2">
            HIT<span class="text-true-red">N</span>RUN
        </h1>
        <p class="text-neutral-400">Cadastre sua conta</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-neutral-300 mb-1"/>
            <x-text-input id="email" class="w-full px-4 py-3 rounded-md bg-neutral-900 border border-neutral-700 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition" 
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Seu nome de usuário"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-neutral-300 mb-1"/>

            <x-text-input id="password" class="w-full px-4 py-3 rounded-md bg-neutral-900 border border-neutral-700 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                            type="password"
                            name="password"
                            placeholder="Seu email"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            
            <label for="remember-me" class="my-5 block text-sm text-neutral-300">
                <input id="remember_me" type="checkbox" class="h-4 w-4 rounded bg-neutral-900 border-neutral-700 text-red-600 focus:ring-red-500" name="remember">
                <span class="ms-2 text-sm">{{ __('Lembre-se de mim') }}</span>
            </label>

            <a href="/forgot-password" class="text-sm text-red-500 hover:text-red-400">Esqueceu a senha?</a>
        </div>
    
        <x-primary-button class="w-full py-3 px-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-md transition duration-200">
                {{__('Entrar')}}
        </x-primary-button>

        <div class="mt-6 text-center">
            <p class="text-sm text-neutral-400">
                Não tem uma conta?
                <a href="/register" class="text-red-500 hover:text-red-400 font-medium">Cadastre-se</a>
            </p>
        </div>

    </form>
</x-guest-layout>
