@props(['project' => '', 'description' => '', 'id' => ''])

<a href="/index/{{$id}}">
        <div class="card w-64 flex flex-col rounded-2xl overflow-hidden text-left h-72 item-center">
        <div class="aspect-video">
            <img src="/images/sample.png" alt="" class="w-full h-full object-cover">
        </div>

        <div class="p-4 w-full break-all text-left gap-2">
            <h5 class="card-text">{{html_entity_decode($project, ENT_QUOTES)}}</h5>
            <div class="flex gap-1 py-1">
                <x-tags category='Game'></x-tags>
                <x-tags category='Game'></x-tags>
            </div>
            <p class="card-text">{{html_entity_decode($description, ENT_QUOTES)}}</p>
        </div>
    </div>
</a>