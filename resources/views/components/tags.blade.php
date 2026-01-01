@props(['category' => '', 'bg' => 'bg-gray-100', 'colors' => []])

@php
	$defaultColors = [
		'Game' => 'bg-rose-100',
		'Project Management' => 'bg-green-100',
		'UI/UX' => 'bg-yellow-100',
		'Frontend' => 'bg-sky-100',
		'Backend' => 'bg-purple-100',
        "Mobile" => 'bg-green-100'
	];

	$map = array_merge($defaultColors, is_array($colors) ? $colors : []);

	$normalized = [];
	foreach ($map as $k => $v) {
		$normalized[strtolower(trim($k))] = $v;
	}

	$bgClass = $normalized[strtolower(trim($category))] ?? $bg;
@endphp

<span class="{{$bgClass}} px-3 py-1 rounded-full text-xs text-gray-700">{{$category}}</span>