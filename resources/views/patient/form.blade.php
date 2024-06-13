<x-guest-layout>
    <form method="POST" action="{{ route('patient.store') }}">
        @csrf

        <!-- Telephone -->
        <div class="mt-4">
            <x-input-label for="tel" :value="__('Telephone')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Date de Naissance -->
        <div class="mt-4">
            <x-input-label for="date_naissance" :value="__('Date de Naissance')" />
            <x-text-input id="date_naissance" class="block mt-1 w-full" type="date" name="date_naissance" :value="old('date_naissance')" required />
            <x-input-error :messages="$errors->get('date_naissance')" class="mt-2" />
        </div>


        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="adress" :value="__('Address')" />
            <x-text-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required />
            <x-input-error :messages="$errors->get('adress')" class="mt-2" />
        </div>

        <!-- Groupes Sanguins -->
        <!-- Groupes Sanguins -->
        <div class="mt-4">
            <x-input-label for="groupes_sanguins" :value="__('Groupes Sanguins')" />
            <select id="groupes_sanguins" name="groupes_sanguins" class="block mt-1 w-full" required>
                <option value="" disabled selected>{{ __('Select your blood group') }}</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            <x-input-error :messages="$errors->get('groupes_sanguins')" class="mt-2" />
        </div>


        <!-- CIN -->
        <div class="mt-4">
            <x-input-label for="CIN" :value="__('CIN')" />
            <x-text-input id="CIN" class="block mt-1 w-full" type="text" name="CIN" :value="old('CIN')" required />
            <x-input-error :messages="$errors->get('CIN')" class="mt-2" />
        </div>
        

        <!-- User ID -->
        <div class="mt-4">
            <x-text-input id="user_id" class="block mt-1 w-full" type="hidden" name="user_id" :value="Auth::user()->id" />
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
</x-guest-layout>
