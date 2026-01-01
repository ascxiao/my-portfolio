<x-layout title='Case Studies'>
    <div class="lg:p-4 grid justify-center">
        <h2>Case Studies</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 justify-items-start md:justify-items-center mb-8 md:mb-16">
        @foreach ($cases as $case)
            <x-case_card 
                :id="$case['id']"
                :case="$case['title']"
                :desc="$case['description']"
                :img="$case['image']"
                :tags="$case['tags']"
                :duration="$case['duration']"
                :date="$case['date'] ? $case['date']->format('F j, Y') : 'N/A'"
                :metrics="$case['metrics']"
                ></x-case_card>
        @endforeach
    </div>

    {{$cases->links('pagination.white')}}
</x-layout>