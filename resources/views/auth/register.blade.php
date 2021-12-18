<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Имя')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Почта')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>


                <div class="mt-4">
                    <x-label for="birthday" :value="__('Днюха')" />

                    <x-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')" required />
                </div>


                <div class="mt-4">
                    <x-label for="gender" :value="__('Пол')" />

                        <input class="form-check-input" type="radio" name="gender" id="Radio1" value="men">
                        <label class="form-check-label" for="Radio1">Мужской</label>

                        <input class="form-check-input" type="radio" name="gender" id="Radio2" value="women">
                        <label class="form-check-label" for="Radio2">Женский</label>
                </div>


                <div class="mt-4">
                    <x-label for="country" :value="__('Страна')" />

                    <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required />
                </div>

                <div class="mt-4">
                    <x-label for="city" :value="__('Город')" />

                    <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
                </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Пароль')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Повторите пароль')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Уже зарегистрированы?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Регистрация') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
