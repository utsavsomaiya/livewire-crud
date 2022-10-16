<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Channel CRUD</title>
    @vite('resources/js/app.js')
    @livewireStyles
</head>
<body>
    <section>
        <header class="text-gray-600 body-font border">
            <div class="container-fluid mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="ml-3 text-xl">Livewire Crud Demo</span>
                </a>
                <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                    <a href="{{ route('channel.index') }}" class="mr-5 hover:text-gray-900"> Index </a>
                </nav>
            </div>
        </header>
    </section>
    <section class="p-6">
        @yield('content')
    </section>
    @livewireScripts
</body>
</html>