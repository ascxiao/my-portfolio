<x-layout title="Devlogs">
    <div class="md:p-4 grid justify-center">
        <h2>Devlogs</h2>
    </div>
    <div class="grid grid-rows-1 gap-4">
        @foreach ($devlogs as $devlog)
            <x-devlog_tile
                :title="$devlog['title']"
                :id="$devlog['id']"
                :date="$devlog['creation_date']->format('F j, Y')"
                :desc="$devlog['description']"
                :tags="$devlog['tags']"
                :image="$devlog['image']">
            </x-devlog_tile>
        @endforeach
    </div>
</x-layout>