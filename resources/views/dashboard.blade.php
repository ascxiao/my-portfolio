<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-xl font-bold">Admin Panel</a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('projects.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('projects.*') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                            Projects
                        </a>
                        <a href="{{ route('certificates.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('certifications.*') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                            Certifications
                        </a>
                        <a href="{{ route('devlogs.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('devlogs.*') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                            Devlogs
                        </a>
                        <a href="{{ route('cases.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('case-studies.*') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                            Case Studies
                        </a>
                        <a href="{{ route('artworks') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('artworks.*') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                            Artworks
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-gray-700 hover:text-gray-900">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div id="success-alert" class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded transition-opacity duration-500">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        const alert = document.getElementById('success-alert');
                        alert.style.opacity = '0';
                        setTimeout(function() {
                            alert.remove();
                        }, 500);
                    }, 3000);
                </script>
            @endif

            @if($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</x-app-layout>
