@props(['project' => "La-um's Conquest", 'number' => '1', 'date' => 'December 5, 2025', 'desc' => 'Struggled with this one but I finally finished the inventory system! Took me a while to understand but it was a fun one to make AAAAAAAAAAAA fgdashjfbadshjf dhfsajfbdhjsaf dfbasjhfhj HFJASBHJFSD bfhjabfhjasd BFDHJSABFHJADF.', 'href' => '#'])

<a href='/devlog' class="card max-h-36 sm:max-h-36 md:max-h-56 lg:max-h-64 p-2 sm:p-4 transition-transform duration-300 hover:scale-105 block">
    <div class="aspect-square max-h-32">
        <img src="images/sample.png" alt="" class="w-full h-full object-cover">
    </div>
    
    <div class="mx-2 sm:mx-8 md:mx-16">
        <div class="w-full wrap-break-words whitespace-normal text-left">
            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">{{html_entity_decode($project, ENT_QUOTES)}}</h3>
            <p class="text-[10px]! sm:text-[12px]! md:text-sm!">Devlog #{{$number}}</p>
            <p class="text-[14px]! sm:text-[12px]! md:[14px]!">{{$date}}</p>
            <p class="text-[8px]! sm:text-sm hidden sm:block md:text-sm! overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{html_entity_decode($desc, ENT_QUOTES)}}</p>
        </div>
    </div>
</a>