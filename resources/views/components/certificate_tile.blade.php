@props(['certificate' => 'Google UX Design Certificate', 'provider' => 'Google Careers', 'date' => 'December 5, 2025', 'desc' => 'Testing', 'href' => '#'])

<a href= {{$href}} class = "card bg-red-600 max-h-48 p-4 transition-transform duration-300 hover:scale-105">
    <div class="aspect-video">
        <img src="images/sample.png" alt="" class="w-full h-full object-cover">
    </div>

    <div class="mx-16">
        <div class="w-full break-all text-left">
            <h3>{{html_entity_decode($certificate, ENT_QUOTES)}}</h3>
            <p>Provided by {{$provider}}</p>
            <p>Acquired date: {{$date}}</p>
            <p>{{html_entity_decode($desc, ENT_QUOTES)}}</p>
        </div>
    </div>
</a>