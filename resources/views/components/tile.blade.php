@props(['content', 'category'])

<a 
    @if ($category === 'Projects')
        href="{{ route('projects.edit', $content->id) }}"
    @elseif ($category === 'Certificates')
        href="{{ route('certificates.edit', $content->id) }}"
    @elseif ($category === 'Devlogs')
        href="{{ route('devlogs.edit', $content->id) }}"
    @elseif ($category === 'Cases')
        href="{{ route('cases.edit', $content->id) }}"
    @else
        href="#"
    @endif
    title='Edit'>
    <div  class="card max-h-36 sm:max-h-36 md:max-h-56 lg:max-h-64 p-2 sm:p-4 transition-transform duration-300 hover:scale-105 block items-center justify-between">
        <div class="flex flex-row">
            <div class="flex items-center justify-center aspect-square max-h-32">
                <img src={{asset('storage/'.$content->image)}} alt={{$content->title}} class="w-full h-full object-cover">
            </div>
        
            <div class="px-4 md:px-16 lg:pr-16 lg:pl-8">
                <div class="w-full wrap-break-words whitespace-normal text-left">
                    <h3 class="p-2 text-[14px]! md:text-lg! font-bold text-gray-900 group-hover:text-blue-600 transition-colors">{{html_entity_decode($content->title, ENT_QUOTES)}}</h3>
                    @if($content->tags)
                        @php
                            $tagsArray = is_string($content->tags) ? array_filter(array_map('trim', explode(',', $content->tags))) : $content->tags;
                        @endphp
                        @if(count($tagsArray) > 0)
                            @foreach ($tagsArray as $tag)
                                <x-tags category={{$tag}}></x-tags>
                            @endforeach
                        @endif
                    @endif
                    @if($content->provider)
                        <span class="p-2 text-xs">Provided by {{$content->provider}}</span>
                    @endif
                    <p class="p-2 text-[6px]! hidden md:text-xs! overflow-hidden md:[display:-webkit-box] md:[-webkit-line-clamp:2] md:[-webkit-box-orient:vertical]">{{html_entity_decode($content->description, ENT_QUOTES)}}</p>
                </div>
            </div>
        </div>

        
        <form 
            @if ($category == 'Projects')
                action="{{route('projects.destroy', $content->id)}}"
            @elseif ($category == 'Certificates')
                action="{{route('certificates.destroy', $content->id)}}"
            @elseif ($category == 'Devlogs')
                action="{{route('devlogs.destroy', $content->id)}}"
            @elseif ($category == 'Cases')
                action="{{route('cases.destroy', $content->id)}}"
            @endif 
            
            method="POST" class="inline p-4">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this?')" class="text-gray-600 hover:text-red-600" title="Delete">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </button>
        </form>
    </div>
</a>