@props(['src' => '/images/sample.png', 'title' => 'Sample Text', 'date' => 'December 3, 2023', 'tags' => ['try', 'meow']])

<div class="group relative overflow-hidden rounded-lg cursor-pointer bg-gray-200 hover:shadow-xl transition-all duration-300 size-large" data-index="0">
    <img src={{$src}} alt={{$title}} class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end" style="background-color: rgba(0, 0, 0, 0.4);">
        <div class="p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
            <h3 class="font-semibold text-lg">{{$title}}</h3>
                <div class="flex gap-2">
                    @foreach ($tags as $tag)
                        <x-tags category={{$tag}} style="background: transparent; border-color: white; color: white;"></x-tags>
                    @endforeach
                </div>
            <p class="text-sm opacity-90">{{$date}}</p>
        </div>
    </div>
</div>