@extends('dashboard')

@section('content')
    <a href= "{{route('projects.create')}}" class="flex flex-col items-center pb-8 transition-transform duration-300 hover:scale-105 gap-2" title="Add Project">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-green-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    </a>
    <div class="grid grid-rows gap-4 mb-8 lg:px-32 md:mb-16" id='projects'>
        @foreach ($projects as $project)
            <x-tile
                :content="$project"
                category="Projects"></x-tile>
        @endforeach

         {{$projects->links('pagination.white')}}
    </div>
@endsection