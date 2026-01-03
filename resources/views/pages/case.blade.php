<x-layout :title="$case->title">
    <!-- Hero Section -->
    <div class="bg-gradient-to-br from-blue-200 to-green-100 rounded-b-3xl">
        <div class="max-w-5xl mx-auto px-6 py-20">
            <div class="flex gap-3 mb-6">
                    @foreach ($case->tags as $tag)
                        <x-tags category={{$tag}} fontSize='text-sm font-medium'></x-tags>
                    @endforeach
            </div>
            <h1 class="text-xl md:text-2xl font-bold mb-6 leading-tight text-gray-900">
                {{$case->title}}
            </h1>
            <p class="text-md text-gray-600 leading-relaxed max-w-3xl">
                {{$case->description}}
            </p>
        </div>
    </div>

    <!-- Project Overview -->
    <div class="max-w-5xl mx-auto px-6 -mt-12">
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 grid md:grid-cols-4 gap-8">
            <div>
                <div class="text-sm text-gray-500 mb-2">Role</div>
                <div class="font-semibold text-gray-900">{{$case->role}}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500 mb-2">Duration</div>
                <div class="font-semibold text-gray-900">{{$case->duration}} weeks</div>
            </div>
            <div>
                <div class="text-sm text-gray-500 mb-2">Team</div>
                <div class="font-semibold text-gray-900">{{$case->team}}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500 mb-2">Year</div>
                <div class="font-semibold text-gray-900">{{$case->date->format('Y')}}</div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto px-6 py-16">
        <!-- Key Metrics -->
        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-8 md:p-12 mb-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Key Results</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $metricsList = [];
                    if (is_array($case->metrics) && isset($case->metrics[0]) && is_array($case->metrics[0])) {
                        $metricsList = $case->metrics;
                    }
                    elseif (is_array($case->metrics) && isset($case->metrics['metrics']) && is_array($case->metrics['metrics'])) {
                        foreach ($case->metrics['metrics'] as $k => $m) {
                            $metricsList[] = [
                                'metrics' => $m,
                                'quantifier' => $case->metrics['quantifier'][$k] ?? '',
                            ];
                        }
                    }
                @endphp

                @foreach ($metricsList as $item)
                    <div>
                        <div class="text-5xl font-bold text-green-500 mb-2">{{$item['quantifier']}}</div>
                        <div class="text-gray-700 font-medium">{{$item['metrics']}}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Hero Image -->
        <div class="mb-16">
            <img src={{Storage::url($case->image)}}
                 alt={{$case->title}} 
                 class="w-full rounded-2xl shadow-lg">
        </div>

        <div class="bg-white shadow-sm rounded-lg p-6">
            <div class="ql-editor">
                {!! $case->content !!}
            </div>
        </div> 
    </div>

    <!-- Back to Top -->
    <div class="max-w-5xl mx-auto px-6 pb-16">
        <a href="#" class="flex items-center justify-center gap-2 text-gray-600 hover:text-blue-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
            </svg>
            Back to top
        </a>
    </div>
</x-layout>