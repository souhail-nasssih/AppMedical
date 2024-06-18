<x-guest-layout>
    <form method="POST" action="{{ route('medecin.store') }}">
        @csrf

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="tel" :value="__('tel')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')"
                required />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Adress')" />
            <x-text-input id="Adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')"
                required />
            <x-input-error :messages="$errors->get('adress')" class="mt-2" />
        </div>

        <!-- Speciality -->
        <div class="mt-4">
            <x-input-label for="speciality" :value="__('specialite')" />
            <x-text-input id="specialite" class="block mt-1 w-full" type="text" name="specialite" :value="old('specialite')"
                required />
            <x-input-error :messages="$errors->get('specialite')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="verification" :value="__('verification')" />
            <x-text-input id="verification" class="block mt-1 w-full" type="hidden" name="verification" :value="0"
                required />
            <x-input-error :messages="$errors->get('verification')" class="mt-2" />
        </div>

        <!-- Professional Number -->
        <div class="mt-4">
            <x-input-label for="N_professionel " :value="__('N_professionel ')" />
            <x-text-input id="N_professionel " class="block mt-1 w-full" type="text" name="N_professionel "
                :value="old('N_professionel ')" required />
            <x-input-error :messages="$errors->get('N_professionel ')" class="mt-2" />
        </div>

        <!-- Hidden Role Input -->
        {{-- <div>
            <x-text-input id="role" class="block mt-1 w-full" type="text" name="role" :value="request()->query('role', old('role'))" />
        </div> --}}

        <!-- Hidden User ID Input -->
        <div>
            <div>
                <x-text-input id="user_id" class="block mt-1 w-full" type="Hidden" name="user_id" :value="Auth::user()->id" />
            </div>
                    </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
