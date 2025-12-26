@props(['case' => 'Sample Meoww', 'desc' => '', 'id' => '', 'img' => '/images/sample.png',
 'tags' => ['Game'], 'duration' => '10 weeks', 'date' => 'December 25, 2023',
 'metrics' => ['metrics' => [''], 'quantifier' => ['']]])

<a href="/case/{{$id}}" class="group">
    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
        <div class="relative h-36 overflow-hidden aspect-video">
            <img src={{$img}} class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
        </div>
        <div class="p-6">
            <div class="flex gap-2 mb-3">
                    @foreach ($tags as $tag)
                        <x-tags category={{$tag}}></x-tags>
                    @endforeach
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                {{html_entity_decode($case, ENT_QUOTES)}}
            </h3>
            <p class="text-gray-600 text-sm mb-4">
                {{$desc}}
            </p>
            <div class="flex items-center gap-4 text-xs text-gray-500">
                <span>{{$duration}}</span>
                <span>•</span>
                <span>{{$date}}</span>
            </div>

            <div class="flex items-center gap-8 text-sm pt-2">
                @foreach ($metrics['metrics'] as $key => $metric)
                    <x-metrics :metrics="$metric" :percent="$metrics['quantifier'][$key]"></x-metrics>
                @endforeach
            </div>
        </div>
    </div>
</a>