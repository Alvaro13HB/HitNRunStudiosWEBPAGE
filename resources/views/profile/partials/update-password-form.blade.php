<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Alterar senha') }}
        </h2>

        <p class="mt-1 text-sm text-neutral-400">
            {{ __('Certifique-se de que sua conta está usando uma senha longa e aleatória para se manter segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Senha atual')" class="text-white" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full bg-neutral-800 text-white border-neutral-700 focus:border-red-600 focus:ring-red-600" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Nova senha')" class="text-white" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full bg-neutral-800 text-white border-neutral-700 focus:border-red-600 focus:ring-red-600" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar senha')" class="text-white" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full bg-neutral-800 text-white border-neutral-700 focus:border-red-600 focus:ring-red-600" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-red-600 hover:bg-red-700 active:bg-red-900 border-red-600">{{ __('Salvar') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-neutral-400"
                >{{ __('Salvo.') }}</p>
            @endif
        </div>
    </form>
</section>