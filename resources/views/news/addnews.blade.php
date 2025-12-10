<x-guest-layout>

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-white mb-2">
            HIT<span class="text-true-red">N</span>RUN
        </h1>
        <p class="text-neutral-400">Cadastre sua notícia</p>
    </div>

    <form method="POST" class="space-y-6" action="{{ route('register') }}">
        @csrf

        <!-- Titulo -->
        <div>
            <x-input-label for="titulo" class="block text-sm font-medium text-neutral-300 mb-1" :value="__('Título')" />
            <x-text-input id="titulo" type="text" name="titulo" :value="old('titulo')" class="w-full px-4 py-3 rounded-md bg-neutral-900 border border-neutral-700 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                        placeholder="Título..." required autofocus autocomplete="titulo" />
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <!-- Corpo -->

        

        <div class="mt-4">
            <x-input-label for="corpo" class="block text-sm font-medium text-neutral-300 mb-1" :value="__('Corpo')" />
            <textarea 
                id="corpo" 
                name="corpo" 
                class="w-full px-4 py-3 rounded-md bg-neutral-900 border border-neutral-700 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition" 
                rows="8" 
                placeholder="Corpo..."
            >{{ old('corpo') }}</textarea>
            <x-input-error :messages="$errors->get('corpo')" class="mt-2" />
        </div>

        <!-- Autor -->

        <x-text-input id="autor" type="hidden" class="w-full px-4 py-3 rounded-md bg-neutral-900 border border-neutral-700 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                    name="autor" value="{{Auth::user()->name}}" />
        <x-input-error :messages="$errors->get('autor')" class="mt-2" />

        <div ckass="mt-4">
            <a class="w-full py-3 px-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-md transition duration-200" href="{{ route('storenews') }}">
                    {{__('Cadastrar')}}
            </a>
        </div>
        
    </form>
</x-guest-layout>
