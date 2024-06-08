@seoTitle(__('main.users'))

<x-dashboard-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4 bg-white rounded-lg">
            <div class="flex justify-between mb-4">
                <h1 class="text-2xl font-semibold">@lang('main.edit_profile_information')</h1>
            </div>
            <x-splade-form :action="route('dashboard.user.update', $user)" method="PUT" :default="$user" class="space-y-4">
                {{-- Name --}}
                <x-splade-input v-model="form.name" name="name" :label="__('main.name')" autocomplete="name" required />
                {{-- Username --}}
                <x-splade-input v-model="form.username" name="username" :label="__('main.username')" autocomplete="username" required />
                {{-- Email --}}
                <x-splade-input v-model="form.email" name="email" :label="__('main.email')" autocomplete="email" required />
                {{-- Bio --}}
                <x-splade-textarea v-model="form.bio" name="bio" :label="__('main.bio')" autocomplete="bio" autosize />
                {{-- Status --}}
                @php
                    $status_options = [
                        'Active' => __('main.active'),
                        'Banned' => __('main.banned'),
                    ];
                @endphp
                <x-splade-select name="status" :label="__('main.status')" :options="$status_options" choices required />
                {{-- Roles --}}
                <x-splade-select name="roles[]" :label="__('main.roles')" :options="$roles" option-value="name" multiple relation choices required />
                {{-- Permissions --}}
                <x-splade-select name="permissions[]" :label="__('main.permissions')" :options="$permissions" multiple relation choices />            
                {{-- New Password --}}
                <x-splade-input name="new_password" :label="__('main.new_password')" />
                {{-- Update Button --}}
                <x-splade-submit :label="__('main.save')" />
            </x-splade-form>
        </div>
    </div>
</x-dashboard-layout>
