<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
	    {{ __('Welcome to your :app_name!', ['app_name' => __(config('app.name'))]) }}
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        {{ __('Introducing :app_name: Your gateway to a streamlined dashboard creation experience. This user-friendly dashboard boasts essential settings, an appealing layout, and leverages Laravel Splade\'s prowess. Effortlessly construct fast Single Page Applications (SPAs) using standard Blade templates, enriched by Vue 3 components. Unveil the art of efficient dashboard design with :app_name.', ['app_name' => __(config('app.name'))]) }}
    </p>
</div>
