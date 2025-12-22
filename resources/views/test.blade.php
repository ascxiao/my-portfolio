<x-layout>
    <h2>rawr</h2>
    <p>{{$greeting}}</p>

    <ul>
        @foreach ($ninjas as $ninja)
                <li>
                    <x-card href="/show/{{$ninja['id']}}" :highlight="$ninja['skill'] > 70">
                        <h3>{{ $ninja['name'] }}</h3>
                    </x-card>
                </li>
        @endforeach
    </ul>
</x-layout>