<x-app-layout>
    @include('layouts.navigation')
    <div class="py-20 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Card 1: Update Profile Information --}}
            <div class="p-4 sm:p-8 bg-neutral-900 shadow sm:rounded-lg border border-neutral-800">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Card 2: Update Password --}}
            <div class="p-4 sm:p-8 bg-neutral-900 shadow sm:rounded-lg border border-neutral-800">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Card 3: Delete Account --}}
            <div class="p-4 sm:p-8 bg-neutral-900 shadow sm:rounded-lg border border-neutral-800">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>