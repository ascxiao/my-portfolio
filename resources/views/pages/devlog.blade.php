<x-layout title="Devlog {{$devlog->id}}">
        <div class="py-12">
        <div class="flex items-center gap-3 mb-4">
            @foreach ($devlog->tags as $tag)
                <x-tags category={{$tag}} fontSize='text-sm font-medium'></x-tags>
            @endforeach
        </div>
        
        <h1 class="text-xl md:text-3xl font-bold text-gray-900 mb-6 leading-tight">
            {{$devlog->title}}
        </h1>
        
        <div class="flex items-center gap-6 text-gray-600 mb-8">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                {{$devlog->creation_date->format('F j, Y')}}
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{$devlog->read_time}} minute read
            </div>
        </div>

        <!-- Featured Image -->
        <div class="rounded-xl overflow-hidden shadow-lg mb-8">
            <img src={{$devlog->image}} 
                    alt={{$devlog->title}} 
                    class="w-full h-auto">
        </div>

        <x-article_content :contents="$devlog->content"></x-article_content>
    </div>
</x-layout>