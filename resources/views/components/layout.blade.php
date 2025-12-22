<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <nav>
            <h1>PORTFOLIOOOO</h1>
            <a href="/show/create"> meow</a>
        </nav>
    </header>

    <main class="container">
        {{$slot}}
    </main>
</body>
</html>