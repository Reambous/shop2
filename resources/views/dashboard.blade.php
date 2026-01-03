<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                        @if (auth()->user()->role == 'admin')
                            <div class="mt-4">
                                <a href="{{ route('produk.index') }}"
                                    style="background: #4A90E2; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                                    Masuk ke Manajemen Produk (Admin)
                                </a>
                            @else
                                <br>
                                <a href="{{ route('katalog.index') }}" style="color: blue;">
                                    🛍️ Mulai Belanja (Lihat Katalog)
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>

</body>

</html>
