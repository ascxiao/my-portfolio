<x-layout title="About me!">
    <div class="flex flex-col gap-4 2xl:mx-48">
        {{--Introduction --}}
        <div class="flex flex-col md:flex-row items-center md:px-8 justify-center">
            <div class="w-2/3 text-justify md:p-8 lg:p-16">
                <h1 class="text-xl md:text-3xl lg:text-3xl font-bold mb-4">Hi! I'm Carlos</h1>
                <p class="mb-4 text-xs text-gray-700 leading-relaxed">I’m a sprouting bud figuring things out—turning ideas into actual, working things (artworks, games, projects, and the occasional “why didn’t I think of that sooner?” moment). I enjoy creating work that not only looks good but can also help or inspire the community around me.</p>
                <p class="mb-4 text-xs text-gray-700 leading-relaxed">I believe in getting a little better every day, mostly by learning new things and trying them out until they click. My interests orbit around project management, data science, game development, UI/UX design, 2D illustration, and logo creation—basically, if it involves building something meaningful, I’m probably curious about it.</p>
                <p class="text-xs text-gray-700 leading-relaxed">I’m based in the Philippines, where my creative fuel comes from a mild obsession with Filipino mythology and stories that feel ancient, strange, and powerful.</p>
            </div>

            <div class="w-1/3 flex flex-row justify-center">
                <img src='images/yb-4.png' alt="" class="lg:size-64 object-cover rounded-2xl aspect-square">
            </div>
        </div>

        {{-- Contact Me --}}
        <div class="flex flex-col md:flex-row items-center gap-2 md:gap-8 px-4 md:px-8">
            <div class="justify-between w-full text-center md:text-left md:pl-8 lg:pl-16">
                <h2 class="text-md md:text-xl font-bold mb-4">Have an opportunity in mind? Let's talk!</h2> 
            </div>

            <div class="flex gap-4">
                <a href="https://www.facebook.com/karuloos" target="_blank"
                class="w-12 h-12 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 72 72" fill="none">
                        <path d="M46.4233 38.6403L47.7279 30.3588H39.6917V24.9759C39.6917 22.7114 40.8137 20.4987 44.4013 20.4987H48.1063V13.4465C45.9486 13.1028 43.7685 12.9168 41.5834 12.8901C34.9692 12.8901 30.651 16.8626 30.651 24.0442V30.3588H23.3193V38.6403H30.651V58.671H39.6917V38.6403H46.4233Z" fill="#111827" />
                    </svg>
                </a>

                <a href="https://www.linkedin.com/in/karuloos/" target="_blank"
                class="w-12 h-12 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 72 72" fill="none">
                        <path d="M24.7612 55.999V28.3354H15.5433V55.999H24.7621H24.7612ZM20.1542 24.5591C23.3679 24.5591 25.3687 22.4348 25.3687 19.7801C25.3086 17.065 23.3679 15 20.2153 15C17.0605 15 15 17.065 15 19.7799C15 22.4346 17.0001 24.5588 20.0938 24.5588H20.1534L20.1542 24.5591ZM29.8633 55.999H39.0805V40.5521C39.0805 39.7264 39.1406 38.8985 39.3841 38.3088C40.0502 36.6562 41.5668 34.9455 44.1138 34.9455C47.4484 34.9455 48.7831 37.4821 48.7831 41.2014V55.999H58V40.1376C58 31.6408 53.4532 27.6869 47.3887 27.6869C42.4167 27.6869 40.233 30.4589 39.0198 32.347H39.0812V28.3364H29.8638C29.9841 30.9316 29.8631 56 29.8631 56L29.8633 55.999Z" fill="#111827" />
                    </svg>
                </a>

                <a href="mailto:cmcvldz231@gmail.com?subject=Inquiry from Portfolio&body=Hi there, I saw your portfolio and..."
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

        <hr class= " border-gray-100">

        {{-- Education --}}
        <div class="w-full flex flex-col px-4 md:px-8 gap-2">
            <h2 class="font-bold mb-4 text-justify md:w-auto px-6 md:px-8 lg:px-16">Education</h2>

            <div class="flex flex-col gap-12">
                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>Primary School - Junior High School</h3>
                        <h4>Philippine Normal University-Visayas | Cadiz City, Negros Occidental</h4>
                        <div class="group hidden md:flex md:flex-col">
                            <p>For almost 12 years, I spent most of my development in this institution. I've been quite involved in the scouting movement, journalism, student leadership, and academics.</p>
                            <p>I left this school as Class Salutatorian, carrying the core value of Truth, Excellence, and Service.</p>
                        </div>
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/schools/pnu.png" alt="PNU" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>

                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>Senior High School - College</h3>
                        <h4>University of St. La Salle Bacolod | Bacolod City, Negros Occidental</h4>
                        <div class="group hidden md:flex md:flex-col">
                            <p>Brandished ith the core values of Faith, Service, and Communion in Mission, University of St. La Salle became my home for almost 6 years. This university allowed me to explore discover capabilities that I didn't know I have.</p>
                            <p>I took the Science, Technology, Engineering, and Mathematics track for my Senior High School years and Bachelor of Science in Computer Science Major in Game Development for my college program.</p>
                            <p>During my stay here, I have received accolades for my service such as being the Most Oustanding Student in Culture and Arts and Most Outstanding Club President during the Laurier de La Salle 2022</p>
                            <p>I also received the Most Outstanding Student in the Field of Visual Arts award last Corps d'Elite (CDE) 2024 and became a finalist in the same awards event specifically on CDE 2023 and CDE 2025 in the Print Arts and Academic President respectively. My organization was also a finalist on CDE 2025 as the Most Outstanding Academic Club.</p>    
                        </div>
                    </div>
                    
                    <div class="w-1/3 flex justify-center">
                        <img src="images/schools/usls.png" alt="USLS" class="size-16 md:size-32 lg:size-48 lg:h-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>
            </div>
        </div>

        <hr class= " border-gray-100">

        {{-- Experience --}}
        <div class="w-full flex flex-col px-4 md:px-8 gap-2">
            <h2 class="font-bold mb-4 text-center md:text-justify md:w-auto px-6 md:px-8 lg:px-16">Experience and Affiliations</h2>

            <div class="flex flex-col gap-12">
                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>Green Module Systems</h3>
                        <h4 class="mb-2">Web Developer Intern | Bacolod City, Negros Occidental</h4>
                        <span class="text-xs border rounded-lg p-1">2025 - Present</span>
                        <div class="group hidden md:flex md:flex-col">

                        </div>
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/experience/gm.png" alt="PNU" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>

                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>Stalwrites</h3>
                        <h4 class="mb-2">Freelance Writer | Bacolod City, Negros Occidental</h4>
                        <span class="text-xs border rounded-lg p-1">2022 - 2025</span>
                        <div class="group hidden md:flex md:flex-col">
                            
                        </div>
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/experience/stalwrites.png" alt="PNU" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>

                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>Google Developers Group Bacolod</h3>
                        <h4 class="mb-2">Creatives Lead | Bacolod City, Negros Occidental</h4>
                        <span class="text-xs border rounded-lg p-1">2025 - Present</span>
                        <div class="group hidden md:flex md:flex-col">
                            
                        </div>
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/experience/gdg.jpg" alt="PNU" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>

                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>Computer Science Society - USLS</h3>
                        <h4 class="mb-2">Executive President | Bacolod City, Negros Occidental</h4>
                        <span class="text-xs border rounded-lg p-1">2024 - 2025</span>
                        <div class="group hidden md:flex md:flex-col">
                            
                        </div>                    
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/experience/css.png" alt="USLS" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>

                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>College of Engineering and Technology Council - USLS</h3>
                        <h4 class="mb-2">Council Secretary | Bacolod City, Negros Occidental</h4>
                        <span class="text-xs border rounded-lg p-1">2023 - 2024</span>
                        <div class="group hidden md:flex md:flex-col">
                            
                        </div>                    
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/experience/cet.jpg" alt="USLS" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>

                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>Tigris Publication (Currently The Howl) - USLS</h3>
                        <h4 class="mb-2">Associate Editor (2022) and Editor-in-Chief (2023) | Bacolod City</h4>
                        <span class="text-xs border rounded-lg p-1">2022 - 2023</span>
                        <div class="group hidden md:flex md:flex-col">
                            
                        </div>                    
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/experience/tigris.jpg" alt="USLS" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>

                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>House of Rheims - USLS</h3>
                        <h4 class="mb-2">Head of Cultural Activities | Bacolod City, Negros Occidental</h4>
                        <span class="text-xs border rounded-lg p-1">2021 - 2022</span>
                        <div class="group hidden md:flex md:flex-col">
                            
                        </div>                    
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/experience/rheims.jpg" alt="USLS" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>

                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>Mimesis Media Arts Club - USLS</h3>
                        <h4 class="mb-2">Executive Vice President (2020-2021) and Executive President (2021-2022) | Bacolod City, Negros Occidental</h4>
                        <span class="text-xs border rounded-lg p-1">2020 - 2022</span>
                        <div class="group hidden md:flex md:flex-col">
                            
                        </div>
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/experience/mimesis.jpg" alt="USLS" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>

                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>Boy Scouts of the Philippines - Outfit 376</h3>
                        <h4 class="mb-2">Eagle Scout Rank | Bacolod City, Negros Occidental</h4>
                        <span class="text-xs border rounded-lg p-1">2019 - Present</span>
                        <div class="group hidden md:flex md:flex-col">
                            
                        </div>                    
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/experience/bsp.jpg" alt="USLS" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>

                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>Supreme Student Government - PNUV-CTL</h3>
                        <h4 class="mb-2">Executive President | Bacolod City, Negros Occidental</h4>
                        <span class="text-xs border rounded-lg p-1">2019 - 2020</span>
                        <div class="group hidden md:flex md:flex-col">
                            
                        </div>                    
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/experience/ssg.jpg" alt="USLS" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>

                <div class="w-full flex flex-row justify-between">
                    <div class="w-2/3 text-left pl-6 md:pl-8 lg:pl-16">
                        <h3>Couples for Christ - Youth for Christ - MACASA</h3>
                        <h4 class="mb-2">Sector Head (2019-2022) and Cluster Head (2019) | Bacolod City, Negros Occidental</h4>
                        <span class="text-xs border rounded-lg p-1">2018 - 2022</span>
                        <div class="group hidden md:flex md:flex-col">
                            
                        </div>                    
                    </div>
                    <div class="w-1/3 flex justify-center">
                        <img src="images/experience/yfc.jpg" alt="USLS" class="size-16 md:size-32 lg:size-48 object-cover rounded-2xl aspect-square">
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout>