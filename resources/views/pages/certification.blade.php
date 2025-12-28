<x-layout title='Certifications'>
    <div class="md:p-4 grid justify-center">
        <h2>Certifications</h2>
    </div>
    <div class="grid grid-rows-1 gap-4" id='certificate'>
        @foreach ($certifications as $certification)
            <x-certificate_tile 
                :certificate="$certification['title']"
                :provider="$certification['provider']"
                :date="$certification['acquired_date']->format('F j, Y')"
                :desc="$certification['description']"
                :image="$certification['image']"
                :link="$certification['link']"
            ></x-certificate_tile>
        @endforeach
    </div>
</x-layout>

<div id="modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center p-4 modal">
    <button id="closeModal" class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>

    <div class="max-w-5xl w-full flex flex-col items-center gap-4">
        <div class="max-h-[75vh] w-full flex items-center justify-center">
            <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain">
        </div>
        <div class="text-white text-center">
            <h2 id="modalTitle" class="text-2xl font-bold"></h2>
            <p id="modalProvider" class="text-lg mt-2"></p>
            <p id="modalDate" class="text-lg mt-2"></p>
            <a id="modalLink" href=""></a>
        </div>
    </div>
</div>

    <script>
        const certificates = document.querySelectorAll('#certificate > div');
        const modal = document.getElementById('modal');
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const modalDate = document.getElementById('modalDate');
        const modalProvider = document.getElementById('modalProvider');
        const modalLink = document.getElementById('modalLink');
        const closeModalBtn = document.getElementById('closeModal');

        let currentIndex = 0;
        // Open modal
        certificates.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentIndex = index;
                openModal();
            });
        });

        function openModal() {
            const currentItem = certificates[currentIndex];
            const img = currentItem.querySelector('img');
            const titleElement = currentItem.querySelector('[data-title-text]') || currentItem.querySelector('h3, h2');
            const dateElement = currentItem.querySelector('[data-date]') || currentItem.querySelector('p');
            const linkElement = currentItem.querySelector('[data-link]') || currentItem.querySelector('a[href]');
            const providerElement = currentItem.querySelector('[data-provider]') || currentItem.querySelector('.provider');
            
            const title = currentItem.dataset.title || titleElement?.textContent || 'Untitled';
            const date = currentItem.dataset.date || dateElement?.textContent || 'Unknown Date';
            const link = currentItem.dataset.link || linkElement?.href || '';
            const provider = currentItem.dataset.provider || providerElement?.textContent || '';

            modalImage.src = img?.src || '';
            modalImage.alt = img?.alt || title;
            modalTitle.textContent = title;
            modalDate.textContent = date;
            modalProvider.textContent = provider;
            if (link) {
                modalLink.href = link;
                modalLink.textContent = 'View Certificate';
                modalLink.target = '_blank';
                modalLink.rel = 'noopener noreferrer';
            } else {
                modalLink.removeAttribute('href');
                modalLink.textContent = '';
                modalLink.removeAttribute('target');
                modalLink.removeAttribute('rel');
            }
            
            console.log('Title:', title, 'Date:', date, 'Provider:', provider, 'Link:', link); // Debug log
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        closeModalBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });

        document.addEventListener('keydown', (e) => {
            if (!modal.classList.contains('hidden')) {
                if (e.key === 'Escape') closeModal();
            }
        });
    </script>