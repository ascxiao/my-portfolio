<x-layout title="About me!">
    <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8 px-4 md:px-8">
        <div class="w-full text-center md:text-left md:w-auto p-6 md:p-8 lg:p-16 max-w-full md:max-w-md lg:max-w-lg">
            <h1 class="text-xl md:text-5xl lg:text-3xl font-bold mb-4">Hi! I'm Carlos</h1>
            <p class="mb-4 text-xs text-gray-700 leading-relaxed">I’m a sprouting bud figuring things out—turning ideas into actual, working things (artworks, games, projects, and the occasional “why didn’t I think of that sooner?” moment). I enjoy creating work that not only looks good but can also help or inspire the community around me.</p>
            <p class="mb-4 text-xs text-gray-700 leading-relaxed">I believe in getting a little better every day, mostly by learning new things and trying them out until they click. My interests orbit around project management, data science, game development, UI/UX design, 2D illustration, and logo creation—basically, if it involves building something meaningful, I’m probably curious about it.</p>
            <p class="text-xs text-gray-700 leading-relaxed">I’m based in the Philippines, where my creative fuel comes from a mild obsession with Filipino mythology and stories that feel ancient, strange, and powerful.</p>
        </div>

        <div class="w-full md:w-auto md:grow max-w-xs sm:max-w-sm md:max-w-md lg:max-h-64 aspect-square">
            <img src={{asset('storage/images/yb-1.png')}} alt="" class="w-full h-full object-cover rounded-2xl">
        </div>
    </div>

    <div class="flex flex-col md:flex-row items-center gap-2 md:gap-8 px-4 md:px-8">
        <div class="justify-between w-full text-center md:text-left md:pl-8 lg:pl-16">
            <h2 class="text-md md:text-xl font-bold mb-4">Have an opportunity in mind? Let's talk!</h2> 
        </div>

        <div class="flex gap-4">
            <a href="javascript:;"
            class="w-12 h-12 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 72 72" fill="none">
                    <path d="M46.4233 38.6403L47.7279 30.3588H39.6917V24.9759C39.6917 22.7114 40.8137 20.4987 44.4013 20.4987H48.1063V13.4465C45.9486 13.1028 43.7685 12.9168 41.5834 12.8901C34.9692 12.8901 30.651 16.8626 30.651 24.0442V30.3588H23.3193V38.6403H30.651V58.671H39.6917V38.6403H46.4233Z" fill="#111827" />
                </svg>
            </a>

            <a href="javascript:;"
            class="w-12 h-12 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 72 72" fill="none">
                    <path d="M24.7612 55.999V28.3354H15.5433V55.999H24.7621H24.7612ZM20.1542 24.5591C23.3679 24.5591 25.3687 22.4348 25.3687 19.7801C25.3086 17.065 23.3679 15 20.2153 15C17.0605 15 15 17.065 15 19.7799C15 22.4346 17.0001 24.5588 20.0938 24.5588H20.1534L20.1542 24.5591ZM29.8633 55.999H39.0805V40.5521C39.0805 39.7264 39.1406 38.8985 39.3841 38.3088C40.0502 36.6562 41.5668 34.9455 44.1138 34.9455C47.4484 34.9455 48.7831 37.4821 48.7831 41.2014V55.999H58V40.1376C58 31.6408 53.4532 27.6869 47.3887 27.6869C42.4167 27.6869 40.233 30.4589 39.0198 32.347H39.0812V28.3364H29.8638C29.9841 30.9316 29.8631 56 29.8631 56L29.8633 55.999Z" fill="#111827" />
                </svg>
            </a>

            <a href="javascript:;"
            class="w-12 h-12 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 72 72" fill="none">
                    <path d="M11.9362 56.1235H20.4189V35.5227L8.30078 26.434V52.4881C8.30078 54.4997 9.93067 56.1235 11.9362 56.1235Z" fill="#111827" />
                    <path d="M49.5025 56.1235H57.9853C59.9969 56.1235 61.6207 54.4936 61.6207 52.4881V26.434L49.5025 35.5227" fill="#111827" />
                    <path d="M49.5025 19.7693V35.5227L61.6207 26.434V21.587C61.6207 17.0912 56.4887 14.5282 52.8956 17.2245" fill="#111827" />
                    <path d="M20.4189 35.5227V19.769L34.9607 30.6754L49.5025 19.7693V35.5227L34.9607 46.429" fill="#111827" />
                    <path d="M8.30078 21.587V26.434L20.4189 35.5227V19.769L17.0259 17.2245C13.4268 14.5282 8.30078 17.0912 8.30078 21.587Z" fill="#111827" />
                </svg>
            </a>
        </div>
    </div>
</x-layout>