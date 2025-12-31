@props(['case' => 'Sample Meoww', 'desc' => '', 'id' => '', 'img' => '/images/sample.png',
 'tags' => ['Game'], 'duration' => '10 weeks', 'date' => 'December 25, 2023',
 'metrics' => ['metrics' => [''], 'quantifier' => ['']]])

<a href="{{route('cases.show', $id)}}" class="group">
    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
        <div class="relative h-36 overflow-hidden aspect-video">
            <img src={{asset('storage/'.$img)}} class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
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
                <span>{{$duration}} weeks</span>
                <span>•</span>
                <span>{{$date}}</span>
            </div>

            <div class="flex flex-wrap items-center gap-4 text-sm pt-2">
                @php
                    $metricsList = [];
                    // Shape 1: array of metric rows: [['metrics' => 'Users', 'quantifier' => '120%'], ...]
                    if (is_array($metrics) && isset($metrics[0]) && is_array($metrics[0])) {
                        $metricsList = $metrics;
                    }
                    // Shape 2: legacy parallel arrays: ['metrics' => [...], 'quantifier' => [...]]
                    elseif (is_array($metrics) && isset($metrics['metrics']) && is_array($metrics['metrics'])) {
                        foreach ($metrics['metrics'] as $k => $m) {
                            $metricsList[] = [
                                'metrics' => $m,
                                'quantifier' => $metrics['quantifier'][$k] ?? '',
                            ];
                        }
                    }
                @endphp

                @foreach ($metricsList as $item)
                    <x-metrics :metrics="$item['metrics'] ?? ''" :percent="$item['quantifier'] ?? ''"></x-metrics>
                @endforeach
            </div>
        </div>
    </div>
</a>