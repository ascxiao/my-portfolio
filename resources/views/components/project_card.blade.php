@props(['project' => '', 'description' => '', 'id' => '', 'image' => '/images/sample.png', 'tags' => ['Game']])

<a href="/project/{{$id}}" class="w-full sm:w-48 md:w-48 lg:w-64 block">
        <div class="card w-full flex flex-row sm:flex-col rounded-2xl overflow-hidden text-left h-20 sm:h-64 md:h-68 lg:h-72 item-center transition-transform duration-300 hover:scale-105">
            <div class="w-16 sm:w-full aspect-square sm:aspect-video shrink-0">
                <img src={{$image}} alt="" class="w-full h-full object-cover">
            </div>

            <div class="p-2 sm:p-3 md:p-4 w-full break-all text-left gap-1 sm:gap-2 flex flex-col justify-center">
                <h5 class="card-text text-xs sm:text-base">{{html_entity_decode($project, ENT_QUOTES)}}</h5>
                <div class="flex gap-1 py-1">
                    @foreach ($tags as $tag)
                        <x-tags category={{$tag}}></x-tags>
                    @endforeach
                </div>
                <p class="card-text text-[8px] sm:text-sm hidden sm:block overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{html_entity_decode($description, ENT_QUOTES)}}</p>
            </div>
    </div>
</a>