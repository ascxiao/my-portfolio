@props(['title' => ''])

<div class = "p-4 sm:p-6 lg:p-8">
    <h2 class="text-lg sm:text-xl lg:text-2xl">{{$title}}</h2>
        <div class="flex flex-col sm:flex-row w-full gap-4 items-start sm:items-center">
            <a href="" class="hidden sm:flex items-center justify-center p-2 rounded-md hover:bg-gray-100 transition-colors shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>

            <div class="flex w-full flex-col sm:flex-row gap-4 min-w-0">
                {{$slot}}
            </div>

            <a href="" class="hidden sm:flex items-center justify-center p-2 rounded-md hover:bg-gray-100 transition-colors shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </div>
</div>