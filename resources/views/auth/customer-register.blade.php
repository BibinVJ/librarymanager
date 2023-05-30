<x-guest-layout>

    <form name="register_form" method="POST" action="{{ route('register.customer') }}" enctype="multipart/form-data">
        @csrf

        <!-- First Name -->
        <div class="mt-4">
            <x-input-label for="first_name" :value="__('First Name')"/>
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required
                          autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')"/>
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required
                          autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                          autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>

        <!-- Phone No -->
        <div class="mt-4">
            <x-input-label for="phone_no" :value="__('Phone No')"/>
            <x-text-input id="phone_no" class="block mt-1 w-full" type="number" name="phone_no" :value="old('phone_no')" required
                          autocomplete="username"/>
            <x-input-error :messages="$errors->get('phone_no')" class="mt-2"/>
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')"/>
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required
                          autocomplete="username"/>
            <x-input-error :messages="$errors->get('address')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="inputFileMultiple" :value="__('Profile image')"/>
            <div>
                <input  class="file" type="file" id="inputFileMultiple" name="file" accept="image/png, image/jpeg"
                        value="Drop your images here"/>
            </div>
        </div>
        <input type="hidden" value="0" name="is_admin">

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        <hr class="flex items-center justify-center mt-4">
        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('register') }}">
                {{ __('Register as Admin') }}
            </a>
        </div>
    </form>
</x-guest-layout>
