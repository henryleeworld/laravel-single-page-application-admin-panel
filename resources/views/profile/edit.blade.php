@seoTitle(__('Profile'))

<x-dashboard-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4 bg-white rounded-lg">
            <x-slot:header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Profile') }}
                </h2>
            </x-slot>

            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                @include('profile.partials.update-profile-information-form')
                <x-section-border />
        
                <div class="mt-10 sm:mt-0" dusk="update-password-form">
                    @include('profile.partials.update-password-form')
                </div>

                <x-section-border />
        
                <div class="mt-10 sm:mt-0" dusk="delete-user-form">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
