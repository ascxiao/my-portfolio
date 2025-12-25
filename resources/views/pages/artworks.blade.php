<x-layout title='Artworks'>
    <div class="lg:p-4 grid justify-center">
        <h2>Artworks</h2>
    </div>
    
    <div class="gallery-grid" id="gallery">
        <x-artwork_component src='/images/DaveCelo.png' title='Dave Celo Portrait' date='January 15, 2024'></x-artwork_component>
        <x-artwork_component src='/images/sample.png' title='Sample Artwork' date='February 20, 2024'></x-artwork_component>
        <x-artwork_component src='/images/yb-1.png' title='YB Artwork 1' date='March 10, 2024'></x-artwork_component>
        <x-artwork_component src='/images/sample2.png' title='Sample Artwork 2' date='April 5, 2024'></x-artwork_component>
    </div>
</x-layout>

<div id="modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center p-4 modal">
    <button id="closeModal" class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>

    <button id="prevBtn" class="absolute left-4 text-white hover:text-gray-300 transition-colors z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
    </button>

    <button id="nextBtn" class="absolute right-4 text-white hover:text-gray-300 transition-colors z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
    </button>

    <div class="max-w-5xl w-full flex flex-col items-center gap-4">
        <div class="max-h-[75vh] w-full flex items-center justify-center">
            <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain">
        </div>
        <div class="text-white text-center">
            <h2 id="modalTitle" class="text-2xl font-bold"></h2>
            <p id="modalDate" class="text-lg mt-2"></p>
            <p id="modalCounter" class="text-sm text-gray-400 mt-2"></p>
        </div>
    </div>
</div>

<script>
    const galleryItems = document.querySelectorAll('#gallery > div');
    const modal = document.getElementById('modal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDate = document.getElementById('modalDate');
    const modalCounter = document.getElementById('modalCounter');
    const closeModalBtn = document.getElementById('closeModal');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    let currentIndex = 0;
    const totalItems = galleryItems.length;

    // Open modal
    galleryItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            currentIndex = index;
            openModal();
        });
    });

    function openModal() {
        const currentItem = galleryItems[currentIndex];
        const img = currentItem.querySelector('img');
        const titleElement = currentItem.querySelector('h3');
        const dateElement = currentItem.querySelector('p');
        
        const title = titleElement ? titleElement.textContent : 'Untitled';
        const date = dateElement ? dateElement.textContent : 'Unknown Date';

        modalImage.src = img.src;
        modalImage.alt = img.alt;
        modalTitle.textContent = title;
        modalDate.textContent = date;
        modalCounter.textContent = `${currentIndex + 1} / ${totalItems}`;
        
        console.log('Title:', title, 'Date:', date); // Debug log
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // Close modal
    closeModalBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    // Navigation
    prevBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        openModal();
    });

    nextBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        currentIndex = (currentIndex + 1) % totalItems;
        openModal();
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (!modal.classList.contains('hidden')) {
            if (e.key === 'Escape') closeModal();
            if (e.key === 'ArrowLeft') {
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                openModal();
            }
            if (e.key === 'ArrowRight') {
                currentIndex = (currentIndex + 1) % totalItems;
                openModal();
            }
        }
    });
    
    function calculateSizes() {
        galleryItems.forEach(item => {
            const img = item.querySelector('img');
            img.addEventListener('load', function() {
                const aspectRatio = this.naturalWidth / this.naturalHeight;
                
                // Remove existing size classes
                item.classList.remove('size-wide', 'size-tall', 'size-large', 'size-standard');
                
                // Apply size based on aspect ratio
                if (aspectRatio > 1.5) {
                    item.classList.add('size-wide');
                } else if (aspectRatio < 0.8) {
                    item.classList.add('size-tall');
                } else if (aspectRatio > 1.2) {
                    item.classList.add('size-large');
                } else {
                    item.classList.add('size-standard');
                }
            });
        });
    }

    calculateSizes();
</script>