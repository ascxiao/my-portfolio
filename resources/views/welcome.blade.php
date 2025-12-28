<x-layout title='kaluroos'>
    <x-segment title="Projects" href='projects'>
        @foreach ($projects as $project)
            <x-card
                :title="$project['title']"
                :desc="$project['description']"
                :img="$project['image']"
                :tags="$project['tags']"
                :duration="$project['duration']"></x-card>
        @endforeach
    </x-segment>

    <x-segment title="Certifications" href='certifications'>
        @foreach ($certifications as $certification)
            <x-card
                :title="$certification['title']"
                :desc="$certification['provider']"
                :img="$certification['image']"></x-card>
        @endforeach
    </x-segment>

    <x-segment title="Case Studies" href='case_study'>
        @foreach ($cases as $case)
            <x-card
                :title="$case['title']"
                :desc="$case['description']"
                :img="$case['image']"
                :tags="$case['tags']"
                :duration="$case['duration']"></x-card>
        @endforeach
    </x-segment>
</x-layout>