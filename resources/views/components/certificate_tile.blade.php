@props(['certificate' => 'Google UX Design Certificate', 'provider' => 'Google Careers', 'date' => 'December 5, 2025', 'desc' => 'Testing', 'image' => 'images/sample.png', 'link' => 'facebook.com'])

<div
    class="card bg-red-600 max-h-36 sm:max-h-36 md:max-h-56 lg:max-h-64 p-2 sm:p-4 transition-transform duration-300 hover:scale-105 block"
    data-title="{{$certificate}}"
    data-provider="{{$provider}}"
    data-date="{{$date}}"
    data-link="{{$link}}"
>
    <div class="aspect-square sm:aspect-square md:aspect-video h-auto">
        <img src={{asset('storage/'.$image)}} alt="{{$certificate}}" class="w-full h-full object-cover">
    </div>

    <div class="mx-2 sm:mx-8 md:mx-16">
        <div class="w-full wrap-break-words whitespace-normal text-left">
            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors" data-title-text>{{html_entity_decode($certificate, ENT_QUOTES)}}</h3>
            <p class="text-[10px]! sm:text-[12px]! md:text-sm!" data-provider>Provided by {{$provider}}</p>
            <p class="text-[10px]! sm:text-[8px]! md:text-sm!" data-date>Acquired date: {{$date}}</p>
            <p class="text-[8px]! sm:text-sm hidden sm:block md:text-sm! overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{html_entity_decode($desc, ENT_QUOTES)}}</p>
            <a class="sr-only" data-link href="{{$link}}">View Certificate</a>
        </div>
    </div>
</div>