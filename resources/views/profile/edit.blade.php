<x-app-layout>
</x-app-layout>
@vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="nombre">Nom:</label>
                    <input type="text" name="nombre" value="{{ old('name', $user->name) }}">

                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}">

                    <label for="password">Contrasenya:</label>
                    <input type="password" name="password" placeholder="Cambiar contrasenya">

                    <label for="password_confirmation">Confirmar Contrasenya:</label>
                    <input type="password" name="password_confirmation" placeholder="Confirmar canvi de contrasenya">

                    <button type="submit">Guardar canvis</button><br><br>
                </form>
            </div>
        </div>
    </div>

