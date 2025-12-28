<x-layout title='Case Studies'>
    <div class="lg:p-4 grid justify-center">
        <h2>Case Studies</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 justify-items-start md:justify-items-center">
        @foreach ($cases as $case)
            <x-case_card 
                :id="$case['id']"
                :case="$case['title']"
                :desc="$case['description']"
                :img="$case['image']"
                :tags="$case['tags']"
                :duration="$case['duration']"
                :date="$case['creation_date']->format('F j, Y')"
                :metrics="$case['metrics']"
                ></x-case_card>
        @endforeach
    </div>
</x-layout>