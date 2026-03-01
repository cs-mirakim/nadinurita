<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label :value="__('Register As')" />
            <div class="flex gap-6 mt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="role" value="customer" class="text-indigo-600"
                        {{ old('role', 'customer') == 'customer' ? 'checked' : '' }}
                        onchange="toggleSecurityCode(this.value)">
                    <span class="text-sm text-gray-700">Customer</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="role" value="admin" class="text-indigo-600"
                        {{ old('role') == 'admin' ? 'checked' : '' }}
                        onchange="toggleSecurityCode(this.value)">
                    <span class="text-sm text-gray-700">Admin</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Security Code (Admin only) -->
        <div class="mt-4" id="security-code-field" style="display: {{ old('role') == 'admin' ? 'block' : 'none' }}">
            <x-input-label for="security_code" :value="__('Security Code')" />
            <x-text-input id="security_code" class="block mt-1 w-full" type="password" name="security_code" autocomplete="off" />
            <x-input-error :messages="$errors->get('security_code')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function toggleSecurityCode(role) {
            const field = document.getElementById('security-code-field');
            field.style.display = role === 'admin' ? 'block' : 'none';
        }
    </script>
</x-guest-layout>