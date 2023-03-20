<div class="bg-yellow rounded-t-lg sm:rounded-t-full ">
    <div class="container mx-auto px-6 py-3 flex flex-col sm:flex-row justify-between items-center">
        <x-nav-link-footer :href="url('/private-policy')">
            {{ __('Private policy') }}
        </x-nav-link-footer>

        <x-nav-link-footer :href="url('/about')">
            {{ __('About') }}
        </x-nav-link-footer>

        <x-nav-link-footer :href="url('/contact')">
            {{ __('Contact') }}
        </x-nav-link-footer>

        <p class="py-2  text-black sm:py-0">All rights reserved</p>
    </div>
</div>