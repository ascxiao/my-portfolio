@props(['title' => '', 'href'=> ''])

<div class = "p-4 sm:p-6 lg:p-8">
    <h2 class="text-lg sm:text-xl lg:text-2xl">{{$title}}</h2>
    <div class="flex flex-wrap sm:flex-row w-full gap-4 items-start sm:items-center">
        <div class="flex w-full flex-col sm:flex-row gap-4 min-w-0 items-center justify-center">
            {{$slot}}
        </div>

        <a href='{{$href}}' class="flex flex-row w-full text-xs p-2 md:p-4 items-center justify-center">
            See more
        </a>
    </div>
</div>