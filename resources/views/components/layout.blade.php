@props(['title' => ''])

<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>

    <link rel="icon" href="{{ asset('personal-logo.svg') }}" type="image/x-icon">
    
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <header class="relative">
        <nav class="flex items-center justify-between h-16 md:h-12">
            <a href="{{ url('/') }}" class="md:px-8" aria-label="Home">
                <x-application-logo class="w-8 h-8" />
            </a>
            
            <div class="hidden md:flex gap-6 font-bold text-sm lg:text-base">
                <a href="/about_me" class="hover:text-gray-600 whitespace-nowrap">About me</a>
                <a href="/projects" class="hover:text-gray-600">Projects</a>
                <a href="/certification" class="hover:text-gray-600">Certifications</a>
                <a href="/devlogs" class="hover:text-gray-600">Devlogs</a>
                <a href="/case_study" class="hover:text-gray-600">Case Studies</a>
                <a href="/artworks" class="hover:text-gray-600">Artworks</a>
            </div>

            <button id="menuToggle" class="md:hidden p-2 hover:bg-gray-100 rounded-lg" aria-label="Toggle menu">
                <svg id="hamburgerIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg id="closeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>

        <div id="mobileDrawer" class="fixed inset-y-0 right-0 w-64 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out md:hidden z-50">
            <div class="flex flex-col p-6 gap-4 mt-16 font-bold">
                <a href="/about_me" class="hover:text-green-900 text-base py-2 border-b">About me</a>
                <a href="/projects" class="hover:text-green-900 text-base py-2 border-b">Projects</a>
                <a href="/certification" class="hover:text-green-900 text-base py-2 border-b">Certifications</a>
                <a href="/devlogs" class="hover:text-green-900 text-base py-2 border-b">Devlogs</a>
                <a href="/case_study" class="hover:text-green-900 text-base py-2 border-b">Case Studies</a>
                <a href="/artworks" class="hover:text-green-900 text-base py-2">Artworks</a>
            </div>
        </div>

        <div id="overlay" class="fixed inset-0 hidden md:hidden z-40" style="background-color: rgba(0, 56, 23, 0.2);"></div>
    </header>

    <main>
        <div class = "px-4 md:px-16 lg:px-12 xl:px-72 bg-white" >
            {{$slot}}
        </div>
    </main>

    <footer class="px-4 md:px-16 lg:px-12 xl:px-72 bg-white pt-4">
        <hr class= " border-gray-300">
        <div>
            <div class="text-center pt-4">
                <h4 class="text-sm lg:text-base">Contact me</h4> 
            </div>

            <div class="bg-white h-auto py-4 flex flex-wrap items-center justify-center gap-2 md:gap-3">
                <a href="https://www.facebook.com/karuloos" target="_blank"
                class="p-2 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 71 72"
                fill="none">
                <path
                d="M46.4233 38.6403L47.7279 30.3588H39.6917V24.9759C39.6917 22.7114 40.8137 20.4987 44.4013 20.4987H48.1063V13.4465C45.9486 13.1028 43.7685 12.9168 41.5834 12.8901C34.9692 12.8901 30.651 16.8626 30.651 24.0442V30.3588H23.3193V38.6403H30.651V58.671H39.6917V38.6403H46.4233Z"
                fill="#111827" />
                </svg>
                </a>

                <a href="https://www.linkedin.com/in/karuloos/" target="_blank"
                class="p-2 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 72 72"
                fill="none">
                <path
                d="M24.7612 55.999V28.3354H15.5433V55.999H24.7621H24.7612ZM20.1542 24.5591C23.3679 24.5591 25.3687 22.4348 25.3687 19.7801C25.3086 17.065 23.3679 15 20.2153 15C17.0605 15 15 17.065 15 19.7799C15 22.4346 17.0001 24.5588 20.0938 24.5588H20.1534L20.1542 24.5591ZM29.8633 55.999H39.0805V40.5521C39.0805 39.7264 39.1406 38.8985 39.3841 38.3088C40.0502 36.6562 41.5668 34.9455 44.1138 34.9455C47.4484 34.9455 48.7831 37.4821 48.7831 41.2014V55.999H58V40.1376C58 31.6408 53.4532 27.6869 47.3887 27.6869C42.4167 27.6869 40.233 30.4589 39.0198 32.347H39.0812V28.3364H29.8638C29.9841 30.9316 29.8631 56 29.8631 56L29.8633 55.999Z"
                fill="#111827" />
                </svg></a>

                <a href="mailto:cmcvldz231@gmail.com?subject=Inquiry from Portfolio&body=Hi there, I saw your portfolio and..." target="_blank"
                class="p-2 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 72 72"
                fill="none">
                <path
                d="M11.9362 56.1235H20.4189V35.5227L8.30078 26.434V52.4881C8.30078 54.4997 9.93067 56.1235 11.9362 56.1235Z"
                fill="#111827" />
                <path
                d="M49.5025 56.1235H57.9853C59.9969 56.1235 61.6207 54.4936 61.6207 52.4881V26.434L49.5025 35.5227"
                fill="#111827" />
                <path
                d="M49.5025 19.7693V35.5227L61.6207 26.434V21.587C61.6207 17.0912 56.4887 14.5282 52.8956 17.2245"
                fill="#111827" />
                <path d="M20.4189 35.5227V19.769L34.9607 30.6754L49.5025 19.7693V35.5227L34.9607 46.429"
                fill="#111827" />
                <path
                d="M8.30078 21.587V26.434L20.4189 35.5227V19.769L17.0259 17.2245C13.4268 14.5282 8.30078 17.0912 8.30078 21.587Z"
                fill="#111827" />
                </svg></a>
                
                </div>
            </div>
        </div>
    </footer>

    <a href="{{route('login')}}" target="_blank" class="group hidden lg:flex fixed bottom-8 right-12 bg-green-900 hover:bg-green-700 p-4 rounded-full shadow-lg transition-all duration-300 hover:scale-105 z-50 opacity-0 hover:opacity-100">
        <img src="{{ asset('svg/personal-logo-white.svg') }}" alt="Icon" class="size-10">
    </a>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const mobileDrawer = document.getElementById('mobileDrawer');
        const overlay = document.getElementById('overlay');
        const hamburgerIcon = document.getElementById('hamburgerIcon');
        const closeIcon = document.getElementById('closeIcon');

        function toggleMenu() {
            mobileDrawer.classList.toggle('translate-x-full');
            overlay.classList.toggle('hidden');
            hamburgerIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        }

        menuToggle.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        // Close drawer when clicking a link
        document.querySelectorAll('#mobileDrawer a').forEach(link => {
            link.addEventListener('click', toggleMenu);
        });
    </script>
</body>
</html>