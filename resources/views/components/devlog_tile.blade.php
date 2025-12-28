@props(['title' => "La-um's Conquest", 'id' => '1', 'date' => 'December 5, 2025', 'desc', 'tags' => ['Game' ,'UI/UX'], 'image'=>''])

<a href="{{route('devlogs.show', $id)}}" class="card max-h-36 sm:max-h-36 md:max-h-56 lg:max-h-64 p-2 sm:p-4 transition-transform duration-300 hover:scale-105 block">
    <div class="flex items-center justify-center aspect-square max-h-32">
        <img src={{$image}} alt={{$title}} class="w-full h-full object-cover">
    </div>
    
    <div class="px-4 md:px-16 lg:pr-16 lg:pl-8">
        <div class="w-full wrap-break-words whitespace-normal text-left">
            <h3 class="text-[14px]! md:text-lg! font-bold text-gray-900 group-hover:text-blue-600 transition-colors">{{html_entity_decode($title, ENT_QUOTES)}}</h3>
            <p class="text-[10px]! md:text-[12px]! lg:text-sm!">Devlog #{{$id}}</p>
            <p class="text-[10px]! md:text-[12px]! lg:[14px]!">{{$date}}</p>
            @foreach ($tags as $tag)
                <x-tags category={{$tag}}></x-tags>
            @endforeach<p class="text-[6px]! hidden md:text-xs! overflow-hidden md:[display:-webkit-box] md:[-webkit-line-clamp:2] md:[-webkit-box-orient:vertical]">{{html_entity_decode($desc, ENT_QUOTES)}}</p
            >
        </div>
    </div>
</a>