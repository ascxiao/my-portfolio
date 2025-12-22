<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hello</title>

    @vite('resources/css/app.css')
</head>
<body>
    <nav class="flex items-center justify-between px-72 h-12">
        <a href="" class="px-8">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </a>
        <div class="flex gap-6 font-bold">
            <a href="#about" class="hover:text-gray-600">About me</a>
            <a href="#projects" class="hover:text-gray-600">Projects</a>
            <a href="#contact" class="hover:text-gray-600">Certifications</a>
            <a href="#contact" class="hover:text-gray-600">Devlogs</a>
            <a href="#contact" class="hover:text-gray-600">Case Studies</a>
            <a href="#contact" class="hover:text-gray-600">Artworks</a>
        </div>
    </nav>
    <main>
        <div class="px-72">
            <x-segment title="Projects">
                <x-card project="La-um's Conquest" description='meowwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww' id=1></x-card>
                <x-card project="La-um's Conquest" description='meowwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww' id=1></x-card>
                <x-card project="La-um's Conquest" description='meowwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww' id=1></x-card>
            </x-segment>

            <x-segment title="Certifications">
                <x-card project="La-um's Conquest" description='meowwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww' id=1></x-card>
                <x-card project="La-um's Conquest" description='meowwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww' id=1></x-card>
                <x-card project="La-um's Conquest" description='meowwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww' id=1></x-card>
            </x-segment>

            <x-segment title="Case Studies">
                <x-card project="La-um's Conquest" description='meowwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww' id=1></x-card>
                <x-card project="La-um's Conquest" description='meowwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww' id=1></x-card>
                <x-card project="La-um's Conquest" description='meowwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww' id=1></x-card>
            </x-segment>
        </div>
    </main>
</body>
</html>