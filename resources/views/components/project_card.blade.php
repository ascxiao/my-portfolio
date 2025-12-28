@props(['id'=> 0, 'title' => '', 'desc' => '', 'img' => '/images/sample.png', 'tags' => ['Game'], 'duration' => 'Ongoing', 'href'])

<a href={{$href}} class="group">
    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 w-full">
        <div class="relative w-full h-28 lg:h-36 aspect-video">
            <img src={{$img}} class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
        </div>
        <div class="p-6">
            <div class="flex flex-wrap gap-2 mb-3">
                    @foreach ($tags as $tag)
                        <x-tags category={{$tag}}></x-tags>
                    @endforeach
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                {{html_entity_decode($title, ENT_QUOTES)}}
            </h3>
            <p class="text-gray-600 text-[10px]! lg:text-sm mb-4">
                {{$desc}}
            </p>
            <div class="flex items-center gap-4 text-xs text-gray-500">
                <span>{{$duration}} weeks</span>
            </div>
        </div>
    </div>
</a>