@props(['contents'])

@php
    $data = is_string($contents) ? json_decode($contents, true) : $contents;
@endphp

<div class="space-y-8">
    @foreach($data['sections'] ?? [] as $section) 
        
        {{-- Markdown Section --}}
        @if($section['type'] === 'markdown')
            <section class="mb-16">
                <div class="prose prose-lg max-w-none markdown-content">{{ $section['content'] }}</div>
            </section>
        
        {{-- Two Column Grid (Pain Points & Opportunities) --}}
        @elseif($section['type'] === 'two_column_grid')
            <div class="grid md:grid-cols-2 gap-6 mb-16">
                @foreach($section['columns'] as $column)
                    <div class="bg-white border-2 border-{{ $column['color'] }}-100 rounded-xl p-6">
                        <div class="text-{{ $column['color'] }}-600 font-bold text-lg mb-3">{{ $column['title'] }}</div>
                        <ul class="space-y-2 text-gray-700">
                            @foreach($column['items'] as $item)
                                <li class="flex items-start">
                                    <span class="text-{{ $column['color'] }}-500 mr-2">•</span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        
        {{-- Numbered Steps --}}
        @elseif($section['type'] === 'numbered_steps')
            <section class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ $section['title'] }}</h2>
                @if(isset($section['description']))
                    <div class="prose prose-lg max-w-none mb-8">
                        <p class="text-gray-700 leading-relaxed">{{ $section['description'] }}</p>
                    </div>
                @endif
                
                <div class="space-y-6">
                    @foreach($section['steps'] as $index => $step)
                        <div class="bg-white rounded-xl p-8 shadow-md">
                            <div class="flex items-start gap-4">
                                <div class="bg-{{ $step['color'] }}-100 text-{{ $step['color'] }}-600 rounded-full w-12 h-12 flex items-center justify-center font-bold text-xl shrink-0">
                                    {{ $index + 1 }}
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $step['title'] }}</h3>
                                    <p class="text-gray-700">{{ $step['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        
        {{-- Image Section --}}
        @elseif($section['type'] === 'image')
            <div class="mb-16">
                <img src="{{ $section['url'] }}" 
                        alt="{{ $section['caption'] ?? '' }}"
                        class="w-full rounded-2xl shadow-lg mb-4">
                @if(isset($section['caption']))
                    <p class="text-gray-600 text-center">{{ $section['caption'] }}</p>
                @endif
            </div>
        
        {{-- Image Grid --}}
        @elseif($section['type'] === 'image_grid')
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                @foreach($section['images'] as $image)
                    <div>
                        <img src="{{ $image['url'] }}" 
                                alt="{{ $image['caption'] ?? '' }}"
                                class="w-full rounded-xl shadow-md mb-4">
                        <p class="text-gray-600 text-center text-sm">{{ $image['caption'] }}</p>
                    </div>
                @endforeach
            </div>
        
        {{-- Feature Cards Grid --}}
        @elseif($section['type'] === 'feature_cards')
            <section class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ $section['title'] }}</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach($section['features'] as $feature)
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <div class="w-12 h-12 bg-{{ $feature['color'] }}-100 rounded-lg flex items-center justify-center mb-4">
                                {!! $feature['icon'] !!}
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $feature['title'] }}</h3>
                            <p class="text-gray-600">{{ $feature['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        
        {{-- Gradient Impact Section --}}
        @elseif($section['type'] === 'impact_section')
            <section class="mb-16 bg-linear-to-br from-{{ $section['from_color'] }}-800 to-{{ $section['to_color'] }}-700 rounded-2xl p-8 md:p-12 text-white">
                <h2 class="text-3xl font-bold mb-6">{{ $section['title'] }}</h2>
                <p class="text-blue-100 leading-relaxed mb-8">
                    {{ $section['description'] }}
                </p>
                <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                    <h3 class="font-bold text-xl mb-4">{{ $section['subsection_title'] }}</h3>
                    <ul class="space-y-3">
                        @foreach($section['items'] as $item)
                            <li class="flex items-start">
                                <span class="text-green-400 mr-2">✓</span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        
        {{-- Code Block --}}
        @elseif($section['type'] === 'code')
            <div class="mb-16 bg-gray-900 rounded-xl overflow-hidden shadow-lg">
                <div class="bg-gray-800 px-6 py-3 text-gray-400 text-sm border-b border-gray-700">
                    {{ $section['language'] ?? 'code' }}
                </div>
                <div class="p-6">
                    <pre><code class="language-{{ $section['language'] ?? 'plaintext' }}">{{ $section['content'] }}</code></pre>
                </div>
            </div>
        {{-- Video Section --}}
        @elseif($section['type'] === 'video')
            <div class="mb-16 rounded-2xl overflow-hidden shadow-lg">
                <iframe src="{{ $section['url'] }}" 
                        class="w-full h-96 md:h-125"
                        allowfullscreen></iframe>
            </div>
        @elseif($section['type'] === 'tldr')
            <div class="bg-{{ $section['color'] ?? 'blue' }}-50 border-l-4 border-{{ $section['color'] ?? 'blue' }}-500 rounded-r-lg p-6 mb-16">
                <h2 class="font-bold text-lg text-gray-900 mb-3">{{ $section['title'] ?? 'TL;DR' }}</h2>
                <ul class="space-y-2 text-gray-700">
                    @foreach($section['items'] as $item)
                        <li>• {{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
    @endforeach
</div>

<script>
    // Parse markdown content
    document.querySelectorAll('.markdown-content').forEach(el => {
        const markdown = el.textContent;
        el.innerHTML = marked.parse(markdown);
    });
    
    // Highlight code blocks
    hljs.highlightAll();
</script>