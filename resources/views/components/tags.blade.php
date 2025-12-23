@props(['category' => ''])

<div {{ $attributes->merge(['class' => 'tag']) }}>
    <p class="text-[10px]! md:[12px]!">{{$category}}</p>
</div>