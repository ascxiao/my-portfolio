@extends('dashboard')

@section('title', 'Add Artwork')

@section('content')
<div class="flex flex-col md:flex-row justify-around bg-white overflow-hidden shadow-sm sm:rounded-lg py-4 px-8">
    <div class="flex items-center w-128 h-96 lg:h-128 md:p-16">
        <img id="preview-image" src="/images/placeholder.jpeg" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
    </div>

    <div class="p-6">
        <h2 class="text-2xl font-bold mb-6">Add New Artwork</h2>

        <form action="{{ route('artworks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="creation_date" class="block text-sm font-medium text-gray-700 mb-2">Creation Date *</label>
                <input type="date" name="creation_date" id="creation_date" value="{{ old('creation_date', now()->format('Y-m-d')) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags (comma-separated)</label>
                <input type="text" name="tags" id="tags" value="{{ old('tags') }}" placeholder="Project Management, UI/UX, Game"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <p class="text-xs text-gray-500 mt-1">Separate tags with commas</p>
            </div>

            <div class="mb-4">
                <label for="source" class="block text-sm font-medium text-gray-700 mb-2">Upload Artwork</label>
                <input type="file" name="source" id="source" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>


            <div class="flex items-center gap-4">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md">
                    Add Artwork
                </button>
                <a href="{{ route('artworks.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('source').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection