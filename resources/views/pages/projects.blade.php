<x-layout title='Projects'>
    <div class="lg:p-4 grid justify-center">
        <h2>Projects</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 justify-items md:justify-items-center mb-8 md:mb-16">
        @foreach ($projects as $project)
            <x-project_card :project="$project"></x-project_card>
        @endforeach
    </div>
    {{$projects->links('pagination.white')}}
</x-layout>